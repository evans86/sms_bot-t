<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ApiHelpers;
use App\Http\Controllers\Controller;
use App\Models\Activate\SmsCountry;
use App\Models\Activate\SmsOperator;
use App\Models\User\SmsUser;
use App\Services\Activate\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    private ProductService $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    /**
     * Передача значений доступных сервисов для страны и оператора
     *
     * Request[
     *  'user_id'
     * ]
     *
     * @param Request $request
     * @return array|string
     */
    public function index(Request $request)
    {
//        if (is_null($request->user_id))
//            return ApiHelpers::error('Not found params: user_id');
//        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
//        if (is_null($user))
//            return ApiHelpers::error('Not found: user');
//        $user->language = $request->language;
//
//        $country = SmsCountry::query()->where(['id' => $user->country_id])->first();
//        $operator = SmsOperator::query()->where(['id' => $user->operator_id])->first();

        $products = $this->productService->getPricesCountry();
        return ApiHelpers::success($products);
    }

    public function setService(Request $request)
    {
        if (is_null($request->user_id))
            return ApiHelpers::error('Not found params: user_id');
        if (is_null($request->service))
            return ApiHelpers::error('Not found params: service');
        $user = SmsUser::query()->where(['telegram_id' => $request->user_id])->first();
        if (is_null($user))
            return ApiHelpers::error('Not found: user');
        $user->service = $request->service;
        $user->save();
        return ApiHelpers::success($this->generateUserArray($user));
    }

    /**
     * @param SmsUser $user
     * @param SmsCountry $country
     * @param SmsOperator $operator
     * @return array
     */
    private function generateUserArray(SmsUser $user): array
    {
        $result = [
            'id' => $user->telegram_id,
            'country' => $user->org_id,
            'operator' => $user->title,
            'language' => $user->language,
            'service' => $user->service
        ];
        return $result;
    }
}
