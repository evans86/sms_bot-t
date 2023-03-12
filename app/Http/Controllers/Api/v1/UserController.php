<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ApiHelpers;
use App\Http\Controllers\Controller;
use App\Models\Activate\SmsCountry;
use App\Models\Activate\SmsOperator;
use App\Models\User\SmsUser;
use App\Services\Activate\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function getBalance()
    {
        $result = $this->userService->getBalance();

        return ApiHelpers::success($result);
    }

    public function getUser(Request $request)
    {
        if(is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if(is_null($user)) {
            $user = new SmsUser();
            $country = SmsCountry::query()->first();
            $operator = SmsOperator::query()->where(['country_id' => $country->id])->first();
            $user->telegram_id = $request->user_id;
            $user->country_id = $country->id;
            $user->operator_id = $operator->id;
            $user->language = SmsUser::LANGUAGE_RU;
            $user->save();
        } else {
            $country = SmsCountry::query()->where(['id' => $user->country_id])->first();
            $operator = SmsOperator::query()->where(['id' => $user->operator_id])->first();
        }
        return ApiHelpers::success($this->generateUserArray($user, $country, $operator));
    }

    public function setLanguage(Request $request)
    {
        if(is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        if(is_null($request->language))
            return ApiHelpers::error('Not found params: language');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if(is_null($user))
            return ApiHelpers::error('Not found: user');
        if($request->language != 'ru' && $request->language != 'eng')
            return ApiHelpers::error('Not found: language');
        $user->language = $request->language;
        $user->save();
        $country = SmsCountry::query()->where(['id' => $user->country_id])->first();
        $operator = SmsOperator::query()->where(['id' => $user->operator_id])->first();
        return ApiHelpers::success($this->generateUserArray($user, $country, $operator));
    }

    private function generateUserArray(SmsUser $user, SmsCountry $country, SmsOperator $operator): array
    {
        $result = [
            'id' => (integer) $user->telegram_id,
            'country' => $country->org_id,
            'operator' => $operator->title,
            'language' => $user->language
        ];
        return $result;
    }
}
