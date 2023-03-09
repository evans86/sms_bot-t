<?php

namespace App\Services\Activate;

use App\Services\External\SmsActivateApi;
use App\Services\MainService;

class ProductService extends MainService
{
    public function getAllProducts()
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

        return $smsActivate->getNumbersStatus();
    }

    public function getConcreteProduct($country = null, $operator = null)
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

        return $smsActivate->getNumbersStatus($country, $operator);
    }
}
