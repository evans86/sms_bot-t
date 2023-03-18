<?php

namespace App\Http\Resources\api;

use App\Models\Activate\SmsCountry;
use App\Models\Activate\SmsOperator;
use App\Models\User\SmsUser;

class UserResource
{
    /**
     * @param SmsUser $user
     * @param SmsCountry $country
     * @param SmsOperator $operator
     * @return array
     */
    public static function generateUserArray(SmsUser $user, SmsCountry $country, SmsOperator $operator): array
    {
        return [
            'id' => (integer)$user->telegram_id,
            'country' => $country->org_id,
            'operator' => $operator->title,
            'language' => $user->language,
            'service' => $user->service
        ];
    }
}
