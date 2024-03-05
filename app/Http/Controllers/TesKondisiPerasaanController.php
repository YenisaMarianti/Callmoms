<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesKondisiPerasaanController extends Controller
{
    public function showTesKondisiPerasaan() {
        return view('emotional_condition.emotional_condition');
    }
}
