<?php

use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataDate = bn_range_date('202001', '212012');
        foreach ($dataDate as $date) {
            DB::table('bases')->insert([
                'month' => $date,
                'value' => 1
            ]);
        }
    }
}
