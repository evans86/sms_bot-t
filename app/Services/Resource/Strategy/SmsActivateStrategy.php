<?php

namespace App\Services\Resource\Strategy;

use App\Models\Resource\SmsResource;
use App\Services\External\SmsActivateApi;
use App\Services\Resource\ResourceInterface;

class SmsActivateStrategy extends MainStrategy implements ResourceInterface
{
    public function create(array $params): SmsResource
    {
        // TODO: Implement create() method.
    }

    public function parseCountry(): array
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key_activate'));
        $countries = $smsActivate->getCountries();

        $result = [];
        foreach ($countries as $key => $country){

            array_push($result, [
                'org_id' => $country['id'],
                'name_en' => $country['eng']
            ]);
        }

//        dd($result);

        return $result;

    }
}
