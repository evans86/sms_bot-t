<?php

namespace App\Http\Controllers\Activate;

use App\Http\Controllers\Controller;
use App\Models\Activate\SmsCountry;
use App\Models\Activate\SmsOperator;
use App\Services\Activate\OperatorService;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    private OperatorService $operatorService;

    public function __construct()
    {
        $this->operatorService = new OperatorService();
    }

    public function index($org_id)
    {
        $countryOperators = $this->operatorService->getOperatorsByCountry($org_id);

        return view('activate.operator.index', compact(
            'countryOperators',
        ));

    }
}
