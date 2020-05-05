<?php

if (!function_exists('bn_range_date')) {
    function bn_range_date($begin, $end)
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

if (!function_exists('bit_sum')) {
    function bit_sum($index, $data)
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

if (!function_exists('get_index')) {
    function get_index($date) {
        return count(bn_range_date('202001', $date));
    }
}

if (!function_exists('binary')) {
    function binary($num) {
        $data = [ (string) $num];
        while ($num > 0) {
            $num = $num - ($num & - $num);
            if ($num > 0) {
                $data[] = (string) $num;
            }
        }

        return $data;
    }
}

if (!function_exists('date_to_index')) {
    function date_to_index($date1, $date2)
    {
        $year1 = (int) substr($date1, 0, 4);
        $month1 = (int) substr($date1, 4, 2);

        $year2 = (int) substr($date2, 0, 4);
        $month2 = (int) substr($date2, 4, 2);

        return (($year2 - $year1) * 12) + ($month2 - $month1) + 1;
    }
}

if (!function_exists('date_from')) {
    function date_from()
    {
        return '202001';
    }
}

if (!function_exists('date_to')) {
    function date_to()
    {
        return '212001';
    }
}
