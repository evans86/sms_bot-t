<?php

namespace App\Services\Resource\Strategy;

use App\Http\Repositories\CountryRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Repositories\Resource\ResourceCountryRepository;
use App\Http\Repositories\Resource\ResourceServicesRepository;
use App\Models\Dto\CountryDto;
use App\Models\Dto\ServiceDto;
use App\Models\Resource\ResourceServiceCountry;
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

    public function updateServiceCountry(): void
    {
//        $smsActivate = new SmsActivateApi(config('services.key_activate.key_activate'));
//        $priceResultServices = $smsActivate->getPrices();
//        dd($priceResultServices);

        $servicesRep = new ResourceServicesRepository();
        $countriesRep = new ResourceCountryRepository();

//        $error = [];
//        foreach ($priceResultServices as $key => $priceServices) {
//            $resourceCountry = $countriesRep->getCountryOrgId($key);
//            foreach ($priceServices as $org => $priceService) {
//                try {
//                    $resourceService = $servicesRep->getServiceOrgId($org);
//
//                    $data = [
//                        'resource_id' => $this->resource->id,
//                        'country_id' => $resourceCountry->id,
//                        'service_id' => $resourceService->id,
//                        'price' => $priceService['cost'],
//                        'count' => $priceService['count'],
//                    ];
//
//                    $matchThese = [
//                        'resource_id' => $this->resource->id,
//                        'country_id' => $resourceCountry->id,
//                        'service_id' => $resourceService->id,
//                        ];
//
//                    ResourceServiceCountry::updateOrCreate($matchThese, $data);
//
//                } catch (\Exception $e) {
//                    array_push($error, $org);
//                    //надо выводить ошибку и изменять сиды
//                }
//            }
//        }
    }

    public function getKey(): string
    {
        return 'activate';
    }
}
