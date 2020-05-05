<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\National;
use App\SNational;

class SearchNationController extends Controller
{
    public function __construct()
    {
        $this->from = date_from();
        $this->to = date_to();
        $this->nation = 2;
    }

    public function index()
    {
        $start1 = microtime(true);

        $totalByMOnth = $this->searchMonth($this->from, $this->to);

        $time1 = microtime(true) - $start1;


        $start2 = microtime(true);

        $totalByBit = $this->searchBIT($this->from, $this->to);

        $time2 = microtime(true) - $start2;

        return view('home')->with(
            [
                'totalByMOnth' => $totalByMOnth,
                'time1' => $time1,
                'totalByBit' => $totalByBit,
                'time2' => $time2
            ]
        );
    }

    public function searchMonth($from, $to)
    {
        $dataDate = bn_range_date($from, $to);

        $total = National::whereIn('month', $dataDate)
                    ->whereNation($this->nation)
                    ->sum('value');

        return $total;
    }

    public function searchBIT($from, $to)
    {
        $indexFrom = binary(get_index($from) - 1);
        $indexTo = binary(get_index($to));

        $totalTo = SNational::whereIn('month', $indexTo)
                        ->whereNation($this->nation)
                        ->sum('value');

        $totalFrom = SNational::whereIn('month', $indexFrom)
                        ->whereNation($this->nation)
                        ->sum('value');
        return $totalTo - $totalFrom;
    }
}
