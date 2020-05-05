<?php

use Illuminate\Database\Seeder;
use App\SAll;

class SAllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_alls')->truncate();
        $dataDate = bn_range_date('202001', '212012');
        foreach (range(0, 2) as $nation) {
            foreach (range(0, 100) as $pd_t) {
                foreach (range(0, 100) as $pd_id) {
                    $data = [];
                    $allData = [];

                    foreach ($dataDate as $date) {
                        $data[date_to_index('202001', $date)] = 1;
                    }

                    foreach ($data as $index => $value) {
                        $allData[] = [
                            'month' => $index,
                            'nation' => $nation,
                            'pd_t' => $pd_t,
                            'pd_id' => $pd_id,
                            'nation' => $nation,
                            'value' => bit_sum($index, $data)
                        ];
                    }
                    SAll::insert($allData);
                }
            }
        }
    }
}
