<?php

namespace App\Services\Activate;

use App\Helpers\ApiHelpers;
use App\Models\Order\SmsOrder;
use App\Services\External\SmsActivateApi;
use App\Services\MainService;

class OrderService extends MainService
{
    public function createOrder($service, $operator, $country, $user_id)
    {
        try {
            $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

            $serviceResult = $smsActivate->getNumberV2($service, $country);

            $dateTime = new \DateTime($serviceResult['activationTime']);
            $dateTime = $dateTime->format('U');
            $dateTime = intval($dateTime);
            $endTime = $dateTime + 1200;

            $id = intval($serviceResult['activationId']);

            $result = [
                'id' => $id,
                'phone' => $serviceResult['phoneNumber'],
                'text' => '',
                'time' => $endTime,
                'status' => $this->getStatus($id),
            ];

            $data = [
                'org_id' => $id,
                'user_id' => $user_id,
                'phone' => $serviceResult['phoneNumber'],
                'country' => $country,
                'operator' => $serviceResult['activationOperator'],
                'status' => $this->getStatus($id),
                'time' => $endTime,
                'codes' => null
            ];

            $order = SmsOrder::create($data);
            $order->save();

            return $result;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function setStatus($order, $status)
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

        $serviceResult = $smsActivate->setStatus($order->org_id, $status);

        $data = [
            'status' => $serviceResult
        ];

        $order->update($data);
        $order->save();

        return $serviceResult;
    }

    public function getActive($order)
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

        $serviceResults = $smsActivate->getActiveActivations();

        $serviceResults = $serviceResults['activeActivations'];

        $results = [];
        foreach ($serviceResults as $serviceResult){
            $order_id = $serviceResult['activationId'];
            if ($order_id == $order->org_id)
                $results = $serviceResult;
        }

        $result = json_encode($results['smsCode']);

        $data = [
            'codes' => $result
        ];

        $order->update($data);
        $order->save();

        return $result;
    }

    public function getStatus($id)
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

        $serviceResult = $smsActivate->getStatus($id);

        return $serviceResult;
    }
}
