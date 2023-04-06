<?php

namespace App\Http\Repositories\Resource;

use App\Http\Repositories\CoreRepository;
use App\Models\Resource\ResourceService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ResourceServicesRepository extends CoreRepository
{
    public function getModelClass(): string
    {
        return ResourceService::class;
    }

    public function getByResource(int $resource_id): LengthAwarePaginator
    {
        return $this->startConditions()::query()->where('resource_id', $resource_id)->paginate(20);
    }

    public function getAllById(int $resource_id): Collection
    {
        return $this->startConditions()::query()->where('resource_id', $resource_id)->get();
    }

    public function getByResourceOrg(int $resource_id, string $org_id): Collection
    {
        return $this->startConditions()::query()->where('resource_id', $resource_id)->where('org_id', $org_id)->get();
    }

    public function deleteByResource(int $resource_id): void
    {
        $this->startConditions()::where('resource_id', $resource_id)->delete();
    }
}
