<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FenwichTreeAlgorithm extends Controller
{
    protected $A = [];
    protected $S = [];
    protected $M = 16;

    public function __construct()
    {
        $this->A = range(0, $this->M);
        $this->setSum();
    }

    public function index()
    {

        $data = [
            'A' => $this->getArray(),
            'S' => $this->getSum(),
            'M' => $this->M
        ];

        return view('home')->with($data);
    }

    public function setSum()
    {
        foreach ($this->A as $index => $value) {
            $this->S[$index] = $this->sum($index);
        }
    }

    public function getSum()
    {
        return $this->S;
    }

    public function getArray()
    {
        return $this->A;
    }

    public function sum($i)
    {
        $sum = 0;
        while ($i > 0) {
            $sum += $this->A[$i];
            $i -= $this->LSB($i);
        }
        return $sum;
    }

    public function LSB($i)
    {
        return $i & - $i;
    }
}
