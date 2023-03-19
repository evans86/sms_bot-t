<?php

namespace App\Services\Activate;

use App\Models\Order\SmsOrder;
use App\Services\External\SmsActivateApi;
use App\Services\MainService;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Utils;
use GuzzleHttp\RequestOptions;

class OrderService extends MainService
{
    /**
     * Создание заказа а сервисе
     *
     * @param $service
     * @param $operator
     * @param $country_id
     * @param $user_id
     * @param $bot
     * @return array
     * @throws \Exception
     */
    public function createOrder($service, $operator, $country_id, $user_id, $bot)
    {
        try {
            //API с бота
//            $smsActivate = new SmsActivateApi(config('services.key_activate.key'));
            $smsActivate = new SmsActivateApi($bot->api_key);

            $serviceResult = $smsActivate->getNumberV2($service, $country_id);

            $dateTime = new \DateTime($serviceResult['activationTime']);
            $dateTime = $dateTime->format('U');
            $dateTime = intval($dateTime);

            $id = intval($serviceResult['activationId']);

            $countries = $smsActivate->getTopCountriesByService($service);
            foreach ($countries as $key => $country) {
                if ($country['country'] == $country_id) {
                    $price = $country["retail_price"];
                    $pricePercent = $price + ($price * ($bot->percent / 100));
                    break;
                }
            }

            $result = [
                'id' => $id,
                'phone' => $serviceResult['phoneNumber'],
                'time' => $dateTime,
                'status' => $this->getStatus($id, $bot),
                'codes' => '',
                'country' => $country_id,
                'operator' => $serviceResult['activationOperator'],
                'service' => $service,
                'cost' => $pricePercent
            ];

            $data = [
                'org_id' => $id,
                'user_id' => $user_id,
                'phone' => $serviceResult['phoneNumber'],
                'country' => $country_id,
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
     * Списание баланса на Bot-t
     *
     * @param $order
     * @param $bot
     * @return
     */
    public function subtractBalance($order, $bot)
    {
//        $link = 'https://api.bot-t.com/v1/module/user/subtract-balance';
//        $public_key = $bot->public_key; //062d7c679ca22cf88b01b13c0b24b057
//        $private_key = $bot->private_key; //d75bee5e605d87bf6ebd432a2b25eb0e
//        $user_id = $order->user->telegram_id; //1028741753
//        $secret_key = 'b41c9f4e38d4954419a43b8b52d67575b41c9f4e52d6c011b41c6998bf81bf81';
//        $amount = $order->price; //1050
//        $comment = 'Списание СМС';

        $link = 'https://api.bot-t.com/v1/module/user/subtract-balance';
        $public_key = '062d7c679ca22cf88b01b13c0b24b057'; //062d7c679ca22cf88b01b13c0b24b057
        $private_key = 'd75bee5e605d87bf6ebd432a2b25eb0e'; //d75bee5e605d87bf6ebd432a2b25eb0e
        $user_id = '1028741753'; //1028741753
        $secret_key = 'b41c9f4e38d4954419a43b8b52d67575b41c9f4e52d6c011b41c6998bf81bf81';
        $amount = 1050; //1050
        $comment = 'Списание СМС';


        $requestParam = [
            'public_key' => $public_key,
            'private_key' => $private_key,
            'user_id' => $user_id,
            'secret_key' => $secret_key,
            'amount' => $amount,
            'comment' => $comment,
        ];


        $client = new Client();
        $response = $client->request('POST', $link, [
            'form_params' => $requestParam,
        ]);

//        dd($response);


        return $response->getBody();

//        $response = $client->post('', [
//            RequestOptions::FORM_PARAMS => $requestParam
//        ]);

//        $response = $client->post("/v1/module/user/subtract-balance", $options);

//        return $response->getBody();

//        $headers = array(
//            'Content-Type: application/json',
//        );
//        $request = json_encode($requestParam);
//        $opts = array(
//            'http' => array(
//                'method' => "POST",
//                'header' => implode("\r\n", $headers),
//                'content' => $request,
//            )
//        );
//        $context = stream_context_create($opts);
//        $result = file_get_contents($link, 0, $context);
//        $result = json_decode($result, true);
//        return $result;
    }
}
