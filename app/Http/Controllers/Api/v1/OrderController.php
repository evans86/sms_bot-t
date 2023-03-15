<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ApiHelpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\api\OrderResource;
use App\Models\Activate\SmsCountry;
use App\Models\Activate\SmsOperator;
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
     * ]
     *
     * @param Request $request
     * @return array|string
     */
    public function orders(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();

        $result = OrderResource::collection(SmsOrder::query()->where(['user_id' => $user->id])->get());

        return ApiHelpers::success($result);
    }

    /**
     * Создание заказа
     *
     * Request[
     *  'user_id'
     *  'service'
     *  'user_secret_key'
     *  'public_key'
     * ]
     *
     * @param Request $request
     * @return array|string
     */
    public function createOrder(Request $request)
    {
        try {
            if (is_null($request->user_id))
                return ApiHelpers::error('Not found params: user_id');
            $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
            if (is_null($request->country))
                return ApiHelpers::error('Not found params: country');
//        if(is_null($request->user_secret_key))
//            return ApiHelpers::error('Not found params: user_secret_key');
            if (is_null($request->public_key))
                return ApiHelpers::error('Not found params: public_key');
            $bot = SmsBot::query()->where('public_key', $request->public_key)->first();
            if (empty($bot))
                return ApiHelpers::error('Not found module.');

//            $country = SmsCountry::query()->where(['org_id' => $request->country])->first();
            $operator = SmsOperator::query()->where(['id' => $user->operator_id])->first();
            $service = $user->service;

            $result = $this->orderService->createOrder($service, $operator->title, $request->country, $user->id, $bot);

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
        //        if(is_null($request->user_secret_key))
//            return ApiHelpers::error('Not found params: user_secret_key');
//        if(is_null($request->public_key))
//            return ApiHelpers::error('Not found params: public_key');
//            $bot = SmsBot::query()->where('public_key', $request->public_key)->first();
//            if (empty($bot))
//                return ApiHelpers::error('Not found module.');

        $this->orderService->getActive($order);

        return ApiHelpers::success($this->generateOrderArray($order));
    }

    /**
     * Установить статус 1 (Сообщить, что SMS отправлен (не обязательно))
     *
     * Request[
     *  'user_id'
     *  'order_id'
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
        //        if(is_null($request->user_secret_key))
//            return ApiHelpers::error('Not found params: user_secret_key');
//        if(is_null($request->public_key))
//            return ApiHelpers::error('Not found params: public_key');
//            $bot = SmsBot::query()->where('public_key', $request->public_key)->first();
//            if (empty($bot))
//                return ApiHelpers::error('Not found module.');

        $result = $this->orderService->setStatus($order, 1);

        return ApiHelpers::success($result);
    }

    /**
     * Установить статус 3 (Запросить еще одну смс)
     *
     * Request[
     *  'user_id'
     *  'order_id'
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
        //        if(is_null($request->user_secret_key))
//            return ApiHelpers::error('Not found params: user_secret_key');
//        if(is_null($request->public_key))
//            return ApiHelpers::error('Not found params: public_key');
//            $bot = SmsBot::query()->where('public_key', $request->public_key)->first();
//            if (empty($bot))
//                return ApiHelpers::error('Not found module.');

        $result = $this->orderService->setStatus($order, 3);

        return ApiHelpers::success($result);
    }

    /**
     * Установить статус 6 (Подтвердить SMS-код и завершить активацию)
     *
     * Request[
     *  'user_id'
     *  'order_id'
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
        //        if(is_null($request->user_secret_key))
//            return ApiHelpers::error('Not found params: user_secret_key');
//        if(is_null($request->public_key))
//            return ApiHelpers::error('Not found params: public_key');
//            $bot = SmsBot::query()->where('public_key', $request->public_key)->first();
//            if (empty($bot))
//                return ApiHelpers::error('Not found module.');

        $result = $this->orderService->setStatus($order, 6);

        return ApiHelpers::success($result);
    }

    /**
     * Установить статус 8 (Отменить активацию (если номер Вам не подошел))
     *
     * Request[
     *  'user_id'
     *  'order_id'
     * ]
     *
     * @param Request $request
     * @return array|string
     */
    public function closeOrder(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if (is_null($request->order_id))
            return ApiHelpers::error('Not found params: order_id');
        $order = SmsOrder::query()->where(['org_id' => $request->order_id])->first();
        //        if(is_null($request->user_secret_key))
//            return ApiHelpers::error('Not found params: user_secret_key');
//        if(is_null($request->public_key))
//            return ApiHelpers::error('Not found params: public_key');
//            $bot = SmsBot::query()->where('public_key', $request->public_key)->first();
//            if (empty($bot))
//                return ApiHelpers::error('Not found module.');

        $result = $this->orderService->setStatus($order, 8);

        return ApiHelpers::success($result);
    }

    /**
     * Вспомогательный метод получения активного заказа
     *
     * Request[
     *  'user_id'
     *  'order_id'
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
        //        if(is_null($request->user_secret_key))
//            return ApiHelpers::error('Not found params: user_secret_key');
//        if(is_null($request->public_key))
//            return ApiHelpers::error('Not found params: public_key');
//            $bot = SmsBot::query()->where('public_key', $request->public_key)->first();
//            if (empty($bot))
//                return ApiHelpers::error('Not found module.');

        $result = $this->orderService->getActive($order);

        return ApiHelpers::success($result);
    }

    /**
     * Вспомогательный метод получения статуса заказа
     *
     * Request[
     *  'user_id'
     *  'order_id'
     * ]
     *
     * @param Request $request
     * @return array|string
     */
    public function getStatus(Request $request)
    {
        if (is_null($request->id))
            return ApiHelpers::error('Not found params: user_id');
        //        if(is_null($request->user_secret_key))
//            return ApiHelpers::error('Not found params: user_secret_key');
//        if(is_null($request->public_key))
//            return ApiHelpers::error('Not found params: public_key');
//            $bot = SmsBot::query()->where('public_key', $request->public_key)->first();
//            if (empty($bot))
//                return ApiHelpers::error('Not found module.');

        $result = $this->orderService->getStatus($request->id);

        return ApiHelpers::success($result);
    }

    /**
     * @param SmsOrder $order
     * @return array
     */
    private function generateOrderArray(SmsOrder $order): array
    {
        $result = [
            'id' => (integer)$order->org_id,
            'phone' => $order->phone,
            'time' => $order->time,
            'status' => $order->status,
            'codes' => $order->codes,
            'country' => $order->country,
            'operator' => $order->operator,
            'service' => $order->service,
            'cost' => $order->price / 100

        ];
        return $result;
    }
}
