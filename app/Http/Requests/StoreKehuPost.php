<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKehuPost extends FormRequest
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
            'k_name' => 'required',
            'k_level'=>'required',
            'k_hang' => 'required',
            'k_lai' => 'required',
            'y_id' => 'required',
            'k_tels' => 'required',
            'k_tel' => 'required',
        ];
    }
    public function messages(){
        return [
        'k_name.required' => '客户名称必填',
        'k_level.required' => '客户级别必填',
       'k_hang.required' => '客户从事行业',
       'k_lai.required' => '客户来源必填',
       'y_id.required' => '业务员必填',
       'k_tels.required' => '客户电话必填',
       'k_tel.required' => '客户手机号必填',
        ];
    }
}
