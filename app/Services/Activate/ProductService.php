<?php

namespace App\Services\Activate;

use App\Services\External\SmsActivateApi;
use App\Services\MainService;

class ProductService extends MainService
{
    public function getProducts()
    {
        $smsActivate = new SmsActivateApi(env('SIM_ACTIVATE_KEY'));

        return $smsActivate->getNumbersStatus();
    }
}
