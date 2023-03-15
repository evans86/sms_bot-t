<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ApiHelpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\api\CountryResource;
use App\Models\Activate\SmsCountry;
use App\Models\Activate\SmsOperator;
use App\Models\User\SmsUser;
use App\Services\Activate\CountryService;
use App\Services\Activate\ProductService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * @var CountryService
     */
    private CountryService $countryService;

    public function __construct()
    {
        $this->countryService = new CountryService();
    }
    /**
     * Передача списка стран согласно коллекции
     *
     *
     */
    public function index(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if (is_null($user))
            return ApiHelpers::error('Not found: user');
//        $user->language = $request->language;

//        $country = SmsCountry::query()->where(['id' => $user->country_id])->first();
//        $operator = SmsOperator::query()->where(['id' => $user->operator_id])->first();
        $countries = $this->countryService->getPricesService($user->service);
        return ApiHelpers::success($countries);
//        $countries = CountryResource::collection(SmsCountry::all());
//        return ApiHelpers::success($result);
    }

    /**
     * Задать значение страны
     *
     * Request[
     *  'user_id'
     *  'operator'
     *  'country'
     * ]
     *
     * @param Request $request
     * @return array|string
     */
    public function setCountry(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        if (is_null($request->operator))
            return ApiHelpers::error('Not found params: operator');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if (is_null($user))
            return ApiHelpers::error('Not found: user');
        $country = SmsCountry::query()->where(['org_id' => $request->country])->first();
        if (is_null($country))
            return ApiHelpers::error('Not found: country');
        $operator = SmsOperator::query()->where(['id' => $user->operator_id])->first();
        $user->country_id = $country->id;
        $user->operator_id = $operator->id;
        $user->save();
        return ApiHelpers::success($this->generateUserArray($user, $country, $operator));
    }

    /**
     * @param SmsUser $user
     * @param SmsCountry $country
     * @param SmsOperator $operator
     * @return array
     */
    private function generateUserArray(SmsUser $user, SmsCountry $country, SmsOperator $operator): array
    {
        $result = [
            'id' => $user->telegram_id,
            'country' => $country->org_id,
            'operator' => $operator->title,
            'language' => $user->language,
            'service' => $user->service
        ];
        return $result;
    }
}
