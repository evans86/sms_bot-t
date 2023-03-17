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
     * @return void
     */
    public function subtractBalance($order, $bot)
    {
        $link = 'https://api.bot-t.com/v1/module/bot/subtract-balance';
        $public_key = $bot->public_key;
        $private_key = $bot->private_key;
        $user_id = $order->user->telegram_id;
        $secret_key = 'b41c9f4e38d4954419a43b8b52d67575b41c9f4e52d6c011b41c6998bf81bf81';
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

        $headers = array(
            'Content-Type: application/json',
        );

        $request = json_encode($requestParam);

        $opts = array(
            'http' => array(
                'method' => "POST",
                'header' => implode("\r\n", $headers),
                'content' => $request,
            )
        );

        $context = stream_context_create($opts);

        $result = file_get_contents($link, 0, $context);

        $result = json_decode($result, true);

        return $result;








//        $serializedData = http_build_query($requestParam);

//        $query = http_build_query($requestParam);
//        $options = array(
//            'http' => array(
//                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
//                    "Content-Length: ".strlen($query)."\r\n".
//                    "User-Agent:MyAgent/1.0\r\n",
//                'method'  => "POST",
//                'content' => $query,
//            ),
//        );
//        $context = stream_context_create($options);
//        $result = file_get_contents($link, false, $context, -1, 40000);

//        $options = array(
//            'http' => array(
//                'method' => 'POST',
//                'protocol_version' => '1.1',
//                'header' => [
//                    'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:24.0) Gecko/20100101 Firefox/24.0',
//                    'Connection: close'],
//                'content' => $serializedData
//            )
//        );
//        $context = stream_context_create(
//            [
//                'http' => [
//                    'method' => 'POST',
//                    'protocol_version' => '1.1',
//                    'header' => [
//                        'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:24.0) Gecko/20100101 Firefox/24.0',
//                        'Connection: close',
//                    ],
//                    'content' => $serializedData,
//                ]
//            ]
//        );


//        $stream = fopen($link, 'r', false, $context);
//        $content = stream_get_contents($stream); //тут получаем страницу
//        $data = stream_get_meta_data($stream); //тут получаем информацию, в том числе заголовки ответа

//        $context = stream_context_create($options);
//        $result = file_get_contents($link, false, $context);
    }
}
