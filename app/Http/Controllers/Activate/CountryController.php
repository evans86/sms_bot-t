<?php

namespace App\Http\Controllers\Activate;

use App\Http\Controllers\Controller;
use App\Models\Activate\SmsCountry;
use Illuminate\Http\Request;
use App\Services\Activate\CountryService;

class CountryController extends Controller
{
    private CountryService $countryService;

    public function __construct()
    {
        $this->countryService = new CountryService();
    }


    public function index()
    {
        $this->countryService->getApiCountries();

        $countries = SmsCountry::paginate(10);

        return view('activate.country.index', compact(
            'countries',
        ));

    }
}
