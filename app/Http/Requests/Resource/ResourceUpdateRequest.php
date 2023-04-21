<?php

namespace App\Http\Requests\Resource;

use Illuminate\Foundation\Http\FormRequest;

class ResourceUpdateRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'image' => 'required|string',
            'ref' => 'nullable|string',
        ];
    }

    public function getData(): array
    {
        return [
            'title' => $this->title,
            'image' => $this->image,
            'ref' => $this->ref,
        ];
    }
}
