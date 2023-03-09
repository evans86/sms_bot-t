<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ApiHelpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\api\OperatorResource;
use App\Models\Activate\SmsCountry;
use App\Models\Activate\SmsOperator;
use App\Models\User\SmsUser;
use App\Services\Activate\OperatorService;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    private OperatorService $operatorService;

    public function __construct()
    {
        $this->operatorService = new OperatorService();
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $country = SmsCountry::query()->where(['org_id' => $request->country])->first();
        $result = new OperatorResource($this->operatorService->getOperatorsByCountry($country->org_id));
        return ApiHelpers::success($result);
    }


    public function setOperator(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        if(is_null($request->operator))
            return ApiHelpers::error('Not found params: operator');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if(is_null($user))
            return ApiHelpers::error('Not found: user');
        $country = SmsCountry::query()->where(['org_id' => $user->country_id])->first();
        $operator = SmsOperator::query()->where([
            'name' => $request->operator,
            'country_id' => $country->id
        ])->first();
        if(is_null($operator))
            return ApiHelpers::error('Not found: operator');
        $user->country_id = $country->id;
        $user->operator_id = $operator->id;
        $user->save();
        return ApiHelpers::success($this->generateUserArray($user, $country, $operator));
    }

    private function generateUserArray(SmsUser $user, SmsCountry $country, SmsOperator $operator): array
    {
        $result = [
            'telegram_id' => $user->telegram_id,
            'country' => $country->org_id,
            'operator' => $operator->title,
            'language' => $user->language
        ];
        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
