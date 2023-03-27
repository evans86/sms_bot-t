<?php

namespace App\Services\Resource\Strategy;

use App\Models\Resource\SmsResource;

class MainStrategy
{
    /**
     * @var SmsResource
     */
    protected SmsResource $resource;

    public function __construct(SmsResource $resource)
    {
        $this->resource = $resource;
    }
}
