<?php

namespace App\Http\Repositories\User;

use App\Exceptions\NotFoundException;
use App\Http\Repositories\CoreRepository;
use App\Models\User\SmsUser;

class UserRepository extends CoreRepository
{
    /**
     * @return string
     */
    public function getModelClass(): string
    {
        return SmsUser::class;
    }

    /**
     * @param int $telegram_id
     * @return SmsUser
     */
    public function getUser(int $telegram_id): SmsUser
    {
        $user = $this->startConditions()::query()->where('telegram_id', $telegram_id)->first();
        if(empty($user))
            throw new NotFoundException('User not found');
        return $user;
    }

    /**
     * @param int $telegram_id
     * @return SmsUser|null
     */
    public function getUserByTelegram(int $telegram_id): ?SmsUser
    {
        return $this->startConditions()::query()->where('telegram_id', $telegram_id)->first();
    }
}
