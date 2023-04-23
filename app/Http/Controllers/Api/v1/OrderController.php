<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ApiHelpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\api\OrderResource;
use App\Models\Activate\SmsCountry;
use App\Models\Bot\SmsBot;
use App\Models\Order\SmsOrder;
use App\Models\User\SmsUser;
use App\Services\Activate\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    private OrderService $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService();
    }

    /**
     * Передача значений заказаов для пользователя
     *
     * Request[
     *  'user_id'
     *  'user_secret_key'
     * ]
     *
     * @param Request $request
     * @return array|string
     */
    public function orders(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        if (is_null($request->user_secret_key))
            return ApiHelpers::error('Not found params: user_secret_key');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();

        $result = OrderResource::collection(SmsOrder::query()->where(['user_id' => $user->id])->get());

        return ApiHelpers::success($result);
    }

    /**
     * Создание заказа +
     *
     * Request[
     *  'user_id'
     *  'country'
     *  'user_secret_key'
     *  'public_key'
     * ]
     * @param Request $request
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createOrder(Request $request)
    {
        try {
            if (is_null($request->user_id))
                return ApiHelpers::error('Not found params: user_id');
            $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
            if (is_null($request->country))
                return ApiHelpers::error('Not found params: country');
            if (is_null($request->user_secret_key))
                return ApiHelpers::error('Not found params: user_secret_key');
            if (is_null($request->public_key))
                return ApiHelpers::error('Not found params: public_key');
            $bot = SmsBot::query()->where('public_key', $request->public_key)->first();
            if (empty($bot))
                return ApiHelpers::error('Not found module.');

            $country = SmsCountry::query()->where(['org_id' => $request->country])->first();
            $service = $user->service;

            $result = $this->orderService->createOrder(
                $service,
                $country->org_id,
                $user->id,
                $bot,
                $request->user_secret_key
            );

            return ApiHelpers::success($result);
        } catch (\Exception $e) {
            return ApiHelpers::error($e->getMessage());
        }
    }

    /**
     * Получение активного заказа
     *
     * Request[
     *  'user_id'
     *  'order_id'
     *  'user_secret_key'
     *  'public_key'
     * ]
     *
     * @param Request $request
     * @return array|string
     */
    public function getOrder(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if (is_null($request->order_id))
            return ApiHelpers::error('Not found params: order_id');
        $order = SmsOrder::query()->where(['org_id' => $request->order_id])->first();
        if (is_null($request->user_secret_key))
            return ApiHelpers::error('Not found params: user_secret_key');
        if (is_null($request->public_key))
            return ApiHelpers::error('Not found params: public_key');
        $bot = SmsBot::query()->where('public_key', $request->public_key)->first();
        if (empty($bot))
            return ApiHelpers::error('Not found module.');

        $this->orderService->getActive($order, $bot, $request->user_secret_key);

        return ApiHelpers::success(OrderResource::generateOrderArray($order));
    }

    /**
     * Установить статус 1 (Сообщить, что SMS отправлен (не обязательно))
     *
     * Request[
     *  'user_id'
     *  'order_id'
     *  'public_key'
     * ]
     *
     * @param Request $request
     * @return array|string
     */
    public function reportOrderSms(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if (is_null($request->order_id))
            return ApiHelpers::error('Not found params: order_id');
        $order = SmsOrder::query()->where(['org_id' => $request->order_id])->first();
        if(is_null($request->user_secret_key))
            return ApiHelpers::error('Not found params: user_secret_key');
        if (is_null($request->public_key))
            return ApiHelpers::error('Not found params: public_key');
        $bot = SmsBot::query()->where('public_key', $request->public_key)->first();
        if (empty($bot))
            return ApiHelpers::error('Not found module.');

        $result = $this->orderService->setStatus($order, 1, $bot);

        return ApiHelpers::success($result);
    }

    /**
     * Установить статус 3 (Запросить еще одну смс)
     *
     * Request[
     *  'user_id'
     *  'order_id'
     *  'public_key'
     * ]
     *
     * @param Request $request
     * @return array|string
     */
    public function secondSms(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if (is_null($request->order_id))
            return ApiHelpers::error('Not found params: order_id');
        $order = SmsOrder::query()->where(['org_id' => $request->order_id])->first();
        if(is_null($request->user_secret_key))
            return ApiHelpers::error('Not found params: user_secret_key');
        if (is_null($request->public_key))
            return ApiHelpers::error('Not found params: public_key');
        $bot = SmsBot::query()->where('public_key', $request->public_key)->first();
        if (empty($bot))
            return ApiHelpers::error('Not found module.');

        $result = $this->orderService->setStatus($order, 3, $bot);

        return ApiHelpers::success($result);
    }

    /**
     * Установить статус 6 (Подтвердить SMS-код и завершить активацию)
     *
     * Request[
     *  'user_id'
     *  'order_id'
     *  'public_key'
     * ]
     *
     * @param Request $request
     * @return array|string
     */
    public function confirmOrder(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if (is_null($request->order_id))
            return ApiHelpers::error('Not found params: order_id');
        $order = SmsOrder::query()->where(['org_id' => $request->order_id])->first();
        if(is_null($request->user_secret_key))
            return ApiHelpers::error('Not found params: user_secret_key');
        if (is_null($request->public_key))
            return ApiHelpers::error('Not found params: public_key');
        $bot = SmsBot::query()->where('public_key', $request->public_key)->first();
        if (empty($bot))
            return ApiHelpers::error('Not found module.');

        $result = $this->orderService->setStatus($order, 6, $bot);

        return ApiHelpers::success($result);
    }

    /**
     * Установить статус 8 (Отменить активацию (если номер Вам не подошел))
     *
     * Request[
     *  'user_id'
     *  'order_id'
     *  'public_key'
     * ]
     *
     * @param Request $request
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function closeOrder(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if (is_null($request->order_id))
            return ApiHelpers::error('Not found params: order_id');
        $order = SmsOrder::query()->where(['org_id' => $request->order_id])->first();
        if (is_null($request->user_secret_key))
            return ApiHelpers::error('Not found params: user_secret_key');
        if (is_null($request->public_key))
            return ApiHelpers::error('Not found params: public_key');
        $bot = SmsBot::query()->where('public_key', $request->public_key)->first();
        if (empty($bot))
            return ApiHelpers::error('Not found module.');

        $result = $this->orderService->setStatus($order, 8, $bot);
        $this->orderService->changeBalance($order, $bot, 'add-balance', $request->user_secret_key);


        return ApiHelpers::success($result);
    }

    /**
     * Вспомогательный метод получения активного заказа
     *
     * Request[
     *  'user_id'
     *  'order_id'
     *  'public_key'
     * ]
     *
     * @param Request $request
     * @return array|string
     */
    public function getActive(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if (is_null($request->order_id))
            return ApiHelpers::error('Not found params: order_id');
        $order = SmsOrder::query()->where(['org_id' => $request->order_id])->first();
        if (is_null($request->user_secret_key))
            return ApiHelpers::error('Not found params: user_secret_key');
        if (is_null($request->public_key))
            return ApiHelpers::error('Not found params: public_key');
        $bot = SmsBot::query()->where('public_key', $request->public_key)->first();
        if (empty($bot))
            return ApiHelpers::error('Not found module.');

        $result = $this->orderService->getActive($order, $bot, $request->user_secret_key);

        return ApiHelpers::success($result);
    }

    /**
     * Вспомогательный метод получения статуса заказа
     *
     * Request[
     *  'user_id'
     *  'order_id'
     *  'public_key'
     * ]
     *
     * @param Request $request
     * @return array|string
     */
    public function getStatus(Request $request)
    {
        if (is_null($request->id))
            return ApiHelpers::error('Not found params: user_id');
        if(is_null($request->user_secret_key))
            return ApiHelpers::error('Not found params: user_secret_key');
        if (is_null($request->public_key))
            return ApiHelpers::error('Not found params: public_key');
        $bot = SmsBot::query()->where('public_key', $request->public_key)->first();
        if (empty($bot))
            return ApiHelpers::error('Not found module.');

        $result = $this->orderService->getStatus($request->id, $bot);

        return ApiHelpers::success($result);
    }
}
