<?php

namespace App\Models\Dto;

class CountryDto
{
    public int $id;
    public string $name_ru;
    public string $name_en;
    public string $iso_two;
    public string $iso_three;
    // Уникальный для конкретного ресурса
    public ?string $org_id = null;

    public function getArray(): array
    {
        return [
            'id' => $this->id,
            'name_ru' => $this->name_ru,
            'name_en' => $this->name_en,
            'iso_two' => $this->iso_two,
            'iso_three' => $this->iso_three,
            'org_id' => $this->org_id,
        ];
    }

    /**
     * Заполняет данные для обработки
     * @param \App\Models\Activate\SmsCountry $country
     */
    public function setCountry(\App\Models\Activate\SmsCountry $country): void
    {
        $this->id = $country->id;
        $this->name_ru = $country->name_ru;
        $this->name_en = $country->name_en;
        $this->iso_two = $country->iso_two;
        $this->iso_three = $country->iso_three;
    }
}
