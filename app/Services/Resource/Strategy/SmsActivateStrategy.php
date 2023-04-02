<?php

namespace App\Services\Resource\Strategy;

use App\Http\Repositories\CountryRepository;
use App\Models\Dto\CountryDto;
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

        $countriesRep = new CountryRepository();

        $result = [];
        $error = [];
        foreach ($countries as $key => $country) {
            $name_en = $country['eng'];
            $org_id = $country['id'];
            try {
                $country = $countriesRep->getCountryByEngName($name_en);
                $dto = new CountryDto();
                $dto->setCountry($country);
                $dto->org_id = $org_id;
                array_push($result, $dto);
            } catch (\Exception $e) {
                array_push($error, $name_en);
            }

        }
        return $result;
    }

    public function parseService(): array
    {
        // TODO: Implement parseService() method.
    }
}
