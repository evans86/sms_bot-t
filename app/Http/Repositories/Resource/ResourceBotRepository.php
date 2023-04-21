<?php

namespace App\Http\Repositories\Resource;

use App\Exceptions\NotFoundException;
use App\Http\Repositories\CoreRepository;
use App\Models\Resource\ResourceBot;
use Illuminate\Pagination\LengthAwarePaginator;

class ResourceBotRepository extends CoreRepository
{
    /**
     * @return string
     */
    public function getModelClass(): string
    {
        return ResourceBot::class;
    }

    /**
     * @param ResourceBot $resource_bot
     * @return ResourceBot
     */
    public function save(ResourceBot $resource_bot): ResourceBot
    {
        try {
            if ($resource_bot->save())
                return $resource_bot;
        } catch (\Exception $e) {
            throw new NotFoundException('Resource Bot not save');
        }
    }

    /**
     * @param int $bot_id
     * @return LengthAwarePaginator
     */
    public function getByBot(int $bot_id): LengthAwarePaginator
    {
        return $this->startConditions()::query()->where('bot_id', $bot_id)->paginate(20);
    }

    /**
     * @param int $bot_id
     * @param string $resource_id
     * @return ResourceBot|null
     */
    public function getByBotResource(int $bot_id, string $resource_id): ?ResourceBot
    {
        return $this->startConditions()::query()->where('bot_id', $bot_id)
            ->where('resource_id', $resource_id)->first();
    }
}
