<?php

use Illuminate\Database\Seeder;

class SBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = DB::table('bases')->pluck('value', 'id');

        foreach ($data as $index => $value) {
            DB::table('s_bases')->insert([
                'month' => $index,
                'value' => bit_sum($index, $data)
            ]);
        }
    }
}
