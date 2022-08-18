<?php

namespace App\Http\Requests;

use App\Services\CurrencyConvertorInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(CurrencyConvertorInterface $currency)
    {
        return [
            'name' => [
                'required', 
                'string'
            ],
            'email' => [
                'unique:users',
                'required',
                'string'
            ],
            'currency' => [
                'required',
                'string',
                Rule::in($currency::CURRENCY)
            ],
            'hourly_rate' => [
                'required',
                'numeric',
                'gt:0'
            ]
        ];
    }
}