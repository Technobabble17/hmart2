<?php

namespace App\Http\Requests;


use Cknow\Money\Money;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Money\Exception\ParserException;

class StoreItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:3'],
            'description' => ['required'],
            'price' => ['required', function($attribute, $value, $fail) {
                $nValue = is_numeric($value) ? '$' . $value : $value;

                try {
                    $money = Money::parse($nValue, 'USD');
                }
                catch(ParserException $e)
                {
                    $fail('bad ' . $attribute);
                }
            }],
        ];
    }
}
