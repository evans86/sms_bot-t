<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ApiHelpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\api\OperatorResource;
use App\Models\Activate\SmsCountry;
use App\Models\Activate\SmsOperator;
use App\Models\User\SmsUser;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    /**
     * Передача значений операторов для страны
     *
     * Request[
     *  'country'
     * ]
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $country = SmsCountry::query()->where(['org_id' => $request->country])->first();
        $operators = $country->operators;
        $result = [];
        foreach ($operators as $operator) {
            $result[] = $operator->title;
        }
        return ApiHelpers::success($result);
    }

    /**
     * Задать значение оператора
     *
     * Request[
     *  'user_id'
     *  'operator'
     * ]
     *
     * @param Request $request
     * @return array|string
     */
    public function setOperator(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        if (is_null($request->operator))
            return ApiHelpers::error('Not found params: operator');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if (is_null($user))
            return ApiHelpers::error('Not found: user');
        $country = SmsCountry::query()->where(['id' => $user->country_id])->first();
        $operator = SmsOperator::query()->where([
            'title' => $request->operator,
            'country_id' => $country->id
        ])->first();
        if (is_null($operator))
            return ApiHelpers::error('Not found: operator');
        $user->country_id = $country->id;
        $user->operator_id = $operator->id;
        $user->save();
        return ApiHelpers::success(OperatorResource::generateUserArray($user, $country, $operator));
    }
}
