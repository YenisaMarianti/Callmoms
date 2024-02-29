<?php

namespace App\Http\Controllers\SpecialServices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeditationController extends Controller
{
    public function showMeditation() {
        return view('special_services.meditation');
    }
}
