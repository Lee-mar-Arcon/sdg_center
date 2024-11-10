<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SDG;

class SDGSeeder extends Seeder
{
    public function run()
    {
        $sdgs = [
            ['icon' => 'images/sdgs/01.png', 'sdg_no' => 1, 'bg_color' => '#eb1c2e', 'name' => 'No Poverty', 'description' => 'End poverty in all its forms everywhere'],
            ['icon' => 'images/sdgs/02.png', 'sdg_no' => 2, 'bg_color' => '#d3a029', 'name' => 'Zero Hunger', 'description' => 'End hunger, achieve food security, and promote sustainable agriculture'],
            ['icon' => 'images/sdgs/03.png', 'sdg_no' => 3, 'bg_color' => '#279b48', 'name' => 'Good Health and Well-being', 'description' => 'Ensure healthy lives and promote well-being for all at all ages'],
            ['icon' => 'images/sdgs/04.png', 'sdg_no' => 4, 'bg_color' => '#c21f32', 'name' => 'Quality Education', 'description' => 'Ensure inclusive and equitable quality education and promote lifelong learning opportunities for all'],
            ['icon' => 'images/sdgs/05.png', 'sdg_no' => 5, 'bg_color' => '#ee402b', 'name' => 'Gender Equality', 'description' => 'Achieve gender equality and empower all women and girls'],
            ['icon' => 'images/sdgs/06.png', 'sdg_no' => 6, 'bg_color' => '#01aed9', 'name' => 'Clean Water and Sanitation', 'description' => 'Ensure availability and sustainable management of water and sanitation for all'],
            ['icon' => 'images/sdgs/07.png', 'sdg_no' => 7, 'bg_color' => '#fcb712', 'name' => 'Affordable and Clean Energy', 'description' => 'Ensure access to affordable, reliable, sustainable, and modern energy for all'],
            ['icon' => 'images/sdgs/08.png', 'sdg_no' => 8, 'bg_color' => '#8f1839', 'name' => 'Decent Work and Economic Growth', 'description' => 'Promote sustained, inclusive and sustainable economic growth, full and productive employment, and decent work for all'],
            ['icon' => 'images/sdgs/09.png', 'sdg_no' => 9, 'bg_color' => '#f36d24', 'name' => 'Industry, Innovation, and Infrastructure', 'description' => 'Build resilient infrastructure, promote inclusive and sustainable industrialization, and foster innovation'],
            ['icon' => 'images/sdgs/10.png', 'sdg_no' => 10, 'bg_color' => '#e11483', 'name' => 'Reduced Inequality', 'description' => 'Reduce inequality within and among countries'],
            ['icon' => 'images/sdgs/11.png', 'sdg_no' => 11, 'bg_color' => '#f99d26', 'name' => 'Sustainable Cities and Communities', 'description' => 'Make cities and human settlements inclusive, safe, resilient, and sustainable'],
            ['icon' => 'images/sdgs/12.png', 'sdg_no' => 12, 'bg_color' => '#ce8d29', 'name' => 'Responsible Consumption and Production', 'description' => 'Ensure sustainable consumption and production patterns'],
            ['icon' => 'images/sdgs/13.png', 'sdg_no' => 13, 'bg_color' => '#47773c', 'name' => 'Climate Action', 'description' => 'Take urgent action to combat climate change and its impacts'],
            ['icon' => 'images/sdgs/14.png', 'sdg_no' => 14, 'bg_color' => '#007dbd', 'name' => 'Life Below Water', 'description' => 'Conserve and sustainably use the oceans, seas, and marine resources for sustainable development'],
            ['icon' => 'images/sdgs/15.png', 'sdg_no' => 15, 'bg_color' => '#3db049', 'name' => 'Life on Land', 'description' => 'Protect, restore, and promote sustainable use of terrestrial ecosystems, sustainably manage forests, combat desertification, and halt and reverse land degradation and halt biodiversity loss'],
            ['icon' => 'images/sdgs/16.png', 'sdg_no' => 16, 'bg_color' => '#01558b', 'name' => 'Peace and Justice Strong Institutions', 'description' => 'Promote peaceful and inclusive societies for sustainable development, provide access to justice for all, and build effective, accountable, and inclusive institutions at all levels'],
            ['icon' => 'images/sdgs/17.png', 'sdg_no' => 17, 'bg_color' => '#183668', 'name' => 'Partnerships to achieve the Goal', 'description' => 'Strengthen the means of implementation and revitalize the global partnership for sustainable development']
        ];

        foreach ($sdgs as $sdg) {
            SDG::create([
                'icon' => $sdg['icon'],
                'sdg_no' => $sdg['sdg_no'],
                'bg_color' => $sdg['bg_color'],
                'name' => $sdg['name'],
                'description' => $sdg['description']
            ]);
        }
    }
}
