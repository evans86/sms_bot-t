<?php

namespace App\Http\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Activate\SmsCountry;
use App\Models\Service\SmsService;
use Illuminate\Database\Eloquent\Collection;

class ServiceRepository extends CoreRepository
{
    public function getModelClass(): string
    {
        return SmsService::class;
    }

    public function get(int $id): SmsService
    {
        $service = $this->startConditions()::query()->where('id', $id)->first();
        if(empty($country))
            throw new NotFoundException('Country not found');
        return $service;
    }

    public function getAll(): Collection
    {
        return $this->startConditions()::all();
    }

    /**
     * @return Collection
     */
    public function getCountries(): Collection
    {
        return $this->startConditions()::paginate(10);
    }
}
