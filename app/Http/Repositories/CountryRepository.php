<?php

namespace App\Http\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Activate\SmsCountry;
use Illuminate\Database\Eloquent\Collection;

class CountryRepository extends CoreRepository
{
    public function getModelClass(): string
    {
        return SmsCountry::class;
    }

    public function getCountry(int $id): SmsCountry
    {
        $country = $this->startConditions()::query()->where('id', $id)->first();
        if(empty($country))
            throw new NotFoundException('Country not found');
        return $country;
    }

    /**
     * @param string $iso
     * @return SmsCountry
     */
    public function getCountryByIsoTwo(string $iso): SmsCountry
    {
        $iso = mb_strtoupper($iso);
        $country = $this->startConditions()::query()->where('iso_two', $iso)->first();
        if(empty($country))
            throw new NotFoundException('Country not found');
        return $country;
    }

    /**
     * @param string $name_en
     * @return SmsCountry
     */
    public function getCountryByEngName(string $name_en): SmsCountry
    {
        $country = $this->startConditions()::query()->where('name_en', $name_en)->first();
        if(empty($country))
            throw new NotFoundException('Country not found');
        return $country;
    }

    /**
     * @return Collection
     */
    public function getCountries(): Collection
    {
        return $this->startConditions()::paginate(10);
    }
}
