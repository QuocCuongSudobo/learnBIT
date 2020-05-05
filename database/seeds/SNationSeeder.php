<?php

use Illuminate\Database\Seeder;
use App\Snational;

class SNationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('snationals')->truncate();

        $dataDate = bn_range_date('202001', '212012');
        foreach (range(0, 200) as $nation) {
            $data = [];
            $allData = [];

            foreach ($dataDate as $date) {
                $data[date_to_index('202001', $date)] = 1;
            }

            foreach ($data as $index => $value) {
                $allData[] = [
                    'month' => $index,
                    'nation' => $nation,
                    'value' => bit_sum($index, $data)
                ];
            }
            Snational::insert($allData);
        }
    }
}
