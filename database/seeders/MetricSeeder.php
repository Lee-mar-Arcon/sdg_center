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
            ['sdg_id' => 1,'sub_category' => 'Metric 1.2'],
            ['sdg_id' => 1,'sub_category' => 'Metric 1.3'],
            ['sdg_id' => 1,'sub_category' => 'Metric 1.4'],
            ['sdg_id' => 2,'sub_category' => 'Metric 2.2'],
            ['sdg_id' => 2,'sub_category' => 'Metric 2.3'],
            ['sdg_id' => 2,'sub_category' => 'Metric 2.4'],
            ['sdg_id' => 2,'sub_category' => 'Metric 2.5'],
            ['sdg_id' => 3,'sub_category' => 'Metric 3.2'],
            ['sdg_id' => 3,'sub_category' => 'Metric 3.3'],
            ['sdg_id' => 4,'sub_category' => 'Metric 4.1'],
            ['sdg_id' => 4,'sub_category' => 'Metric 4.3'],
            ['sdg_id' => 4,'sub_category' => 'Metric 4.4'],
            ['sdg_id' => 5,'sub_category' => 'Metric 5.2'],
            ['sdg_id' => 5,'sub_category' => 'Metric 5.3'],
            ['sdg_id' => 5,'sub_category' => 'Metric 5.4'],
            ['sdg_id' => 5,'sub_category' => 'Metric 5.5'],
            ['sdg_id' => 5,'sub_category' => 'Metric 5.6'],
            ['sdg_id' => 6,'sub_category' => 'Metric 6.2'],
            ['sdg_id' => 6,'sub_category' => 'Metric 6.3'],
            ['sdg_id' => 6,'sub_category' => 'Metric 6.4'],
            ['sdg_id' => 6,'sub_category' => 'Metric 6.5'],
            ['sdg_id' => 7,'sub_category' => 'Metric 7.2'],
            ['sdg_id' => 7,'sub_category' => 'Metric 7.3'],
            ['sdg_id' => 7,'sub_category' => 'Metric 7.4'],
            ['sdg_id' => 8,'sub_category' => 'Metric 8.2'],
            ['sdg_id' => 8,'sub_category' => 'Metric 8.3'],
            ['sdg_id' => 8,'sub_category' => 'Metric 8.4'],
            ['sdg_id' => 9,'sub_category' => 'Metric 9.3'],
            ['sdg_id' => 9,'sub_category' => 'Metric 9.4'],
            ['sdg_id' => 10,'sub_category' => 'Metric 10.2'],
            ['sdg_id' => 10,'sub_category' => 'Metric 10.3'],
            ['sdg_id' => 10,'sub_category' => 'Metric 10.4'],
            ['sdg_id' => 10,'sub_category' => 'Metric 10.5'],
            ['sdg_id' => 10,'sub_category' => 'Metric 10.6'],
            ['sdg_id' => 11,'sub_category' => 'Metric 11.2'],
            ['sdg_id' => 11,'sub_category' => 'Metric 11.3'],
            ['sdg_id' => 11,'sub_category' => 'Metric 11.4'],
            ['sdg_id' => 12,'sub_category' => 'Metric 12.2'],
            ['sdg_id' => 12,'sub_category' => 'Metric 12.3'],
            ['sdg_id' => 12,'sub_category' => 'Metric 12.4'],
            ['sdg_id' => 13,'sub_category' => 'Metric 13.2'],
            ['sdg_id' => 13,'sub_category' => 'Metric 13.3'],
            ['sdg_id' => 13,'sub_category' => 'Metric 13.4'],
            ['sdg_id' => 14,'sub_category' => 'Metric 14.2'],
            ['sdg_id' => 14,'sub_category' => 'Metric 14.3'],
            ['sdg_id' => 14,'sub_category' => 'Metric 14.4'],
            ['sdg_id' => 14,'sub_category' => 'Metric 14.5'],
            ['sdg_id' => 15,'sub_category' => 'Metric 15.2'],
            ['sdg_id' => 15,'sub_category' => 'Metric 15.3'],
            ['sdg_id' => 15,'sub_category' => 'Metric 15.4'],
            ['sdg_id' => 16,'sub_category' => 'Metric 16.2'],
            ['sdg_id' => 16,'sub_category' => 'Metric 16.3'],
            ['sdg_id' => 16,'sub_category' => 'Metric 16.4'],
            ['sdg_id' => 17,'sub_category' => 'Metric 17.2'],
            ['sdg_id' => 17,'sub_category' => 'Metric 17.3'],
            ['sdg_id' => 17,'sub_category' => 'Metric 17.4']
        ];

        foreach ($metrics as $metric) {
            Metric::create([
                'sdg_id' => $metric['sdg_id'],
                'sub_category' => $metric['sub_category']

            ]);
        }
    }
}
