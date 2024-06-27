<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreviewController extends Controller
{
    public function index()
    {
        return view('layouts.siswa-preview');
    }

    public function search(Request $request)
    {
        $nis = $request->input('nis');
        $password = $request->input('password');

        return response()->json(['nis' => $nis, 'password' => $password]);
    }
}
