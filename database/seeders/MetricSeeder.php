<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Metric;

class MetricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $metrics = [
            ['sdg_id' => 1,'sub_category' => 'Proportion of students receiving financial aid to attend university because of poverty'],
            ['sdg_id' => 1,'sub_category' => 'University anti-poverty programmes
'],
            ['sdg_id' => 1,'sub_category' => 'Community anti-poverty programmes
'],
            ['sdg_id' => 2,'sub_category' => 'Campus food waste'],
            ['sdg_id' => 2,'sub_category' => 'Student hunger'],
            ['sdg_id' => 2,'sub_category' => 'Proportion of graduates in agriculture and aquaculture including sustainability aspects
'],
            ['sdg_id' => 2,'sub_category' => 'National hunger
'],
            ['sdg_id' => 3,'sub_category' => 'Number graduating in health professions
'],
            ['sdg_id' => 3,'sub_category' => 'Collaborations and health services
'],
            ['sdg_id' => 4,'sub_category' => 'Proportion of graduates with teaching qualification
'],
            ['sdg_id' => 4,'sub_category' => 'Lifelong learning measures
'],
            ['sdg_id' => 4,'sub_category' => 'Proportion of first-generation students
'],
            ['sdg_id' => 5,'sub_category' => 'Proportion of graduates with teaching qualification
'],
            ['sdg_id' => 5,'sub_category' => 'Student access measures
'],
            ['sdg_id' => 5,'sub_category' => 'Proportion of senior female academics
'],
            ['sdg_id' => 5,'sub_category' => 'Proportion of women receiving degrees
'],
            ['sdg_id' => 5,'sub_category' => 'Women’s progress measures
'],
            ['sdg_id' => 6,'sub_category' => 'Water consumption per person
'],
            ['sdg_id' => 6,'sub_category' => 'Water usage and care
'],
            ['sdg_id' => 6,'sub_category' => 'Water usage and care
'],
            ['sdg_id' => 6,'sub_category' => 'Water in the community
'],
            ['sdg_id' => 7,'sub_category' => 'University measures towards affordable and clean energy
'],
            ['sdg_id' => 7,'sub_category' => 'Energy use density
'],
            ['sdg_id' => 7,'sub_category' => 'Energy and the community
'],
            ['sdg_id' => 8,'sub_category' => 'Employment practice
'],
            ['sdg_id' => 8,'sub_category' => 'Expenditure per employee
'],
            ['sdg_id' => 8,'sub_category' => 'Proportion of students taking work placements
'],
            ['sdg_id' => 8,'sub_category' => 'Proportion of employees on secure contracts
'],
            ['sdg_id' => 9,'sub_category' => 'University spin offs
'],
            ['sdg_id' => 9,'sub_category' => 'Research income from industry and commerce
'],
            ['sdg_id' => 10,'sub_category' => 'First-generation students
'],
            ['sdg_id' => 10,'sub_category' => 'International students from developing countries
'],
            ['sdg_id' => 10,'sub_category' => 'Proportion of students with disabilities
'],
            ['sdg_id' => 10,'sub_category' => 'Proportion of employees with disabilities
'],
            ['sdg_id' => 10,'sub_category' => 'Measures against discrimination
'],
            ['sdg_id' => 11,'sub_category' => 'Support of arts and heritage
'],
            ['sdg_id' => 11,'sub_category' => 'Expenditure on arts and heritage
'],
            ['sdg_id' => 11,'sub_category' => 'Sustainable practices
'],
            ['sdg_id' => 12,'sub_category' => 'Operational measures
'],
            ['sdg_id' => 12,'sub_category' => 'Proportion of recycled waste
'],
            ['sdg_id' => 12,'sub_category' => 'Publication of a sustainability report
'],
            ['sdg_id' => 13,'sub_category' => 'Low-carbon energy use
'],
            ['sdg_id' => 13,'sub_category' => 'Environmental education measures
'],
            ['sdg_id' => 13,'sub_category' => 'Commitment to carbon neutral university
'],
            ['sdg_id' => 14,'sub_category' => 'Supporting aquatic ecosystems through education
'],
            ['sdg_id' => 14,'sub_category' => 'Supporting aquatic ecosystems through action
'],
            ['sdg_id' => 14,'sub_category' => 'Water sensitive waste disposal
'],
            ['sdg_id' => 14,'sub_category' => 'Maintaining a local ecosystem
'],
            ['sdg_id' => 15,'sub_category' => 'Supporting land ecosystems through education
'],
            ['sdg_id' => 15,'sub_category' => 'Supporting land ecosystems through action
'],
            ['sdg_id' => 15,'sub_category' => 'Land sensitive waste disposal
'],
            ['sdg_id' => 16,'sub_category' => 'University governance measures
'],
            ['sdg_id' => 16,'sub_category' => 'Working with government
'],
            ['sdg_id' => 16,'sub_category' => 'Proportion of graduates in law and civil enforcement
'],
            ['sdg_id' => 17,'sub_category' => 'Relationships to support the goals
'],
            ['sdg_id' => 17,'sub_category' => 'Publication of SDG reports
'],
            ['sdg_id' => 17,'sub_category' => 'Education for the SDGs
']
        ];

        foreach ($metrics as $metric) {
            Metric::create([
                'sdg_id' => $metric['sdg_id'],
                'sub_category' => $metric['sub_category']

            ]);
        }
    }
}
