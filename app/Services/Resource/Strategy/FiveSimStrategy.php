<?php

namespace App\Services\Resource\Strategy;

use App\Http\Repositories\CountryRepository;
use App\Http\Repositories\Resource\ResourceCountryRepository;
use App\Http\Repositories\Resource\ResourceServicesRepository;
use App\Http\Repositories\ServiceRepository;
use App\Models\Dto\CountryDto;
use App\Models\Dto\ServiceDto;
use App\Models\Resource\ResourceServiceCountry;
use App\Models\Resource\SmsResource;
use App\Services\External\FiveSimApi;
use App\Services\Resource\ResourceInterface;

class FiveSimStrategy extends MainStrategy implements ResourceInterface
{

    public function create(array $params): SmsResource
    {
        // TODO: Implement create() method.
    }

    public function parseCountry(): array
    {
        $fiveSim = new FiveSimApi(config('services.key_activate.key_5sim'));
        $countries = $fiveSim->getCountries();

        $countriesRep = new CountryRepository();

        $result = [];
        foreach ($countries as $key => $country) {
            $iso = array_key_first($country['iso']);
            $iso = strtoupper($iso);
            $org_id = $key;
            $country = $countriesRep->getCountryByIsoTwo($iso);
            $dto = new CountryDto();
            $dto->setCountry($country);
            $org_id = preg_replace('/\s+/', '', $org_id);
            $dto->org_id = strtolower($org_id);
            array_push($result, $dto);
        }

        return $result;
    }

    /**
     * @return ServiceDto[]
     */
    public function parseService(): array
    {
        $fiveSim = new FiveSimApi(config('services.key_activate.key_5sim'));
        $products = $fiveSim->getProducts('any', 'any');

        $servicesRep = new ServiceRepository();
        $services = $servicesRep->getAll();

        // Найденные результаты
        $resultFind = [];
        // Ненайденные
        $resultNotFind = [];
        foreach ($services as $service) {
            if (array_key_exists($service['second_key'], $products)) {
                // Найден
                $dto = new ServiceDto();
                $dto->setService($service);
                $dto->org_id = $service['second_key'];
                array_push($resultFind, $dto);
            } else {
                if (in_array($service['second_key'], $this->getConnection())) {
                    // Найден
                    $dto = new ServiceDto();
                    $dto->setService($service);
                    $dto->org_id = array_search($service['second_key'], $this->getConnection());
                    array_push($resultFind, $dto);
                } else {
                    // Не найден тут пока ничего не делаем. Но по хорошему надо выводить ошибку и править сиды
                    array_push($resultNotFind, $service);
                }
            }
        }
        return $resultFind;
    }

    /**
     * Связывает ключи для верной интеграции, которые не связались автоматически у сервисов
     * key - ключ стороннего сервиса
     * value - значение в базе
     * @return array
     */
    private function getConnection(): array
    {
        return [
            'youtube' => 'google,youtube,gmail',
            'google' => 'google,youtube,gmail',
            'gmail' => 'google,youtube,gmail',
            'linemessenger' => 'line',
            'alipay' => 'alipay/alibaba/1688',
            'alibaba' => 'alipay/alibaba/1688',
            '1688' => 'alipay/alibaba/1688',
            'vkontakte' => 'вконтакте',
            'mvideo' => 'мвидео',
            'yandex' => 'яндекс',
        ];
    }

    public function updateServiceCountry(): void
    {
        $fiveSim = new FiveSimApi(config('services.key_activate.key_5sim'));
        $priceResultServices = $fiveSim->getPrices();
//        dd($priceResultServices);

        $servicesRep = new ResourceServicesRepository();
        $countriesRep = new ResourceCountryRepository();

        $errorService = [];
        $errorCountry = [];
        foreach ($priceResultServices as $key => $priceServices) {
//            dd($key);

            //ранее парсили страны, однако некоторые страны, для которых доступна покупка активации, почему то не были
            // спаршены, проеб 5sim, хз
            try {
//                $resourceCountry = $countriesRep->getCountryOrgId($key);

//            dd($priceServices);

                foreach ($priceServices as $org => $priceService) {

                    try {
                        $priceService = current($priceService);

                        $resourceService = $servicesRep->getServiceOrgId($org);

                        $data = [
                            'resource_id' => $this->resource->id,
                            'country_id' => '$resourceCountry->id',
                            'service_id' => $resourceService->id,
                            'price' => $priceService['cost'],
                            'count' => $priceService['count'],
                        ];

                        $matchThese = [
                            'resource_id' => $this->resource->id,
//                            'country_id' => $resourceCountry->id,
                            'service_id' => $resourceService->id,
                        ];

                        ResourceServiceCountry::updateOrCreate($matchThese, $data);

                    } catch (\Exception $e) {
                        array_push($errorService, $org);
                    }

                }
            } catch (\Exception $e) {
                array_push($errorCountry, $key);
            }
        }
        dd($errorService, $errorCountry);
    }

    public
    function getKey(): string
    {
        return '5sim';
    }
}
