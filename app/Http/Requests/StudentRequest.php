<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:100',
            'age'  =>  'required|integer|min:1|max:100',
            'country_id' => 'required|exists:countries,id',
            'phone_number' => 'required|string|regex:/^\+?[0-9]{8,15}$/',
            'status' => 'required|in:نشط,محتمل,متوقف,منسحب',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'الاسم',
            'age' => 'العمر',
            'country_id' => 'البلد',
            'phone_number' => 'رقم الهاتف',
            'status' => 'الحالة',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'name.min' => 'الاسم يجب أن يكون على الأقل 3 أحرف',
            'age.required' => 'العمر مطلوب',
            'age.integer' => 'العمر يجب أن يكون عدد صحيح',
            'country_id.required' => 'البلد مطلوب',
            'phone_number.required' => 'رقم الهاتف مطلوب',
            'status.required' => 'الحالة مطلوبة',
        ];
    }
}
