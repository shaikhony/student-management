<?php

namespace App\Http\Requests;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'subject_number' => 'required|numeric', // رقم فريد ورقمي
            'name'           => 'required|string|max:255', // الاسم مطلوب، نصي، وأقصى حد 255 حرفًا
            'duration' => 'required|numeric', // التحقق من صيغة الوقت
            'start_date'     => 'required|date', // تاريخ البدء مطلوب، وتحقق من أن المدخل تاريخ
            'end_date'       => 'required|date|after:start_date', // تاريخ النهاية مطلوب ويجب أن يكون بعد تاريخ البدء
            'subject_type'   => 'required|string|max:20', // نوع المادة إما نظري أو عملي
            'teacher_id'     => 'required|exists:teachers,id', // التحقق من وجود المدرس في قاعدة البيانات
            'status'         => 'required', // الحالة يجب أن تكون إما نشطة أو غير نشطة
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
            //
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
            //
        ];
    }
}
