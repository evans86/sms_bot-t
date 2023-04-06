<?php

namespace App\Services\Resource;

use App\Models\Dto\CountryDto;
use App\Models\Dto\ServiceDto;
use App\Models\Resource\SmsResource;
use App\Services\Resource\Strategy\FiveSimStrategy;
use App\Services\Resource\Strategy\SmsActivateStrategy;

class ResourceStrategy
{
    /**
     * @var ResourceInterface
     */
    private ResourceInterface $strategy;
    /**
     * @var SmsResource
     */
    private SmsResource $resource;

    public function __construct(SmsResource $resource)
    {
        $this->resource = $resource;
        switch ($this->resource->id) {
            case SmsResource::ACTIVATE_ID:
                $this->strategy = new SmsActivateStrategy($this->resource);
                break;
            case SmsResource::SIM5_ID:
                $this->strategy = new FiveSimStrategy($this->resource);
                break;
            default:
                throw new \Exception('Ресурс не найден');
        }
    }

    public function create(array $params): SmsResource
    {
        return $this->strategy->create($params);
    }

    /**
     * @return CountryDto[]
     */
    public function parseCountry(): array
    {
        return $this->strategy->parseCountry();
    }

    /**
     * @return ServiceDto[]
     */
    public function parseService(): array
    {
        return $this->strategy->parseService();
    }

    public function updateServiceCountry(): array
    {
        $this->strategy->updateServiceCountry();
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->strategy->getKey();
    }
}
