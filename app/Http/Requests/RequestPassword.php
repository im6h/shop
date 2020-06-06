<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPassword extends FormRequest
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
            'password_old'      => 'required',
            'password_new'      => 'required',
            'password_confirm'  => 'required|same:password_new'
        ];
    }
    public function messages()
    {
        return [
            'password_old.required'     => 'Trường này không được để trống',
            'password_new.required'     => 'Trường này không được để trống',
            'password_confirm.required' => 'Trường này không được để trống',
            'password_confirm.same' => 'Mật khẩu xác nhận không đúng'
        ];
    }
}
