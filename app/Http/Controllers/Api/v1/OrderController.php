<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ApiHelpers;
use App\Http\Controllers\Controller;
use App\Models\Activate\SmsCountry;
use App\Models\Activate\SmsOperator;
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
        if(is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if(is_null($request->service))
            return ApiHelpers::error('Not found params: service');
//        if(is_null($request->user_secret_key))
//            return ApiHelpers::error('Not found params: user_secret_key');
//        if(is_null($request->public_key))
//            return ApiHelpers::error('Not found params: public_key');

        $country = SmsCountry::query()->where(['id' => $user->country_id])->first();
        $operator = SmsOperator::query()->where(['id' => $user->operator_id])->first();
        $service = $request->service;

        $result = $this->orderService->createOrder($service, $operator->title, $country->org_id);

        return ApiHelpers::success($result);
    }
}
