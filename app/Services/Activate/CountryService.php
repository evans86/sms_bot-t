<?php

namespace App\Services\Activate;

use App\Models\Activate\SmsCountry;
use App\Services\External\SmsActivateApi;
use App\Services\MainService;

class CountryService extends MainService
{
    /**
     * @var OperatorService
     */
    private OperatorService $operatorService;

    public function __construct()
    {
        $this->operatorService = new OperatorService();
    }

    /**
     * Получение, добавление стран и их операторов из API сервиса
     * @return void
     */
    public function getApiCountries()
    {
        //оставить свой API
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

        $countries = $smsActivate->getCountries();

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

    /**
     * Список стран по сервису
     *
     * @param $bot
     * @param $service
     * @return array
     */
    public function getPricesService($bot, $service = null)
    {
        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));

        $countries = $smsActivate->getTopCountriesByService($service, true);

        $result = [];
        foreach ($countries as $key => $country) {
            $smsCountry = SmsCountry::query()->where(['org_id' => $country['country']])->first();

            $price = $country["retail_price"];
            $pricePercent = $price + ($price * ($bot->percent / 100));

            array_push($result, [
                'id' => $smsCountry->org_id,
                'title_ru' => $smsCountry->name_ru,
                'title_eng' => $smsCountry->name_en,
                'image' => $smsCountry->image,
                'count' => $country["count"],
                'cost' => $pricePercent,
            ]);
        }

        return $result;
    }
}
