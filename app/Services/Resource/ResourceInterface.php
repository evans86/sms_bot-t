<?php

namespace App\Services\Resource;

use App\Models\Resource\SmsResource;

interface ResourceInterface
{
    public function create(array $params): SmsResource;

    /**
     * Возвращает страны согласно ресурсу
     *
     * @return array
     */
    public function parseCountry(): array;
}
