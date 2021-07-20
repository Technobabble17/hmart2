<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class StoreUserRequest extends FormRequest
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
     * @return
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:25', 'alpha'],
            'email' => ['required', Rule::unique('addresses')],
            'phone' => ['required', 'integer'],
            'about' => ['nullable', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'paypal' => ['nullable', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'venmo' => ['nullable', 'regex:/^[a-zA-Z0-9\s]+$/'],
        ];
    }
}
