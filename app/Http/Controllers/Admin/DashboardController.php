<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Backpack\CRUD\app\Library\Widget;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function index(){

                                // استعلامات الطلاب
        // *********************************************************************************************************
        $all_students = Student::count();

        $active_students = Student::where('status','نشط')->count();

        $inactive_students = Student::where('status','متوقف')->count();
        
        $prospective_students = Student::where('status','محتمل')->count();

        $suspended_students = Student::where('status','منسحب')->count();

        $active_percentage = $all_students > 0 ? ($active_students / $all_students) * 100 : 0;

        $inactive_percentage = $all_students > 0 ? ($inactive_students / $all_students) * 100 : 0;

        $prospective_percentage = $all_students > 0 ? ($prospective_students / $all_students) * 100 : 0;

        $suspended_percentage = $all_students > 0 ? ($suspended_students / $all_students) * 100 : 0;
        // *********************************************************************************************************

        $all_teachers = Teacher::count();

        $active_teachers = Teacher::whereHas('courses')->count();

        $active_teacher_percentage = $all_teachers > 0 ? ($active_teachers / $all_teachers) * 100 : 0;

        $inactive_teachers = Teacher::doesntHave('courses')->count();

        $inactive_teacher_percentage = $all_teachers > 0 ? ($inactive_teachers / $all_teachers) * 100 : 0;




        Widget::add(['type' => 'div', 'class' => 'row','style' => 'margin-top: 70px;', 'content' => [
            [
                'type'        => 'progress',
                'class'       => 'card text-white bg-success mb-2',
                'value' => '<span style="font-size: 1.5em; color: white; margin-top: 10px; display: block;">' . round($active_percentage) . '%</span>',
                'description' => '<span style="font-size: 2em;">الطلاب النشطون</span>', // تغيير حجم الخط هنا
                'progress'    => $active_percentage, // النسبة المئوية للطلاب النشطين
                'hint' => '<span style="color: yellow;">عدد الطلاب النشطين : ( ' . $active_students . ' ) من اجمالي ' . $all_students . ' طلاب</span>',
                'style' => 'background: linear-gradient(to right, yellow ' . $active_percentage . '%, gray ' . $active_percentage . '%);',
            ],
            [
                'type'        => 'progress',
                'class'       => 'card text-white bg-danger mb-2',
                'value' => '<span style="font-size: 1.5em; color: white; margin-top: 10px; display: block;">' . round($inactive_percentage) . '%</span>',
                'description' => '<span style="font-size: 2em;">الطلاب غير النشطين</span>', // تغيير حجم الخط هنا
                'progress'    => $inactive_percentage, // النسبة المئوية للطلاب النشطين
                'hint' => '<span style="color: yellow;">عدد الطلاب غير النشطين : ( ' . $inactive_students . ' ) من اجمالي ' . $all_students . ' طلاب</span>',
                'style' => 'background: linear-gradient(to right, yellow ' . $inactive_percentage . '%, gray ' . $inactive_percentage . '%);',
            ],
            [
                'type'        => 'progress',
                'class'       => 'card text-white bg-warning mb-2',
                'value' => '<span style="font-size: 1.5em; color: white; margin-top: 10px; display: block;">' . round($suspended_percentage) . '%</span>',
                'description' => '<span style="font-size: 2em;">الطلاب المنسحبون</span>', // تغيير حجم الخط هنا
                'progress'    => $suspended_percentage, // النسبة المئوية للطلاب النشطين
                'hint' => '<span style="color: yellow;">عدد الطلاب المنسحبين : ( ' . $suspended_students . ' ) من اجمالي ' . $all_students . ' طلاب</span>',
                'style' => 'background: linear-gradient(to right, yellow ' . $suspended_percentage . '%, gray ' . $suspended_percentage . '%);',
            ],

            [
                'type'        => 'progress',
                'class'       => 'card text-white bg-secondary mb-2',
                'value' => '<span style="font-size: 1.5em; color: white; margin-top: 10px; display: block;">' . round($prospective_percentage) . '%</span>',
                'description' => '<span style="font-size: 2em;">الطلاب المحتملون</span>', // تغيير حجم الخط هنا
                'progress'    => $prospective_percentage, // النسبة المئوية للطلاب النشطين
                'hint' => '<span style="color: yellow;">عدد الطلاب المحتملين : ( ' . $prospective_students . ' ) من اجمالي ' . $all_students . ' طلاب</span>',
                'style' => 'background: linear-gradient(to right, yellow ' . $prospective_percentage . '%, gray ' . $prospective_percentage . '%);',
            ]
    
        ],
    ]);



    Widget::add(['type' => 'div', 'class' => 'row','style' => 'margin-top: 23px;', 'content' => [
        [
            'type'        => 'progress',
            'class'       => 'card text-white bg-success mb-2',
            'value' => '<span style="font-size: 1.5em; color: white; margin-top: 10px; display: block;">' . round($active_teacher_percentage) . '%</span>',
            'description' => '<span style="font-size: 2em;">المعلمون النشطون</span>', // تغيير حجم الخط هنا
            'progress'    => $active_teacher_percentage, // النسبة المئوية للطلاب النشطين
            'hint' => '<span style="color: yellow;">عدد المعلمين النشطين : ( ' . $active_teachers . ' ) من اجمالي ' . $all_teachers . ' معلمين</span>',
            'style' => 'background: linear-gradient(to right, yellow ' . $active_teacher_percentage . '%, gray ' . $active_teacher_percentage . '%);',
        ],
        [
            'type'        => 'progress',
            'class'       => 'card text-white bg-danger mb-2',
            'value' => '<span style="font-size: 1.5em; color: white; margin-top: 10px; display: block;">' . round($inactive_teacher_percentage) . '%</span>',
            'description' => '<span style="font-size: 2em;">المعلمين غير النشطين</span>', // تغيير حجم الخط هنا
            'progress'    => $inactive_teacher_percentage, // النسبة المئوية للطلاب النشطين
            'hint' => '<span style="color: yellow;">عدد المعلمين غير النشطين : ( ' . $inactive_teachers . ' ) من اجمالي ' . $all_teachers . ' معلمين</span>',
            'style' => 'background: linear-gradient(to right, yellow ' . $inactive_teacher_percentage . '%, gray ' . $inactive_teacher_percentage . '%);',
        ]

    ],
]);



        return view(backpack_view('dashboard'));
    }
    

    
}
