<?php

namespace App\Services\Activate;

use App\Models\Activate\SmsCountry;
use App\Models\Activate\SmsOperator;
use App\Services\External\SmsActivateApi;
use App\Services\MainService;

class OperatorService extends MainService
{
    /**
     * @param $country_org
     * @return mixed|null
     */
    public function getOperatorsByCountry($country_org)
    {
        $smsActivate = new SmsActivateApi(env('SIM_ACTIVATE_KEY'));

        $operators = $smsActivate->getOperators($country_org);

        if(array_key_exists('countryOperators', $operators))
            return $operators['countryOperators'][$country_org];
        else
            return null;
    }
}
