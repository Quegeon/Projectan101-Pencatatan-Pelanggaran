<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
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
      return view('kelas.create');
    }

    public function store(Request $request)
    {

       $validate = $request->validate([
            'nama_kelas' => 'required',
            'jurusan' => 'required',
        ]);

        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas'=>$request->nama_kelas,
            'jurusan'=>$request->jurusan,
            // $request->except(['_token']),
        ]);
        return redirect('kelas')->with($validate) ->with('success', 'Data Successfully Created!');
    }

    public function edit(string $id)
    {
        $kelas = Kelas::where('id', $id)->first();
        return view('home.admin.kelas.edit', compact('kelas'));
    }

    public function update(Request $request, string $id)
    {
        $kelas = Kelas::find($id);
        if (!$kelas) {
            return redirect()->back()->with('error', 'Kelas not found');
        }
        $kelas->update($request->except('_token'));
    
        return redirect('kelas')->with('success', 'Data Successfully Updated!');
    }

    public function destroy(string $id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return redirect('kelas')->with('error', 'Data not found.');
        }
          
        $kelas->delete();
        Siswa::where('id_kelas', $id)->delete();
        return redirect('kelas')->with('success', 'Data Successfully Deleted!');
    }
}
