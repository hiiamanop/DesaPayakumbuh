<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    //document
    public function arsip()
    { 
            return view('document.main');
    }

    public function unggah()
    { 
            return view('document.unggah');
    }
}
