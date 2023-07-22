<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\User;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    // public function index()
    // {
    //     return view('absensi.main');
    // }

    public function absen(Request $request)
    {
        $request->validate([

        ], [

        ]);

        $email = Session('email');
        $data = [
           'status' => 1,
           'email' => $email
        ];
        // dd($data);
        Absen::create($data);
        return redirect()->back()->with('success', 'Absensi Berhasil');
    }
}
