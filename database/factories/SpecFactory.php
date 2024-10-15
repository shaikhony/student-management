<?php

namespace Database\Factories;

use App\Models\Spec;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spec>
 */
class SpecFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Spec::class;
    public function definition(): array
    {
        return [
            'specialization_name' => $this->faker->unique()->randomElement([
                'هندسة البرمجيات', 'علوم الحاسوب', 'الذكاء الاصطناعي', 'الأمن السيبراني', 
                'إدارة الأعمال', 'الطب', 'الهندسة المعمارية', 'الهندسة المدنية', 
                'التسويق', 'التمويل', 'الاقتصاد', 'التربية', 'الحقوق', 
                'التصميم الجرافيكي', 'الفنون', 'الإعلام', 'العلاقات العامة', 
                'اللغة الإنجليزية', 'الفيزياء', 'الكيمياء'
            ]),
        ];
    }
}
