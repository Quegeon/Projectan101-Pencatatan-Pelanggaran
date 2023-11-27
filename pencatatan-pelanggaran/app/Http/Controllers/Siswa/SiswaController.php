<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('home.admin.siswa.index',compact('siswa','kelas'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('siswa.create',compact('kelas'));
    }

    public function store(Request $request)
    {
     $validate = $request->validate([
        'nis' => 'required|numeric|unique:siswas,nis',
        'id_kelas' => 'required|exists:kelas,id',
        'nama' => 'required|string|max:255',
        'no_telp' => 'required|numeric|digits_between:9,15',
        'alamat' => 'required|string|max:500',
        // 'poin' => 'required|numeric|between:0,100',
        ]);

        $poin = $request->has('poin') ? $request->poin : 0;

        $poin = $request->poin;

        if ($poin >= 0 && $poin <= 25) {
            $status = 'Baik';
        } elseif ($poin > 25 && $poin <= 50) {
            $status = 'Kurang Baik';
        } elseif ($poin > 50 && $poin <= 75) {
            $status = 'Buruk';
        } elseif ($poin > 75 && $poin <= 100) {
            $status = 'Sangat Buruk';
        } else {
            $status = 'Undefined Status';
        }

        Siswa::create([
            'nis'=>$request->nis,
            'id_kelas'=>$request->id_kelas,
            'nama'=>$request->nama,
            'no_telp'=>$request->no_telp,
            'alamat'=>$request->alamat,
            'poin' => $poin ?? 0,
            'status'=>$status,
        
        ]);
        return back()->with($validate)->with('success', 'Data Successfully Created!');
        
    }

    public function show(string $nis)
    {
        $kelas = Kelas::all();
        $siswa = Siswa::find($nis);
        return view('home.admin.siswa.edit', compact('siswa','kelas'));
    }

    public function update(Request $request, string $nis)
    {
        $validate = $request->validate([
            'id_kelas' => 'required|exists:kelas,id',
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|numeric|digits_between:9,15',
            'alamat' => 'required|string|max:500',
            'poin' => 'required|numeric|between:0,100',
            ]);

        $poin = $request->poin;

        if ($poin >= 0 && $poin <= 25) {
            $status = 'Baik';
        } elseif ($poin > 25 && $poin <= 50) {
            $status = 'Kurang Baik';
        } elseif ($poin > 50 && $poin <= 75) {
            $status = 'Buruk';
        } elseif ($poin > 75 && $poin <= 100) {
            $status = 'Sangat Buruk';
        } else {
            $status = 'Undefined Status';
        }
        
        $siswa = Siswa::find($nis);
        $siswa->update([
            'id_kelas'=>$request->id_kelas,
            'nama'=>$request->nama,
            'no_telp'=>$request->no_telp,
            'alamat'=>$request->alamat,
            'poin'=>$poin,
            'status'=>$status,
        ]);
        return redirect('siswa')->with($validate)->with('success', 'Data Successfully Updated!');
    }

    public function destroy(string $nis)
    {
        $siswa = Siswa::find($nis);
        $siswa->delete();
        return redirect('siswa')->with('success', 'Data Successfully Deleted!');
    }
}
