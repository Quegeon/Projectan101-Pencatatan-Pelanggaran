<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use illuminate\Support\str;

class KelasController extends Controller
{
    
    public function index()
    {
        $kelas = Kelas::all();
        return view('home.admin.kelas.index',compact('kelas'));
    }

    public function create()
    {
      return view('');
    }

    public function store(Request $request)
    {

        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas'=>$request->nama_kelas,
            'jurusan'=>$request->jurusan,
            $request->except(['_token']),
        ]);
        return redirect('kelas');
    }

    public function show(string $id)
    {
        $kelas = Kelas::where('id', $id)->get();
        dd($kelas);
        // return view('home.admin.kelas.edit',compact('kelas'));
    }

    public function update(Request $request, string $id)
    {
        $kelas = Kelas::find($id);
        $kelas->update([
            // 'id'=>$request->id,
            'nama_kelas'=>$request->nama_kelas,
            'jurusan'=>$request->jurusan,
            $request->except(['_token']),
        ]);
        return redirect('kelas');
    }

    public function destroy(string $id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect('kelas');
    }
}
