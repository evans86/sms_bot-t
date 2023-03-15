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
        //оставить свой API
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
        //оставить свой API
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

//        $services = $smsActivate->getPrices($country);
//        $services = $services[$country];

        $services = $smsActivate->getTopCountriesByService();


//        $priceService = $smsActivate->getTopCountriesByService('tg');

//        $price = $priceService[$country];

//        dd($priceService);

        $result = [];
        foreach ($services as $key => $service) {

//            $firstPrice = $smsActivate->getPrices(null, $key);
//            $firstPrice = next($firstPrice);
//            $firstPrice = next($service);
//            dd($firstPrice["count"]);
//            $priceService = $priceService[$country]['retail_price'];

//            $result = $firstPrice;
//            $priceService = $smsActivate->getPrices(null, $key);

//            dd($priceService[$country]);

//            $result = $priceService;

            array_push($result, [
                'name' => $key,
                'image' => 'https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/' . $key . '0.webp',
//                'count' => $firstPrice["count"],
//                'cost' => $firstPrice["price"],
            ]);
        }

//dd($result);

        return $result;
    }
}
