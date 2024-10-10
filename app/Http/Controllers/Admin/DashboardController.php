<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Backpack\CRUD\app\Library\Widget;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function index(){

        $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;

    // عدّ عدد الطلاب المسجلين في الشهر الحالي
        $students_num_month = Student::whereMonth('created_at', $currentMonth)
                                ->whereYear('created_at', $currentYear)
                                ->count(); 

        $students_num_year = Student::whereYear('created_at', $currentYear)
                                ->count();


                    
            Widget::add([
                'type'        => 'progress',
                'class'       => 'card text-white bg-primary mb-2',
                'value'       => $students_num_month, // عدد الطلاب
                'description' => '<span style="font-size: 1.5em;">شهري</span>', // تغيير حجم الخط هنا
                'progress'    => 100, // يمكنك وضع 100 لعرض العدد فقط
                'hint'        => '<span style="color: yellow;">عدد الطلاب المسجلين هذا الشهر</span>', // تغيير لون النص هنا
            ]);
        
            Widget::add([
                'type'        => 'progress',
                'class'       => 'card text-white bg-success mb-2', // تغيير اللون إلى أخضر ناجح
                'value'       => $students_num_year, // عدد الطلاب
                'description' => '<span style="font-size: 1.5em;">سنوي</span>', // تغيير حجم الخط هنا
                'progress'    => 100, // يمكنك وضع 100 لعرض العدد فقط
                'hint'        => '<span style="color: yellow;">عدد الطلاب المسجلين هذه السنة </span>', // تغيير لون النص هنا
            ]);
            

        

            
        
        

        return view(backpack_view('dashboard'));
    }
    

    
}
