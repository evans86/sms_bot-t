<?php

namespace App\Http\Repositories;

use App\Exceptions\NotFoundException;
use App\Helpers\ApiHelpers;
use App\Models\Bot\SmsBot;
use Illuminate\Database\Eloquent\Collection;

class BotRepository extends CoreRepository
{
    /**
     * @return string
     */
    public function getModelClass(): string
    {
        return SmsBot::class;
    }

    /**
     * @param int $id
     * @return SmsBot
     */
    public function getBot(int $id): SmsBot
    {
        $bot = $this->startConditions()::query()->where('id', $id)->first();
        if(empty($bot))
            throw new NotFoundException('Bot not found');
        return $bot;
    }

    /**
     * @param SmsBot $bot
     * @return SmsBot
     */
    public function save(SmsBot $bot): SmsBot
    {
        try {
            if ($bot->save())
                return $bot;
        } catch (\Exception $e) {
            throw new NotFoundException('Bot not save');
        }
    }

    /**
     * @param string $public_key
     * @param string $private_key
     * @return SmsBot
     */
    public function getByKeys(string $public_key, string $private_key): SmsBot
    {
        $bot = $this->startConditions()::query()->where('public_key', $public_key)
            ->where('private_key', $private_key)->first();
        if(empty($bot))
            throw new NotFoundException('Not found module.');
        return $bot;
    }
}
