<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ApiHelpers;
use App\Http\Controllers\Controller;
use App\Models\Activate\SmsCountry;
use App\Models\Activate\SmsOperator;
use App\Models\User\SmsUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
            'telegram_id' => (integer) $user->telegram_id,
            'country' => $country->org_id,
            'operator' => $operator->title,
            'language' => $user->language
        ];
        return $result;
    }
}
