<?php

namespace App\Services\Resource;

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

    public function parseCountry(): array
    {
        return $this->strategy->parseCountry();
    }
}
