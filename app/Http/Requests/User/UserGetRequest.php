<?php

namespace App\Http\Requests\User;

use App\Helpers\ApiHelpers;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class UserGetRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules()
    {
        return [
            'user_id' => 'required'
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
