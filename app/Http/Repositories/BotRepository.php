<?php

namespace App\Http\Repositories;

use App\Exceptions\NotFoundException;
use App\Helpers\ApiHelpers;
use App\Models\Bot\SmsBot;
use Illuminate\Database\Eloquent\Collection;

class BotRepository extends CoreRepository
{
    public function getModelClass(): string
    {
        return SmsBot::class;
    }

    public function getBot(int $id): SmsBot
    {
        $bot = $this->startConditions()::query()->where('id', $id)->first();
        if(empty($bot))
            throw new NotFoundException('Bot not found');
        return $bot;
    }

    public function save(SmsBot $bot): SmsBot
    {
        try {
            if ($bot->save())
                return $bot;
        } catch (\Exception $e) {
            throw new NotFoundException('Bot not save');
        }
    }

    public function getByKeys(string $public_key, string $private_key): SmsBot
    {
        $bot = $this->startConditions()::query()->where('public_key', $public_key)
            ->where('private_key', $private_key)->first();
        if(empty($bot))
            throw new NotFoundException('Not found module.');
        return $bot;
    }
}
