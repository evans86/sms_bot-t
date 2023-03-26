<?php

namespace App\Services\Activate;

use App\Models\Activate\SmsCountry;
use App\Models\Order\SmsOrder;
use App\Services\External\SmsActivateApi;
use App\Services\MainService;
use GuzzleHttp\Client;

class OrderService extends MainService
{
    /**
     * Создание заказа а сервисе
     *
     * @param $service
     * @param $country_id
     * @param $user_id
     * @param $bot
     * @param $user_secret_key
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createOrder($service, $country_id, $user_id, $bot, $user_secret_key)
    {
        try {
            //API с бота
//            $smsActivate = new SmsActivateApi(config('services.key_activate.key'));
            $smsActivate = new SmsActivateApi($bot->api_key);

            $serviceResult = $smsActivate->getNumberV2(
                $service,
                $country_id,
                0,
                null,
                config('services.key_activate.ref')
            );

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

            $country = SmsCountry::query()->where(['org_id' => $country_id])->first();

            $result = [
                'id' => $id,
                'phone' => $serviceResult['phoneNumber'],
                'time' => $dateTime,
                'status' => $this->getStatus($id, $bot), //4
                'codes' => null,
                'country' => $country->org_id,
                'operator' => $serviceResult['activationOperator'],
                'service' => $service,
                'cost' => $pricePercent
            ];

            $data = [
                'bot_id' => $bot->id,
                'user_id' => $user_id,

                'service_id' => null,
                'service' => $service,
                'country_id' => $country->id,

                'org_id' => $id,
                'phone' => $serviceResult['phoneNumber'],
                'codes' => null,
                'status' => $this->getStatus($id, $bot), //4
                'start_time' => $dateTime,
                'end_time' => $dateTime + 1177,
                'operator' => $serviceResult['activationOperator'],
                'price_final' => $pricePercent * 100,
                'price_start' => $price * 100,
            ];

            $order = SmsOrder::create($data);
            $order->save();

            //списание баланса
            $this->changeBalance($order, $bot, 'subtract-balance', $user_secret_key);
//            $this->createBotOrder($order, $bot, 'order-create', $user_secret_key);

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
            'status' => $status
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
    public function getActive($order, $bot, $user_secret_key)
    {
        //API с бота
//        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));
        $smsActivate = new SmsActivateApi($bot->api_key);

        $serviceResults = $smsActivate->getActiveActivations();

        if ($order->status == 6) {
            $order->status = 6;
            $order->save();
        } else {
            switch ($this->getStatus($order->org_id, $bot)) {
                case 5:
                    $order->status = 3;
                    $order->save();
                    break;
                case 7:
                case 4:
                    $order->status = 4;
                    $order->save();
                    break;
            }
        }

        if (time() >= $order->end_time) {
            switch ($order->status) {
                case 3:
                case 4:
                    if (is_null($order->codes)) {
                        $order->status = 8;
                        $order->save();
                        $this->changeBalance($order, $bot, 'add-balance', $user_secret_key);
                    } else {
                        $order->status = 6;
                        $order->save();
                    }
                    break;
                case 6:
                case 8:
                    break;
            }
        }

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
                $result = null;
        } else {
            $result = null;
        }

        $data = [
            'codes' => $result,
            'status' => $order->status
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
     * Создание заказа bot-t
     * @param $order
     * @param $bot
     * @param $user_key
     * @param $uri
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createBotOrder($order, $bot, $uri, $user_key)
    {
        $link = 'https://api.bot-t.com/v1/module/shop/';
        $public_key = $bot->public_key; //062d7c679ca22cf88b01b13c0b24b057
        $private_key = $bot->private_key; //d75bee5e605d87bf6ebd432a2b25eb0e
        $user_id = $order->user->telegram_id; //1028741753
        $secret_key = $user_key; //'2997ec12c0c4e2df3e316d943e3da6e72997ec123e3d4d9429971695e4d5e4d5';
        $amount = $order->price_final; //1050
        $count = 1;
        $category_id = $bot->category_id;
        $product = 'СМС Активация';

        $requestParam = [
            'public_key' => $public_key,
            'private_key' => $private_key,
            'user_id' => $user_id,
            'secret_key' => $secret_key,
            'amount' => $amount,
            'count' => $count,
            'category_id' => $category_id,
            'product' => $product,
        ];

        $client = new Client(['base_uri' => $link]);
        $response = $client->request('POST', $uri, [
            'form_params' => $requestParam,
        ]);

        return $response->getBody();
    }

    /**
     * Списание баланса на Bot-t
     *
     * @param $order
     * @param $bot
     * @param $uri
     * @param $user_key
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function changeBalance($order, $bot, $uri, $user_key)
    {
        $link = 'https://api.bot-t.com/v1/module/user/';
        $public_key = $bot->public_key; //062d7c679ca22cf88b01b13c0b24b057
        $private_key = $bot->private_key; //d75bee5e605d87bf6ebd432a2b25eb0e
        $user_id = $order->user->telegram_id; //1028741753
        $secret_key = $user_key; //'2997ec12c0c4e2df3e316d943e3da6e72997ec123e3d4d9429971695e4d5e4d5';
        $amount = $order->price_final; //1050
        $comment = 'Списание за активацию СМС';

        $requestParam = [
            'public_key' => $public_key,
            'private_key' => $private_key,
            'user_id' => $user_id,
            'secret_key' => $secret_key,
            'amount' => $amount,
            'comment' => $comment,
        ];

        $client = new Client(['base_uri' => $link]);
        $response = $client->request('POST', $uri, [
            'form_params' => $requestParam,
        ]);

        return $response->getBody();
    }
}
