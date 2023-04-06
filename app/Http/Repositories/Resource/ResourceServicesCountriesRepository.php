<?php

namespace App\Http\Repositories\Resource;

use App\Exceptions\NotFoundException;
use App\Http\Repositories\CoreRepository;
use App\Models\Activate\SmsCountry;
use App\Models\Resource\ResourceServiceCountry;
use Illuminate\Pagination\LengthAwarePaginator;

class ResourceServicesCountriesRepository extends CoreRepository
{
    public function getModelClass(): string
    {
        return ResourceServiceCountry::class;
    }

    public function getByResource(int $resource_id): LengthAwarePaginator
    {
        return $this->startConditions()::query()->where('resource_id',$resource_id)->paginate(20);
    }

    public function deleteByResource(int $resource_id): void
    {
        $this->startConditions()::where('resource_id', $resource_id)->delete();
    }
}
