<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
        // الحصول على حالة الكورس الحالي إذا كان الطلب يتعلق بالتعديل
        $course = $this->route('course'); // في حالة وجود كورس
        $rules = [
            'name' => 'required|string|max:255',
            'status' => 'required|in:منتهي,متوقف مؤقتاً,نشط',
            'subject_type' => 'required|string|max:255',
            'num_lessons' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'max_student' => 'required|integer|min:1',
            'min_student' => [
                'required',
                'integer',
                'min:1',
                'max:' . $this->max_student, // التحقق من أن min_student <= max_student
            ],
            'duration' => 'required|numeric|min:0', // فقط الحد الأدنى بدون الحد الأقصى
            'teacher_id' => 'required|exists:teachers,id',
            'subject_id' => 'required|exists:subjects,id',
        ];

        // في حالة التعديل، تحقق إذا كانت حالة الكورس "منتهي"
        if ($course && $course->status === 'منتهي') {
            $rules['students'] = 'prohibited';
        }

        return $rules;
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
            'students.prohibited' => 'لا يمكنك إضافة طلاب لأن حالة الكورس منتهية.',
        ];
    }
}
