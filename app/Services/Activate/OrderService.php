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
            //API с бота
//            $smsActivate = new SmsActivateApi(config('services.key_activate.key'));
            $smsActivate = new SmsActivateApi($bot->api_key);

            $serviceResult = $smsActivate->getNumberV2($service, $country);

            $dateTime = new \DateTime($serviceResult['activationTime']);
            $dateTime = $dateTime->format('U');
            $dateTime = intval($dateTime);

            $id = intval($serviceResult['activationId']);

            $apiPrice = $smsActivate->getTopCountriesByService($service);

            $price = $apiPrice[$country]['retail_price'];
            $pricePercent = $price + ($price * ($bot->percent / 100));

            $result = [
                'id' => $id,
                'phone' => $serviceResult['phoneNumber'],
                'time' => $dateTime,
                'status' => $this->getStatus($id, $bot),
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
                'status' => $this->getStatus($id, $bot),
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
     * @param $bot
     * @return mixed
     */
    public function setStatus($order, $status, $bot)
    {
        //API с бота
//        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));
        $smsActivate = new SmsActivateApi($bot->api_key);

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
     * @param $bot
     * @return mixed|string
     */
    public function getActive($order, $bot)
    {
        //API с бота
//        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));
        $smsActivate = new SmsActivateApi($bot->api_key);

        $serviceResults = $smsActivate->getActiveActivations();

        if ($order->status == 6)
            $status = 6;
        else
            $status = $this->getStatus($order->org_id, $bot);

        if (key_exists('activeActivations', $serviceResults)) {
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
        } else {
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
     * @param $bot
     * @return mixed
     */
    public function getStatus($id, $bot)
    {
        //API с бота
//        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));
        $smsActivate = new SmsActivateApi($bot->api_key);

        $serviceResult = $smsActivate->getStatus($id);

        return $serviceResult;
    }

    /**
     * @param $order
     * @param $bot
     * @return void
     */
    public function subtractBalance($order, $bot)
    {
        $link = 'https://api.bot-t.com/v1/module/bot/subtract-balance';
        $public_key = $bot->public_key;
        $private_key = $bot->private_key;
        $user_id = $order->user->telegram_id;
        $secret_key = 'key';
        $amount = $order->price;
        $comment = 'Модуль приема СМС';

        $requestParam = array(
            'public_key' => $public_key,
            'private_key' => $private_key,
            'user_id' => $user_id,
            'secret_key' => $secret_key,
            'amount' => $amount,
            'comment' => $comment,
        );

        $serializedData = http_build_query($requestParam);
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => $serializedData
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($link, false, $context);
    }
}
