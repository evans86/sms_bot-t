<?php

namespace App\Services\Resource\Strategy;

use App\Models\Resource\SmsResource;
use App\Services\External\FiveSimApi;
use App\Services\Resource\ResourceInterface;

class FiveSimStrategy extends MainStrategy implements ResourceInterface
{
    public function create(array $params): SmsResource
    {
        // TODO: Implement create() method.
    }

    public function parseCountry(): array
    {
        $fiveSim = new FiveSimApi(config('services.key_activate.key_5sim'));
        $countries = $fiveSim->getCountries();

        $result = [];
        foreach ($countries as $key => $country){

            array_push($result, [
                'org_id' => $key,
                'name_en' => $country['text_en']
            ]);
        }

//        dd($result);

        return $result;
    }
}
