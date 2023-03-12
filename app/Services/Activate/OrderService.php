<?php

namespace App\Services\Activate;

use App\Helpers\ApiHelpers;
use App\Services\External\SmsActivateApi;
use App\Services\MainService;

class OrderService extends MainService
{
//$service = 'tg';
//$operator = 'mts'; //потом передать user
//$country = '0'; //потом передать user

    public function createOrder($service, $operator, $country)
    {
        try {
            $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

            $serviceResult = $smsActivate->getNumberV2($service, $country);
//            $activeActivation = $smsActivate->getStatus($serviceResult['activationId']);

//            dd($serviceResult);

//            $serviceResult = json_decode($serviceResult);
//            return $serviceResult;

            $dateTime = new \DateTime($serviceResult['activationTime']);
            $dateTime = $dateTime->format('U');
            $dateTime = intval($dateTime);
            $endTime = $dateTime + 1200;

            $id = intval($serviceResult['activationId']);

            $result = [
                'id' => $id,
                'phone' => $serviceResult['phoneNumber'],
                'text' => 'sms',
                'time' => $endTime, //посмотреть время для сервисов?
                'status' => 'status',
            ];
            return $result;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
//            return $e->getMessage();
        }
    }
}
