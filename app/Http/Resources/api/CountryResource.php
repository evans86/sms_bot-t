<?php

namespace App\Http\Resources\api;

use App\Models\Activate\SmsCountry;
use App\Models\User\SmsUser;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->org_id,
            'title_ru' => $this->name_ru,
            'title_eng' => $this->name_en,
            'image' => $this->image,
        ];
    }

    /**
     * @param SmsUser $user
     * @param SmsCountry $country
     * @return array
     */
    public static function generateUserArray(SmsUser $user, SmsCountry $country): array
    {
        return [
            'id' => $user->telegram_id,
            'country' => $country->org_id,
            'language' => $user->language,
            'service' => $user->service
        ];
    }
}
