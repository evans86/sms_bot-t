<?php

namespace App\Services\Activate;

use App\Services\MainService;
use App\Services\External\SmsActivateApi;

class UserService extends MainService
{
    public function balance()
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));
        $balance = $smsActivate->getBalance();

        return $balance;
    }
}
