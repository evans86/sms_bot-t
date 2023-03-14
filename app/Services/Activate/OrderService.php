<?php

namespace App\Services\Activate;

use App\Helpers\ApiHelpers;
use App\Models\Order\SmsOrder;
use App\Services\External\SmsActivateApi;
use App\Services\MainService;

class OrderService extends MainService
{
    /**
     * Создание заказа а сервисе
     *
     * @param $service
     * @param $operator
     * @param $country
     * @param $user_id
     * @param $bot
     * @return array
     * @throws \Exception
     */
    public function createOrder($service, $operator, $country, $user_id, $bot)
    {
        try {
            $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

            $serviceResult = $smsActivate->getNumberV2($service, $country);

            $dateTime = new \DateTime($serviceResult['activationTime']);
            $dateTime = $dateTime->format('U');
            $dateTime = intval($dateTime);

            $id = intval($serviceResult['activationId']);

            $apiPrice = $smsActivate->getPricesActivation($service);
            dd($apiPrice);
            $price = $apiPrice[$service][$country]['price'];



            $pricePercent = $price + ($price * ($bot->percent / 100));

            $result = [
                'id' => $id,
                'phone' => $serviceResult['phoneNumber'],
                'text' => '',
                'time' => $dateTime,
                'status' => $this->getStatus($id),
                'codes' => '',
                'country' => $country,
                'operator' => $serviceResult['activationOperator'],
                'service' => $service,
                'cost' => $pricePercent
            ];

            $data = [
                'org_id' => $id,
                'user_id' => $user_id,
                'phone' => $serviceResult['phoneNumber'],
                'country' => $country,
                'operator' => $serviceResult['activationOperator'],
                'status' => $this->getStatus($id),
                'time' => $dateTime,
                'codes' => '',
                'service' => $service,
                'price' => $pricePercent * 100,
            ];

            $order = SmsOrder::create($data);
            $order->save();

            return $result;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Установка статуса заказа на сервисе
     *
     * @param $order
     * @param $status
     * @return mixed
     */
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

    /**
     * Получение активных заказов с сервиса
     *
     * @param $order
     * @return mixed
     */
    public function getActive($order)
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

        $serviceResults = $smsActivate->getActiveActivations();

        $status = $this->getStatus($order->org_id);

        if (key_exists('activeActivations', $serviceResults)){
            $serviceResults = $serviceResults['activeActivations'];

            $results = [];
            foreach ($serviceResults as $serviceResult) {
                $order_id = $serviceResult['activationId'];
                if ($order_id == $order->org_id)
                    $results = $serviceResult;
            }

            if (key_exists('smsCode', $results))
                $result = $results['smsCode'];
            else
                $result = '';
        }else{
            $result = '';
        }

        $data = [
            'codes' => $result,
            'status' => $status
        ];

        $order->update($data);
        $order->save();

        return $result;
    }

    /**
     * Статус заказа с сервиса
     *
     * @param $id
     * @return mixed
     */
    public function getStatus($id)
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

        $serviceResult = $smsActivate->getStatus($id);

        return $serviceResult;
    }
}
