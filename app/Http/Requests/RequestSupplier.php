<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSupplier extends FormRequest
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
            's_name' => 'required|unique:suppliers,s_name,'.$this->id,
            's_email' => 'required',
            's_phone' => 'required',
            's_address' => 'required'
        ];
    }
    public function messages()
    {
        return [
            's_name.required' => 'Trường này không được để trống',
            's_name.unique' => 'Tên thư mục đã tồn tại',
            's_phone.required' => 'Trường này không được để trống',
            's_email.required' => 'Trường này không được để trống',
            's_address.required' => 'Trường này không được để trống'
        ];
    }
}
