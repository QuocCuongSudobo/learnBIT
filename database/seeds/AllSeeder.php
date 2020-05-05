<?php

use Illuminate\Database\Seeder;
use App\All;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alls')->truncate();
        $dataDate = bn_range_date('202001', '212012');
        foreach (range(0, 2) as $nation) {
            foreach (range(0, 100) as $pd_t) {
                foreach (range(0, 100) as $pd_id) {
                    $allData = [];
                    foreach ($dataDate as $date) {
                        $allData[] = [
                            'month' => $date,
                            'nation' => $nation,
                            'pd_t' => $pd_t,
                            'pd_id' => $pd_id,
                            'value' => 1
                        ];
                    }
                    All::insert($allData);
                }
            }
        }
    }
}
