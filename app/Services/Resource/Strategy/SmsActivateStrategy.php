<?php

namespace App\Services\Resource\Strategy;

use App\Http\Repositories\CountryRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Repositories\Resource\ResourceCountryRepository;
use App\Http\Repositories\Resource\ResourceServicesRepository;
use App\Models\Dto\CountryDto;
use App\Models\Dto\ServiceDto;
use App\Models\Resource\SmsResource;
use App\Services\External\SmsActivateApi;
use App\Services\Resource\ResourceInterface;

class SmsActivateStrategy extends MainStrategy implements ResourceInterface
{
    public function create(array $params): SmsResource
    {
        // TODO: Implement create() method.
    }

    public function parseCountry(): array
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key_activate'));
        $countries = $smsActivate->getCountries();

        $countriesRep = new CountryRepository();

        $result = [];
        $error = [];
        foreach ($countries as $key => $country) {
            $name_en = $country['eng'];
            $org_id = $country['id'];
            try {
                $country = $countriesRep->getCountryByEngName($name_en);
                $dto = new CountryDto();
                $dto->setCountry($country);
                $dto->org_id = $org_id;
                array_push($result, $dto);
            } catch (\Exception $e) {
                array_push($error, $name_en);
            }

        }
        return $result;
    }

    public function parseService(): array
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key_activate'));
        $services = $smsActivate->getTopCountriesByService();

        $servicesRep = new ProductRepository();

        $result = [];
        $error = [];
        foreach ($services as $key => $service) {
            try {
                $service = $servicesRep->getServiceByFirstKey($key);
                $dto = new ServiceDto();
                $dto->setService($service);
                $dto->org_id = $key;
                array_push($result, $dto);
            } catch (\Exception $e) {
                array_push($error, $key);
                //надо выводить ошибку и изменять сиды
            }
        }
        return $result;
    }

    public function updateServiceCountry(): array
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key_activate'));
        $actualServices = $smsActivate->getTopCountriesByService();
//        dd($actualServices);


        $servicesRep = new ResourceServicesRepository();
        $countriesRep = new ResourceCountryRepository();


        $resourceServices = $servicesRep->getAllById($this->resource->id);
        $resourceCountries = $countriesRep->getAllById($this->resource->id);

        $result = [];
        foreach ($resourceServices as $resourceService) {
            $actualCountries = $smsActivate->getTopCountriesByService($resourceService->org_id);
            foreach ($actualCountries as $key => $actualCountry) {
                $country = $countriesRep->getCountryOrgId($actualCountry['country']);


                $data = [
                    'resource_id' => $this->resource->id,
                    'country_id' => $country->id,
                    'service_id' => $resourceService->id,
                    'price' => $actualCountry['retail_price'],
                    'count' => $actualCountry['count'],
                ];
                $result[] = $data;


//                $resourceServiceCountry = new \App\Models\Resource\ResourceServiceCountry();
//                $resourceServiceCountry->resource_id = $this->resource->id;
//                $resourceServiceCountry->country_id = $country->id;
//                $resourceServiceCountry->service_id = $resourceService->id;
//                $resourceServiceCountry->price = $actualCountry['retail_price'];
//                $resourceServiceCountry->count = $actualCountry['count'];
//                $resourceServiceCountry->save();

            }
        }
        dd($result);
//                array_push($result, [
//                    'resource_id' => $this->resource->id,
//                    'country_id' => $country->id,
//                    'service_id' => $resourceService->id,
//                    'price' => $actualCountry['retail_price'],
//                    'count' => $actualCountry['count'],
//                ]);




        return [];
    }

    public function getKey(): string
    {
        return 'activate';
    }
}
