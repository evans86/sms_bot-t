<?php

namespace App\Http\Requests\Bot;

use App\Helpers\ApiHelpers;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

;

class BotUpdateRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules()
    {
        return [
            'public_key' => 'required|string',
            'private_key' => 'required|string',
            'version' => 'string|min:1|max:1',
            'category_id' => 'integer|min:1',
            'percent' => 'integer|min:0',
            'api_key' => 'string',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function failedValidation(Validator $validator)
    {
        $response = response()
            ->make(ApiHelpers::error($validator->errors()->first()), 422);

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }

}
