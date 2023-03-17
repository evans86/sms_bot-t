<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ApiHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bot\BotCreateRequest;
use App\Http\Requests\Bot\BotGetRequest;
use App\Http\Requests\Bot\BotUpdateRequest;
use App\Models\Bot\SmsBot;
use Illuminate\Http\Request;

class BotController extends Controller
{
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
            $bot = new SmsBot();
            $bot->bot_id = $request->bot_id;
            $bot->public_key = $request->public_key;
            $bot->private_key = $request->private_key;
            $bot->version = 1;
            $bot->percent = 5;
            $bot->api_key = '';
            $bot->category_id = 0;
            if ($bot->save())
                return ApiHelpers::success($bot->toArray());
            return ApiHelpers::error('Bot not create.');
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
            $bot = SmsBot::query()->where('public_key', $request->public_key)->where('private_key', $request->private_key)->first();
            if (empty($bot))
                return ApiHelpers::error('Not found module.');
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
            $bot = SmsBot::query()->where('public_key', $request->public_key)->where('private_key', $request->private_key)->first();
            if (empty($bot))
                return ApiHelpers::error('Not found module.');
            $bot->version = $request->version;
            $bot->percent = $request->percent;
            $bot->api_key = $request->api_key;
            $bot->category_id = $request->category_id;
            if ($bot->save())
                return ApiHelpers::success($bot->toArray());
            return ApiHelpers::error('Bot not create.');
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
            $bot = SmsBot::query()->where('public_key', $request->public_key)->where('private_key', $request->private_key)->first();
            if (empty($bot))
                return ApiHelpers::error('Not found module.');
            $bot->delete();
//            if (empty($bot))
            return ApiHelpers::success('OK');
//            return ApiHelpers::error('Bot not delete.');
        } catch (\Exception $e) {
            return ApiHelpers::error($e->getMessage());
        }
    }
}
