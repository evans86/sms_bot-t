<?php

namespace App\Services\Activate;

use App\Http\Repositories\Resource\ResourceCountryRepository;
use App\Http\Repositories\Resource\ResourceServicesRepository;
use App\Http\Repositories\ResourceRepository;
use App\Models\Dto\CountryDto;
use App\Models\Dto\ServiceDto;
use App\Models\Resource\ResourceCountry;
use App\Services\MainService;
use App\Services\Resource\ResourceStrategy;

class ResourceService extends MainService
{
    /**
     * @var ResourceRepository
     */
    private ResourceRepository $resources;
    /**
     * @var ResourceCountryRepository
     */
    private ResourceCountryRepository $resourceCountries;
    /**
     * @var ResourceServicesRepository
     */
    private ResourceServicesRepository $resourceServices;

    public function __construct()
    {
        $this->resources = new ResourceRepository();
        $this->resourceCountries = new ResourceCountryRepository();
        $this->resourceServices = new ResourceServicesRepository();
    }

    /**
     * Сброс стран у ресурса и перегенерация
     * @param int $resource_id
     * @throws \Exception
     */
    public function resetCountry(int $resource_id): void
    {
        $resource = $this->resources->getResource($resource_id);

        $this->resourceCountries->deleteByResource($resource_id);
        $strategy = new ResourceStrategy($resource);
        $countriesDto = $strategy->parseCountry();

        try {
            foreach ($countriesDto as $countryDto) {
                $this->createResourceCountry($countryDto, $resource->id);
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Связывание страны и ресурса
     * @param CountryDto $dto
     * @param int $resource_id
     */
    public function createResourceCountry(CountryDto $dto, int $resource_id): void
    {
        $resourceCountry = new ResourceCountry();
        $resourceCountry->resource_id = $resource_id;
        $resourceCountry->country_id = $dto->id;
        $resourceCountry->org_id = $dto->org_id;
        $resourceCountry->save();
    }

    /**
     * Сброс сервисов и перегенерация
     * @param int $resource_id
     * @throws \Exception
     */
    public function resetService(int $resource_id): void
    {
        $resource = $this->resources->getResource($resource_id);

        $this->resourceServices->deleteByResource($resource_id);
        $strategy = new ResourceStrategy($resource);
        $servicesDto = $strategy->parseService();

        try {
            foreach ($servicesDto as $serviceDto) {
                $this->createResourceService($serviceDto, $resource->id);
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Связывает сервис и страну
     * @param ServiceDto $dto
     * @param int $resource_id
     */
    public function createResourceService(ServiceDto $dto, int $resource_id): void
    {
        $resourceCountry = new \App\Models\Resource\ResourceService();
        $resourceCountry->resource_id = $resource_id;
        $resourceCountry->service_id = $dto->id;
        $resourceCountry->org_id = $dto->org_id;
        $resourceCountry->save();
    }

    /**
     * Вызывается в крон и выполняется раз в минуту
     */
    public function updateResourceServiceCountry()
    {
        $resources = $this->resources->getResources();
        foreach ($resources as $resource)
        {
            $strategy = new ResourceStrategy($resource);
            $strategy->updateServiceCountry();
        }
    }
}
