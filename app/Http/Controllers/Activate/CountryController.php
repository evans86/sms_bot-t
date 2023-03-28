<?php

namespace App\Http\Controllers\Activate;

use App\Exceptions\NotFoundException;
use App\Http\Repositories\CountryRepository;
use App\Http\Requests\Country\CountryUpdateRequest;
use App\Models\Activate\SmsCountry;
use App\Services\Activate\CountryService;

class CountryController extends BaseController
{
    /**
     * @var CountryService
     */
    private CountryService $countryService;
    /**
     * @var CountryRepository
     */
    private CountryRepository $countryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->countryRepository = app(CountryRepository::class);
        $this->countryService = new CountryService();
    }

    /**
     * Получение списка стран
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $countries = SmsCountry::paginate(10);

        return view('activate.country.index', compact(
            'countries',
        ));
    }

    /**
     * @param $country
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($country)
    {
        try {
            $country = $this->countryRepository->getCountry($country);
        } catch (NotFoundException $e) {
            return back(404)
                ->withErrors(['msg' => 'Запись не найдена'])
                ->withInput();
        }
        return view('activate.country.edit', compact(
            'country'
        ));
    }

    /**
     * @param CountryUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CountryUpdateRequest $request, $id)
    {
        try {
            $country = $this->countryRepository->getCountry($id);
        } catch (NotFoundException $e) {
            return back(404)
                ->withErrors(['msg' => 'Запись не найдена'])
                ->withInput();
        }

        $result = $country->fill($request->getData())->save();

        if ($result) {
            return redirect()->route('activate.country.index')
                ->with(['success' => 'Успех']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * @param SmsCountry $country
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SmsCountry $country)
    {
        $country->delete();
        return redirect()->route('activate.country.index');
    }
}
