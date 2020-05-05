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
        $dataDate = $this->bn_range_date('202001', '212012');
        foreach ($dataDate as $date) {
            DB::table('bases')->insert([
                'month' => $date,
                'value' => 1
            ]);
        }
    }

    private function bn_range_date($begin, $end)
    {
        $m    = [];
        $date = strtotime(date_create_from_format('Ymd', $begin . '01')->format('Y-m-d'));
        $end = strtotime(date_create_from_format('Ymd', $end . '01')->format('Y-m-d'));

        do {
            $m[]  = date('Ym', $date);
            $date = strtotime('+1 month', $date);
        } while ($date <= $end);

        return $m;
    }
}
