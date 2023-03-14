<?php

namespace App\Services\Activate;

use App\Services\External\SmsActivateApi;
use App\Services\MainService;

class ProductService extends MainService
{
    /**
     * Все доступные сервисы с API
     *
     * @param $country
     * @param $operator
     * @return array
     */
    public function getAllProducts($country = null, $operator = null)
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

        return $smsActivate->getNumbersStatus($country, $operator);
    }

    /**
     * Сервисы доступные для конкретной страны
     *
     * @param $country
     * @return array
     */
    public function getPricesCountry($country = null)
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

        $services = $smsActivate->getPrices($country);
        $services = $services[$country];

        $result = [];
        foreach ($services as $key => $service) {

            array_push($result, [
                'name' => $key,
                'image' => 'https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/' . $key . '0.webp',
                'count' => $service['count'],
                'cost' => $service['cost'],
            ]);
        }

        return $result;
    }
}
