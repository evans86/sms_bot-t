<?php

namespace App\Http\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Service\SmsService;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository extends CoreRepository
{
    /**
     * @return string
     */
    public function getModelClass(): string
    {
        return SmsService::class;
    }

    /**
     * @param int $id
     * @return SmsService
     */
    public function getService(int $id): SmsService
    {
        $service = $this->startConditions()::query()->where('id', $id)->first();
        if(empty($service))
            throw new NotFoundException('Service not found');
        return $service;
    }

    /**
     * @param string $first_key
     * @return SmsService
     */
    public function getServiceByFirstKey(string $first_key): SmsService
    {
        $service = $this->startConditions()::query()->where('first_key', $first_key)->first();
        if(empty($service))
            throw new NotFoundException('Service not found');
        return $service;
    }

    /**
     * @return Collection
     */
    public function getServices(): Collection
    {
        return $this->startConditions()::paginate(10);
    }
}
