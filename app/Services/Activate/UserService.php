<?php

namespace App\Services\Activate;

use App\Services\MainService;
use App\Services\External\SmsActivateApi;

class UserService extends MainService
{
    /**
     * Баланс с сервиса
     *
     * @return mixed
     */
    public function balance()
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));
        $balance = $smsActivate->getBalance();

        return $balance;
    }
}
