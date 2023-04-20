<?php

namespace App\Http\Repositories\Resource;

use App\Exceptions\NotFoundException;
use App\Http\Repositories\CoreRepository;
use App\Models\Resource\ResourceService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ResourceServicesRepository extends CoreRepository
{
    /**
     * @return string
     */
    public function getModelClass(): string
    {
        return ResourceService::class;
    }

    /**
     * @param int $resource_id
     * @return LengthAwarePaginator
     */
    public function getByResource(int $resource_id): LengthAwarePaginator
    {
        return $this->startConditions()::query()->where('resource_id', $resource_id)->paginate(20);
    }

    /**
     * @param int $resource_id
     * @return Collection
     */
    public function getAllById(int $resource_id): Collection
    {
        return $this->startConditions()::query()->where('resource_id', $resource_id)->get();
    }

    /**
     * @param string $org_id
     * @return ResourceService
     */
    public function getServiceOrgId(string $org_id): ResourceService
    {
        $service = $this->startConditions()::query()->where('org_id', $org_id)->first();
        if(empty($service))
            throw new NotFoundException('Service not found');
        return $service;
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
