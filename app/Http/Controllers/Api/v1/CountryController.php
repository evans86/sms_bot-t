<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ApiHelpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\api\CountryResource;
use App\Models\Activate\SmsCountry;
use App\Models\Activate\SmsOperator;
use App\Models\User\SmsUser;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = CountryResource::collection(SmsCountry::all());
        return ApiHelpers::success($result);
    }

    public function setCountry(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        if(is_null($request->operator))
            return ApiHelpers::error('Not found params: operator');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if(is_null($user))
            return ApiHelpers::error('Not found: user');
        $country = SmsCountry::query()->where(['org_id' => $request->country])->first();
        if(is_null($country))
            return ApiHelpers::error('Not found: country');
        $operator = SmsOperator::query()->where(['id' => $user->operator_id])->first();
        $user->country_id = $country->id;
        $user->operator_id = $operator->id;
        $user->save();
        return ApiHelpers::success($this->generateUserArray($user, $country, $operator));
    }

    private function generateUserArray(SmsUser $user, SmsCountry $country, SmsOperator $operator): array
    {
        $result = [
            'id' => $user->telegram_id,
            'country' => $country->org_id,
            'operator' => $operator->title,
            'language' => $user->language
        ];
        return $result;
    }
}
