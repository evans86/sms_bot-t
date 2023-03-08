<?php

namespace App\Services\Activate;

use App\Services\External\SmsActivateApi;
use App\Services\MainService;

class ProductService extends MainService
{
    public function getAllProducts()
    {
        $smsActivate = new SmsActivateApi(env('SIM_ACTIVATE_KEY'));

        return $smsActivate->getNumbersStatus();
    }

    public function getConcreteProduct($country = null, $operator = null)
    {
        $smsActivate = new SmsActivateApi(env('SIM_ACTIVATE_KEY'));

        return $smsActivate->getNumbersStatus($country, $operator);
    }
}
