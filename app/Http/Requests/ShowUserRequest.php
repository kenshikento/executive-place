<?php

namespace App\Http\Requests;

use App\Services\CurrencyConvertorInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowUserRequest extends FormRequest
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
            'exchange_to' => ['required', 'string', Rule::in($currency::CURRENCY)]
        ];
    }
}
