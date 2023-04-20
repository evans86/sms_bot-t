<?php


namespace App\Http\Repositories;


use App\Exceptions\NotFoundException;
use App\Models\Resource\SmsResource;
use Illuminate\Database\Eloquent\Collection;

class ResourceRepository extends CoreRepository
{
    /**
     * @return string
     */
    public function getModelClass(): string
    {
        return SmsResource::class;
    }

    /**
     * @param int $id
     * @return SmsResource
     */
    public function getResource(int $id): SmsResource
    {
        $resource = $this->startConditions()::query()->where('id', $id)->first();
        if(empty($resource))
            throw new NotFoundException('Resource not found');
        return $resource;
    }

    /**
     * @param string $title
     * @return SmsResource
     */
    public function getByTitle(string $title): SmsResource
    {
        $resource = $this->startConditions()::query()->where('title', $title)->first();
        if(empty($resource))
            throw new NotFoundException('Resource not found');
        return $resource;
    }

    /**
     * @return Collection
     */
    public function getResources(): Collection
    {
        return $this->startConditions()::all();
    }
}
