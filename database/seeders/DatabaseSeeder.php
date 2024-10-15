<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Spec;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
            
        //         'name' => "admin",
        //         'email' => "admin@gmail.com",
        //         'password' => Hash::make('admin123')
        // ]);

        // $countries = [
        //     'مصر', 'السعودية', 'الإمارات', 'الكويت', 'البحرين', 
        //     'قطر', 'عمان', 'الأردن', 'لبنان', 'فلسطين', 
        //     'العراق', 'اليمن', 'المغرب', 'تونس', 'الجزائر', 
        //     'ليبيا', 'السودان', 'موريتانيا', 'الصومال', 'سوريا'
        // ];

        // // إدخال جميع الدول دفعة واحدة
        // foreach ($countries as $country) {
        //     \App\Models\Country::factory()->create([
        //         'country_name' => $country,
        //     ]);
        //     }

            $specializations = [
                'هندسة البرمجيات', 'علوم الحاسوب', 'الذكاء الاصطناعي', 'الأمن السيبراني', 
                'إدارة الأعمال', 'الطب', 'الهندسة المعمارية', 'الهندسة المدنية', 
                'التسويق', 'التمويل', 'الاقتصاد', 'التربية', 'الحقوق', 
                'التصميم الجرافيكي', 'الفنون', 'الإعلام', 'العلاقات العامة', 
                'اللغة الإنجليزية', 'الفيزياء', 'الكيمياء'
            ];
    
            // إدخال جميع التخصصات دفعة واحدة
            foreach ($specializations as $specialization) {
                Spec::create([
                    'spec_name' => $specialization,
                ]);
            }


    }
}
