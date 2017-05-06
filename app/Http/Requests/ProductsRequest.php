<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ' Hãy nhập tên sản phẩm'
        ];
    }
}
