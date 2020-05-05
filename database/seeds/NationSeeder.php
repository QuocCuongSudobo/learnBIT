<?php

use Illuminate\Database\Seeder;
use App\National;

class NationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataDate = bn_range_date('202001', '212012');
        foreach (range(0, 200) as $nation) {
            $allData = [];
            foreach ($dataDate as $date) {
                $allData[] = [
                    'month' => $date,
                    'nation' => $nation,
                    'value' => 1
                ];
            }
            National::insert($allData);
        }
    }
}
