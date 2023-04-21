<?php

namespace App\Http\Repositories\Resource;

use App\Http\Repositories\CoreRepository;
use App\Models\Resource\ResourceServiceCountry;
use Illuminate\Pagination\LengthAwarePaginator;

class ResourceServicesCountriesRepository extends CoreRepository
{
    /**
     * @return string
     */
    public function getModelClass(): string
    {
        return ResourceServiceCountry::class;
    }

    /**
     * @param int $resource_id
     * @return LengthAwarePaginator
     */
    public function getByResource(int $resource_id): LengthAwarePaginator
    {
        return $this->startConditions()::query()->where('resource_id',$resource_id)->paginate(20);
    }

    /**
     * @param int $resource_id
     * @return void
     */
    public function deleteByResource(int $resource_id): void
    {
        $this->startConditions()::where('resource_id', $resource_id)->delete();
    }
}
