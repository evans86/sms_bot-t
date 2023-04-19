<?php

namespace App\Services\Activate;

use App\Helpers\ApiHelpers;
use App\Http\Repositories\BotRepository;
use App\Http\Repositories\Resource\ResourceBotRepository;
use App\Http\Repositories\ResourceRepository;
use App\Http\Requests\Bot\BotCreateRequest;
use App\Http\Requests\Bot\BotUpdateRequest;
use App\Models\Bot\SmsBot;
use App\Models\Resource\ResourceBot;
use App\Services\MainService;

class BotService extends MainService
{
    private BotRepository $botRepository;
    private ResourceBotRepository $resourceBotRepository;
    private ResourceRepository $resourceRepository;

    public function __construct()
    {
        $this->botRepository = new BotRepository();
        $this->resourceRepository = new ResourceRepository();
        $this->resourceBotRepository = new ResourceBotRepository();
    }

    /**
     * @param BotCreateRequest $request
     * @return SmsBot
     * @throws \Exception
     */
    public function createBot(BotCreateRequest $request): SmsBot
    {
        try {
            $bot = new SmsBot();
            $bot->bot_id = $request->bot_id;
            $bot->public_key = $request->public_key;
            $bot->private_key = $request->private_key;
            $bot->version = 1;
            $bot->percent = 5;
            $bot->category_id = 0;

            $bot = $this->botRepository->save($bot);
            return $bot;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param BotUpdateRequest $request
     * @return SmsBot
     * @throws \Exception
     */
    public function updateBot(BotUpdateRequest $request): SmsBot
    {
        try {
            $bot = $this->botRepository->getByKeys($request->public_key, $request->private_key);

            $bot->version = $request->version;
            $bot->percent = $request->percent;
            $bot->api_key = $request->api_key;
            $bot->category_id = $request->category_id;

            $bot = $this->botRepository->save($bot);

            //надо передать только api_key и обработать для каждого ресурса из ключей
            $this->createResourceBot($bot->id, 1, $request->api_key);

            return $bot;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $bot_id
     * @param int $resource_id
     * @param string $api_key
     * @return void
     * @throws \Exception
     */
    public function createResourceBot(int $bot_id, int $resource_id, string $api_key)
    {
        try {
            $resource_bot = new ResourceBot();
            $resource_bot->resource_id = $resource_id;
            $resource_bot->bot_id = $bot_id;
            $resource_bot->api_key = $api_key;

            $this->resourceBotRepository->save($resource_bot);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }
}
