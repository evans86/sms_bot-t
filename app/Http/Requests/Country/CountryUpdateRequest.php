<?php

namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;

class CountryUpdateRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name_ru' => 'required|string',
            'name_en' => 'required|string',
            'iso_two' => 'required|string',
            'iso_three' => 'required|string',
            'image' => 'nullable|string',
        ];
    }

    public function getData(): array
    {
        return [
            'name_ru' => $this->name_ru,
            'name_en' => $this->name_en,
            'iso_two' => $this->iso_two,
            'iso_three' => $this->iso_three,
            'image' => $this->image,
        ];
    }
}
