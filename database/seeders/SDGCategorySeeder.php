<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SDGCategory;

class SDGCategorySeeder extends Seeder
{
    public function run()
    {
        $sdgs = [
            'No Poverty',
            'Zero Hunger',
            'Good Health and Well-being',
            'Quality Education',
            'Gender Equality',
            'Clean Water and Sanitation',
            'Affordable and Clean Energy',
            'Decent Work and Economic Growth',
            'Industry, Innovation, and Infrastructure',
            'Reduced Inequality',
            'Sustainable Cities and Communities',
            'Responsible Consumption and Production',
            'Climate Action',
            'Life Below Water',
            'Life on Land',
            'Peace and Justice Strong Institutions',
            'Partnerships to achieve the Goal'
        ];

        foreach ($sdgs as $sdg) {
            SDGCategory::create(['name' => $sdg]);
        }
    }
}
