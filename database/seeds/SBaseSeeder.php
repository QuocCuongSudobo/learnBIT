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
                'index' => $index,
                'value' => $this->sum($index, $data)
            ]);
        }
    }

    public function sum($index, $data)
    {
        $sum = 0;
        $to = $index;
        $from = $index - ($index & -$index) + 1;

        for ($i = $from; $i<= $to; $i++) {
            $sum += $data[$i];
        }

        return $sum;
    }
}
