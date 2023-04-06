<?php

namespace App\Http\Repositories\Resource;

use App\Exceptions\NotFoundException;
use App\Http\Repositories\CoreRepository;
use App\Models\Activate\SmsCountry;
use App\Models\Resource\ResourceCountry;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ResourceCountryRepository extends CoreRepository
{
    public function getModelClass(): string
    {
        return ResourceCountry::class;
    }

    public function getByResource(int $resource_id): LengthAwarePaginator
    {
        return $this->startConditions()::query()->where('resource_id',$resource_id)->paginate(20);
    }

    public function getAllById(int $resource_id): Collection
    {
        return $this->startConditions()::query()->where('resource_id',$resource_id)->get();
    }

    public function deleteByResource(int $resource_id): void
    {
        $this->startConditions()::where('resource_id', $resource_id)->delete();
    }

    public function getCountryOrgId(string $org_id): ResourceCountry
    {
        $country = $this->startConditions()::query()->where('org_id', $org_id)->first();
        if(empty($country))
            throw new NotFoundException('Country not found');
        return $country;
    }
}
