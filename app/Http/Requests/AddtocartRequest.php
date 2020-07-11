<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddtocartRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {

        return [
            'size_id'  => 'required',
            'color_id' => 'required',
            'qty'      => 'required|integer|between:1,999',
        ];
    }

    public function messages() {

        return [
            'size_id.required'  => 'Please select a size.',
            'color_id.required' => 'Please select a color.',
            'qty.between'       => 'Quantity must be between 1 to 999.',
        ];
    }
}
