<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSetting extends FormRequest
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
            'address_ar'      => 'required',
            'address_en'      => 'required',
            'gmail'           => 'required',
            'price_per_kilo'  => 'required',
            'longitude'       => 'required',
            'share_price'     => 'required',
            'about_us_ar'     => 'required',
            'about_us_en'     => 'required',
            'terms_ar'        => 'required',
            'terms_en'        => 'required',
            'privacy_ar'      => 'required',
            'privacy_en'      => 'required',
        ];
    }
    public function messages(){
        return[
            'address_ar.required'      => 'يرجي ادخال العنوان باللغة العربية',
            'address_en.required'      => 'يرجي ادخال العنوان باللغة الانجليزية',
            'gmail.required'           => 'يرجي ادخال لينك جيميل',
            'price_per_kilo.required'  => 'يرجي ادخال سعر التوصيل لكل كيلو',
            'share_price.required'     => 'يرجي ادخال هدية مشاركة التطبيق',
            'longitude.required'       => 'لم تعمل الخريطة بالشكل الصحيح , تحقق من الاتصال بالانترنت',
            'about_us_ar.required'     => 'يرجي ادخال بيانات ماذا عنا باللغة العربية',
            'about_us_en.required'     => 'يرجي ادخال بيانات ماذا عنا باللغة الانجليزية',
            'terms_ar.required'        => 'يرجي ادخال الشروط والاحكام باللغة العربية',
            'terms_en.required'        => 'يرجي ادخال الشروط والاحكام باللغة الانجليزية',
            'privacy_ar.required'      => 'يرجي ادخال سياسة الخصوصية باللغة العربية',
            'privacy_en.required'      => 'يرجي ادخال سياسة الخصوصية باللغة الانجليزية',

        ];
    }
}
