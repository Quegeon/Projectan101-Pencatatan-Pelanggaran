<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    
    public function index()
    {
        $kelas = Kelas::all();
        return view('');
    }

    public function create()
    {
      return view('');
    }

    public function store(Request $request)
    {
        Kelas::create([
            'id'=>$request->id,
            'nama_kelas'=>$request->nama_kelas,
            'jurusan'=>$request->jurusan,
            $request->except(['_token']),
        ]);
    }

    public function show(string $id)
    {
        $kelas = Kelas::find($id);
        return view('');
    }

    public function update(Request $request, string $id)
    {
        $kelas = Kelas::find($id);
        $kelas->update([
            'id'=>$request->id,
            'nama_kelas'=>$request->nama_kelas,
            'jurusan'=>$request->jurusan,
            $request->except(['_token']),
        ]);
    }

    public function destroy(string $id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect('');
    }
}
