<?php

use Illuminate\Database\Seeder;

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
            foreach ($dataDate as $date) {
                DB::table('nationals')->insert([
                    'month' => $date,
                    'nation' => $nation,
                    'value' => 1
                ]);
            }
        }
    }
}
