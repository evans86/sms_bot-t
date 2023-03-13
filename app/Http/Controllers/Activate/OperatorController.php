<?php

namespace App\Http\Controllers\Activate;

use App\Http\Controllers\Controller;
use App\Models\Activate\SmsCountry;
use App\Models\Activate\SmsOperator;
use App\Services\Activate\OperatorService;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    /**
     * Получение операторов по стране
     *
     * @param $country_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($country_id)
    {
        $countryOperators = SmsOperator::query()->where(['country_id' => $country_id])->get();

        return view('activate.operator.index', compact(
            'countryOperators',
        ));
    }
}
