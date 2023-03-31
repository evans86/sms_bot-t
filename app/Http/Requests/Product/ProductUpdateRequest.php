<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'first_key' => 'required|string',
            'second_key' => 'required|string',
            'image' => 'required|string',
        ];
    }

    public function getData(): array
    {
        return [
            'title' => $this->title,
            'first_key' => $this->first_key,
            'second_key' => $this->second_key,
            'image' => $this->image,
        ];
    }
}
