<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminPost extends FormRequest
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
            'a_name' => 'required|unique:admin|max:10',
            'a_pwd'=>'required',
        ];
    }
    public function messages(){
        return [
        'a_name.required' => '管理员名称必填',
        'a_name.unique' => '管理员名称已存在',
        'a_name.max' => '管理员名称不可超过10位',
        'a_pwd.required'=>'管理员密码必填',
        ];
    }
}
