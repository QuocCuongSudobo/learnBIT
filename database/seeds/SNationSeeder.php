<?php

use Illuminate\Database\Seeder;
use App\National;

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

        foreach (range(0, 200) as $nation) {

            $data = DB::table('nationals')->whereNation($nation)->pluck('value', 'month');

            $dataX = [];

            foreach ($data as $month => $value) {
                $dataX[date_to_index('202001', $month)] = $value;
            }

            foreach ($dataX as $index => $value) {
                DB::table('snationals')->insert([
                    'month' => $index,
                    'nation' => $nation,
                    'value' => bit_sum($index, $dataX)
                ]);
            }
        }
    }
}
