<?php

namespace App\Http\Repositories\Resource;

use App\Exceptions\NotFoundException;
use App\Http\Repositories\CoreRepository;
use App\Models\Resource\ResourceBot;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ResourceBotRepository extends CoreRepository
{
    public function getModelClass(): string
    {
        return ResourceBot::class;
    }

    public function save(ResourceBot $resource_bot): ResourceBot
    {
        try {
            if ($resource_bot->save())
                return $resource_bot;
        } catch (\Exception $e) {
            throw new NotFoundException('Resource Bot not save');
        }
    }

    public function getByBot(int $bot_id): LengthAwarePaginator
    {
        return $this->startConditions()::query()->where('bot_id', $bot_id)->paginate(20);
    }

    public function getByBotResource(int $bot_id, string $resource_id): ?ResourceBot
    {
        return $this->startConditions()::query()->where('bot_id', $bot_id)
            ->where('resource_id', $resource_id)->first();
    }
}
