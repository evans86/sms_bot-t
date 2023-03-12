<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ApiHelpers;
use App\Http\Controllers\Controller;
use App\Models\Activate\SmsCountry;
use App\Models\Activate\SmsOperator;
use App\Models\Order\SmsOrder;
use App\Models\User\SmsUser;
use App\Services\Activate\OrderService;
use App\Services\Activate\UserService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService();
    }

    public function createOrder(Request $request)
    {
        try {
            if (is_null($request->user_id))
                return ApiHelpers::error('Not found params: user_id');
            $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
            if (is_null($request->service))
                return ApiHelpers::error('Not found params: service');
//        if(is_null($request->user_secret_key))
//            return ApiHelpers::error('Not found params: user_secret_key');
//        if(is_null($request->public_key))
//            return ApiHelpers::error('Not found params: public_key');

            $country = SmsCountry::query()->where(['id' => $user->country_id])->first();
            $operator = SmsOperator::query()->where(['id' => $user->operator_id])->first();
            $service = $request->service;

            $result = $this->orderService->createOrder($service, $operator->title, $country->org_id, $user->id);

            return ApiHelpers::success($result);
        } catch (\Exception $e) {
            return ApiHelpers::error($e->getMessage());
        }
    }

    public function getOrder(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if (is_null($request->order_id))
            return ApiHelpers::error('Not found params: order_id');
        $order = SmsOrder::query()->where(['org_id' => $request->order_id])->first();

        return ApiHelpers::success($this->generateOrderArray($order));
    }

    //8 Отменить активацию (если номер Вам не подошел)
    public function closeOrder(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if (is_null($request->order_id))
            return ApiHelpers::error('Not found params: order_id');
        $order = SmsOrder::query()->where(['org_id' => $request->order_id])->first();

        $result = $this->orderService->setStatus($order, 8);

        return ApiHelpers::success($result);
    }

    //1 - Сообщить, что SMS отправлен
    public function reportOrderSms(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if (is_null($request->order_id))
            return ApiHelpers::error('Not found params: order_id');
        $order = SmsOrder::query()->where(['org_id' => $request->order_id])->first();

        $result = $this->orderService->setStatus($order, 1);

        return ApiHelpers::success($result);
    }

        //?user_id=1028741753&order_id=

    //3 - Запросить еще одну смс
    public function secondSms(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if (is_null($request->order_id))
            return ApiHelpers::error('Not found params: order_id');
        $order = SmsOrder::query()->where(['org_id' => $request->order_id])->first();

        $result = $this->orderService->setStatus($order, 3);

        return ApiHelpers::success($result);
    }

    //6 - Подтвердить SMS-код и завершить активацию
    public function confirmOrder(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if (is_null($request->order_id))
            return ApiHelpers::error('Not found params: order_id');
        $order = SmsOrder::query()->where(['org_id' => $request->order_id])->first();

        $result = $this->orderService->setStatus($order, 6);

        return ApiHelpers::success($result);
    }

    public function getActive()
    {
        $result = $this->orderService->getActive();

        return ApiHelpers::success($result);
    }

    public function getStatus(Request $request)
    {
        if (is_null($request->id))
            return ApiHelpers::error('Not found params: user_id');

        $result = $this->orderService->getStatus($request->id);

        return ApiHelpers::success($result);
    }

    private function generateOrderArray(SmsOrder $order): array
    {
        $result = [
            'id' => (integer) $order->org_id,
            'phone' => $order->phone,
            'text' => 'сюда текст смс',
            'time' => $order->time,
            'status' => $order->status
        ];
        return $result;
    }
}
