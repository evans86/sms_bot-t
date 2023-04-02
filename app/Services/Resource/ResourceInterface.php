<?php

namespace App\Services\Resource;

use App\Models\Dto\CountryDto;
use App\Models\Resource\SmsResource;

interface ResourceInterface
{
    /**
     * Генерирует ресурс
     * @param array $params
     * @return SmsResource
     */
    public function create(array $params): SmsResource;

    /**
     * Возвращает страны согласно ресурсу
     *
     * @return CountryDto[]
     */
    public function parseCountry(): array;

    /**
     * Возвращает сервисы согласно ресурсу
     * Если сервис не находит, то создаёт новый Service
     * @return array
     */
    public function parseService(): array;
}
