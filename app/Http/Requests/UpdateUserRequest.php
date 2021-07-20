<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends StoreUserRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = parent::rules();
       // dd($this->route("address"));
        $rules['email'] = ['required', Rule::unique('user')->ignore($this->route("user")->id)]; //
        return $rules;
    }
}
