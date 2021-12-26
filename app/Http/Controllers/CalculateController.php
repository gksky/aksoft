<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function calc(Request $req) {
        $result = '';
        $dimentions = $req->input();
        $sqr = [$dimentions['a'], $dimentions['b']]; // параметры отверстия
        $vol = [$dimentions['x'], $dimentions['y'], $dimentions['z']]; // параметры параллелепипеда


        if (min($sqr) < min($vol)) {
            return "не пройдет";
        }

        rsort($sqr);        // удаление минимального
        array_pop($sqr);    // значения из массива отверстия

        sort($vol);         // удаление минимального
        array_shift($vol);  // и максимального
        array_pop($vol);    // значения из массива параллелепипеда

        if ($sqr[0] < $vol[0]) {
            return "не пройдет";
        }

        return "ПРОЙДЕТ";
    }
}
