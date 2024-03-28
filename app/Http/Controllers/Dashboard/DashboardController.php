<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard() {
        return view('home');
    }

    public function showArticle($id) {
        return view('detail_article');
    }
}
