<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlider extends FormRequest
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
//            'title_ar'      => 'required',
//            'title_en'      => 'required',
//            'desc_ar'      => 'required',
//            'desc_en'      => 'required',
            'photo'         => 'required_without:id|nullable',
        ];
    }
    public function messages(){
        return[
//            'title_ar.required'          => 'يرجي ادخال العنوان باللغة العربية',
//            'title_en.required'          => 'يرجي ادخال العنوان باللغة الانجليزية',
//            'desc_ar.required'          => 'يرجي ادخال الوصف باللغة العربية',
//            'desc_en.required'          => 'يرجي ادخال الوصف باللغة الانجليزية',
            'photo.required_without'     => 'يرجي رفع صورة',

        ];
    }
}
