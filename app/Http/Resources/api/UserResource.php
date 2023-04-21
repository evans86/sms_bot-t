<?php

namespace App\Http\Resources\api;

use App\Models\Activate\SmsCountry;
use App\Models\User\SmsUser;

class UserResource
{
    /**
     * @param SmsUser $user
     * @param SmsCountry $country
     * @return array
     */
    public static function generateUserArray(SmsUser $user, SmsCountry $country): array
    {
        return [
            'id' => (integer)$user->telegram_id,
            'country' => $country->id,
            'language' => $user->language,
            'service' => $user->service
        ];
    }
}
