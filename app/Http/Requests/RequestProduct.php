<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
    public function rules()
    {
        return [
            'pro_name' => 'required|unique:products,pro_name,'.$this->id,
            'pro_category_id' => 'required',
            'pro_price' => 'required',
            'pro_content' => 'required',
            'pro_description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'pro_name.required' => 'Trường này không được để trống',
            'pro_name.unique' => 'Tên sản phẩm đã tồn tại',
            'pro_category_id.required' => 'Trường này không được để trống',
           'pro_price.required' => 'Trường này không được để trống',
            'pro_content.required' => 'Trường này không được để trống',
            'pro_description.required' => 'Trường này không được để trống'
        ];
    }
}
