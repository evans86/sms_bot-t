<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ApiHelpers;
use App\Http\Controllers\Controller;
use App\Http\Repositories\BotRepository;
use App\Http\Requests\Bot\BotCreateRequest;
use App\Http\Requests\Bot\BotGetRequest;
use App\Http\Requests\Bot\BotUpdateRequest;
use App\Models\Bot\SmsBot;
use App\Services\Activate\BotService;
use Illuminate\Http\Request;

class BotController extends Controller
{
    /**
     * @var BotService
     */
    private BotService $botService;
    /**
     * @var BotRepository
     */
    private BotRepository $botRepository;

    public function __construct()
    {
        $this->botService = new BotService();
        $this->botRepository = new BotRepository();
    }

    /**
     * Запрос проверки доступности сервиса
     *
     * @return array
     */
    public function ping()
    {
        return ApiHelpers::successStr('OK');
    }

    /**
     * Запрос создания веб–модуля
     *
     * @param BotCreateRequest $request
     * @return array|string
     */
    public function create(BotCreateRequest $request)
    {
        try {
            $bot = $this->botService->createBot($request);
            return ApiHelpers::success($bot->toArray());
        } catch (\Exception $e) {
            return ApiHelpers::error($e->getMessage());
        }
    }

    /**
     * Получение актуальных настроек
     *
     * @param BotGetRequest $request
     * @return array|string
     */
    public function get(BotGetRequest $request)
    {
        try {
            $bot = $this->botRepository->getByKeys($request->public_key, $request->private_key);
            return ApiHelpers::success($bot->toArray());
        } catch (\Exception $e) {
            return ApiHelpers::error($e->getMessage());
        }
    }

    /**
     * Обновление настроек в модуле
     *
     * @param BotUpdateRequest $request
     * @return array|string
     */
    public function update(BotUpdateRequest $request)
    {
        try {
            $bot = $this->botService->updateBot($request);
            return ApiHelpers::success($bot->toArray());
        } catch (\Exception $e) {
            return ApiHelpers::error($e->getMessage());
        }
    }

    /**
     * Удаление модуля
     *
     * @param Request $request
     * @return array|string
     */
    public function delete(Request $request)
    {
        try {
            $bot = $this->botRepository->getByKeys($request->public_key, $request->private_key);
            $bot->delete();
            if (empty($bot))
                return ApiHelpers::success('OK');
            return ApiHelpers::error('Bot not delete.');
        } catch (\Exception $e) {
            return ApiHelpers::error($e->getMessage());
        }
    }
}
