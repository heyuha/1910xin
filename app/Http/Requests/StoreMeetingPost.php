<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMeetingPost extends FormRequest
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

            'y_id' =>'required',
            'k_id'=>'required',
            'm_man'=>'required',
            'm_url'=>'required',

        ];
    }
    public function messages(){
        return [
        'y_id.required' => '业务员名称必填',
        'k_id.required' =>'客户名称必填',
        'm_man.required' =>'访问人必填',
       'm_url.required' =>'访问地址必填',
        ];
    }
}
