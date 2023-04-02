<?php

namespace App\Services\Resource\Strategy;

use App\Http\Repositories\CountryRepository;
use App\Http\Repositories\ServiceRepository;
use App\Models\Dto\CountryDto;
use App\Models\Dto\ServiceDto;
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
        foreach ($countries as $key => $country){
            $iso = array_key_first($country['iso']);
            $org_id = $country['text_en'];
            $country = $countriesRep->getCountryByIsoTwo($iso);
            $dto = new CountryDto();
            $dto->setCountry($country);
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
            if(array_key_exists($service['second_key'], $products)) {
                // Найден
                $dto = new ServiceDto();
                $dto->setService($service);
                $dto->org_id = $service['second_key'];
                array_push($resultFind, $dto);
            } else {
                if(in_array($service['second_key'], $this->getConnection())) {
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
}
