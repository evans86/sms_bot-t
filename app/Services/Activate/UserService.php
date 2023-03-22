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
    public function balance($bot)
    {
        try {
            $smsActivate = new SmsActivateApi($bot->api_key);
//        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));
            $balance = $smsActivate->getBalance();
        } catch (\Exception $e) {
            $balance = '';
        }

        return $balance;
    }
}
