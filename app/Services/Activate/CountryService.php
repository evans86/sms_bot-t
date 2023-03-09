<?php

namespace App\Services\Activate;

use App\Models\Activate\SmsCountry;
use App\Services\External\SmsActivateApi;
use App\Services\MainService;
use League\ISO3166\ISO3166;

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

        foreach ($countries as $key => $country) {

            try {
                $country_name = ((new ISO3166())->name($country['eng']))['alpha2'];
                $country_code = mb_strtolower($country_name);
            }catch (\Exception $e) {
                $country_code = null;
            }

            $data = [
                'org_id' => $country['id'],
                'name_ru' => $country['rus'],
                'name_en' => $country['eng'],
                'image' => $country_code
            ];

            $country = SmsCountry::updateOrCreate($data);
            $country->save();

            $this->operatorService->getOperatorsByCountry($country->id, $country->org_id);
        }
    }
}
