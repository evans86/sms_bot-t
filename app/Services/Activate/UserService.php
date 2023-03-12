<?php

namespace App\Services\Activate;

use App\Services\MainService;
use App\Services\External\SmsActivateApi;

class UserService extends MainService
{
    public function getBalance()
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

        return $smsActivate->getBalance();
    }
}
