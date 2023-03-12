<?php

namespace App\Services\Activate;

use App\Models\Activate\SmsCountry;
use App\Services\External\SmsActivateApi;
use App\Services\MainService;

class CountryService extends MainService
{
    private OperatorService $operatorService;

    public function __construct()
    {
        $this->operatorService = new OperatorService();
    }

    public function getApiCountries()
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

        $countries = $smsActivate->getCountries();
//        $countries = json_decode($countries, true);

        foreach ($countries as $key => $country) {

            $data = [
                'org_id' => $country['id'],
                'name_ru' => $country['rus'],
                'name_en' => $country['eng'],
                'image' => 'https://sms-activate.org/assets/ico/country/' . $country['id'] . '.png'
            ];

            $country = SmsCountry::updateOrCreate($data);
            $country->save();

            $this->operatorService->getOperatorsByCountry($country->id, $country->org_id);
        }
    }
}
