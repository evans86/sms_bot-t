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
}
