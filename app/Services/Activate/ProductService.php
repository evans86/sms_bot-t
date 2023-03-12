<?php

namespace App\Services\Activate;

use App\Services\External\SmsActivateApi;
use App\Services\MainService;

class ProductService extends MainService
{
    //переделать
    public function getAllProducts($country = null, $operator = null)
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

//        $services = $smsActivate->getPrices(0);
//        $services = $services[0];
//
//        $result = [];
//        foreach ($services as $key => $service){
//            array_push($result, [
//                'name' => $key,
//                'image' => 'https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/' . $key . '0.webp',
//                'count' => $service['count'],
//                'cost' => $service['cost'],
//            ]);
//        }
//
//        dd($services);
//        $countries = json_decode($countries, true);
        return $smsActivate->getNumbersStatus($country, $operator);
    }

    public function getPricesCountry($country = null)
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

        $services = $smsActivate->getPrices($country);
//        $services = json_decode($services, true);
        $services = $services[$country];

        $result = [];
        foreach ($services as $key => $service){
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
