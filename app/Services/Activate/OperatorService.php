<?php

namespace App\Services\Activate;

use App\Models\Activate\SmsOperator;
use App\Services\External\SmsActivateApi;
use App\Services\MainService;

class OperatorService extends MainService
{
    /**
     * Получение операторов по стране из API
     *
     * @param $country_id
     * @param $country_org_id
     * @return mixed|null
     */
    public function getOperatorsByCountry($country_id, $country_org_id)
    {
        //оставить свой API
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

        $operators = $smsActivate->getOperators($country_org_id);
        if (key_exists('countryOperators', $operators)) {
            $operators = $operators['countryOperators'][$country_org_id];

            $this->formingOperatorArr($operators, $country_id);
        }
    }

    /**
     * @param $operators
     * @param $country_id
     * @return void
     */
    private function formingOperatorArr($operators, $country_id)
    {
        foreach ($operators as $key => $operator) {

            $dataOperator = [
                'org_id' => $key,
                'title' => $operator,
                'country_id' => $country_id,
            ];

            SmsOperator::create($dataOperator);
        }
    }
}
