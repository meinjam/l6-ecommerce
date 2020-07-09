<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {

        if ( isset( $this->id ) ) {
            return [
                'name' => 'required|unique:products,name,' . $this->id,
                // 'name' => [
                //     'required',
                //     Rule::unique('products','name')->ignore($this->product)
                // ]
            ];
        }
        return [
            'name' => 'required|unique:products',
        ];
    }
}
