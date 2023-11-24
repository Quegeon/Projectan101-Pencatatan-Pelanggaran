<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('');
    }

    public function create()
    {
        return view('');
    }

    public function store(Request $request)
    {
        Siswa::create([
            'nis'=>$request->nis,
            'id_kelas'=>$request->id_kelas,
            'nama'=>$request->nama,
            'no_telp'=>$request->no_telp,
            'alamat'=>$request->alamat,
            'poin'=>$request->poin,
            'status'=>$request->status,
            $request->except(['_token']),
        ]);
        return redirect('');
    }

    public function show(string $nis)
    {
        $siswa = Siswa::find($nis);
        return view('');
    }

    public function update(Request $request, string $nis)
    {
        $siswa = Siswa::find($nis);
        $siswa->update([
            'nis'=>$request->nis,
            'id_kelas'=>$request->id_kelas,
            'nama'=>$request->nama,
            'no_telp'=>$request->no_telp,
            'alamat'=>$request->alamat,
            'poin'=>$request->poin,
            'status'=>$request->status,
            $request->except(['_token']),
        ]);
        return redirect('');
    }

    public function destroy(string $nis)
    {
        $siswa = Siswa::find($nis);
        $siswa->delete();
        return redirect('');
    }
}
