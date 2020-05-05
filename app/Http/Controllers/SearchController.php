<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Base;
use App\SBase;

class SearchController extends Controller
{
    public function index()
    {
        $from = '202002';
        $to = '202004';

        $start1 = microtime(true);

        $totalByMOnth = $this->searchMonth($from, $to);

        $time1 = microtime(true) - $start1;


        $start2 = microtime(true);

        $totalByBit = $this->searchBIT($from, $to);

        $time2 = microtime(true) - $start2;

        dd('month: ' . $totalByMOnth . ' in: ' . $time1, 'binary: ' . $totalByBit . ' in: ' . $time2);
    }

    public function searchMonth($from, $to)
    {
        $dataDate = $this->bnRangeDate($from, $to);

        $total = Base::whereIn('month', $dataDate)->sum('value');

        return $total;
    }

    public function searchBIT($from, $to)
    {
        $indexFrom = $this->getIndex($from, true);
        $indexTo = $this->getIndex($to);

        $total = SBase::whereIn('index', $indexTo)->sum('value') - SBase::whereIn('index', $indexFrom)->sum('value');

        return $total;
    }

    private function bnRangeDate($begin, $end)
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

    private function getIndex($date, $from = false)
    {
        $maxIndex = count($this->bnRangeDate('202001', $date));

        if ($from) {
            $maxIndex -= 1;
        }

        return $this->binary($maxIndex);
    }

    private function binary($num)
    {
        $data = [$num];
        while ($num > 0) {
            $num = $num - ($num & - $num);
            $data[] = $num;
        }

        return $data;
    }
}
