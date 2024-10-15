<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Country::class;
    public function definition(): array
    {
        return [
            'country_name' => $this->faker->unique()->randomElement([
                'مصر', 'السعودية', 'الإمارات', 'الكويت', 'البحرين', 
                'قطر', 'عمان', 'الأردن', 'لبنان', 'فلسطين', 
                'العراق', 'اليمن', 'المغرب', 'تونس', 'الجزائر', 
                'ليبيا', 'السودان', 'موريتانيا', 'الصومال', 'سوريا'
            ]),
        ];
    }
}
