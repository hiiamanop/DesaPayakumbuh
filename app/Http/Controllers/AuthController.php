<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Login 
    public function login()
    { 
            return view('auth.login');
    }

    public function loginProcess() {
            
        return view ('dashboard.main');
    }
}
