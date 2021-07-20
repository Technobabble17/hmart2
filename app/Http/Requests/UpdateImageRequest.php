<?php

namespace App\Http\Requests;

class UpdateImageRequest extends StoreImageRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = parent::rules();
        return $rules;
    }
}
