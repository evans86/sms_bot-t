<?php

namespace App\Models\Dto;

use App\Models\Service\SmsService;

class ServiceDto
{
    public int $id;
    public string $title;
    public string $first_key;
    public string $second_key;
    //
    public ?string $org_id;

    public function getArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'first_key' => $this->first_key,
            'second_key' => $this->second_key,
            'org_id' => $this->org_id,
        ];
    }

    /**
     * Заполняет данные для обработки
     * @param \App\Models\Service\SmsService $service
     */
    public function setService(SmsService $service): void
    {
        $this->id = $service->id;
        $this->title = $service->title;
        $this->first_key = $service->first_key;
        $this->second_key = $service->second_key;
    }
}
