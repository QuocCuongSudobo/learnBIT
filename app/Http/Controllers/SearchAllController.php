<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\All;
use App\SAll;

class SearchAllController extends Controller
{
    public function __construct()
    {
        $this->from = date_from();
        $this->to = date_to();
        $this->nation = 2;
        $this->pd_t = 100;
        $this->pd_id = 100;
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

        $total = All::whereIn('month', $dataDate)
                    ->whereNation($this->nation)
                    ->wherePdT($this->pd_t)
                    ->wherePdId($this->pd_id)
                    ->sum('value');

        return $total;
    }

    public function searchBIT($from, $to)
    {
        $indexFrom = binary(get_index($from) - 1);
        $indexTo = binary(get_index($to));

        $totalTo = SAll::whereIn('month', $indexTo)
                        ->whereNation($this->nation)
                        ->wherePdT($this->pd_t)
                        ->wherePdId($this->pd_id)
                        ->sum('value');

        $totalFrom = SAll::whereIn('month', $indexFrom)
                        ->whereNation($this->nation)
                        ->wherePdT($this->pd_t)
                        ->wherePdId($this->pd_id)
                        ->sum('value');
        return $totalTo - $totalFrom;
    }
}
