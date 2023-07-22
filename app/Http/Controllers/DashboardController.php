<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $currenttime = date("H:i:s");
        // dd($currenttime);
        return view('dashboard.main', ['currentTime' => $currenttime]);
    }

    public function izin()
    {
        return view('dashboard.izin');
    }
}
