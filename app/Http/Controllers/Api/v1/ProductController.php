<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ApiHelpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\api\ProductResource;
use App\Models\Bot\SmsBot;
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
     * Передача значений доступных сервисов
     *
     * @param Request $request
     * @return array|string
     */
    public function index(Request $request)
    {
        if (is_null($request->public_key))
            return ApiHelpers::error('Not found params: public_key');
        $bot = SmsBot::query()->where('public_key', $request->public_key)->first();
        $products = $this->productService->getPricesCountry($bot);
        return ApiHelpers::success($products);
    }

    /**
     * Задать значение сервиса
     *
     * @param Request $request
     * @return array|string
     */
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
        return ApiHelpers::success(ProductResource::generateUserArray($user));
    }
}
