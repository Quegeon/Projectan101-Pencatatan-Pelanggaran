<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggaran;
use App\Models\Aturan;
use App\Models\Hukuman;
use App\Models\Siswa;
use App\Models\Bk;

class PelanggaranController extends Controller
{
    public function index()
    {
        $data = array(
            'pelanggaran' => Pelanggaran::all(),
            'siswa' => Siswa::all(),
            'bk' => Bk::all(),
            'aturan' => Aturan::all(),
        );
        return view('home.admin.pelanggaran.index', $data);
    }

    public function create()
    {
        return view('home.admin.pelanggaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required', 
            'id_aturan' => 'required',
            'keterangan' => 'required',
            'poin' => 'required',
            'status' => 'required',
        ]);        
        $validated['id'] = Str::orderedUuid();
        $validated['id_user'] = Auth::user()->id;

        Pelanggaran::create($validated);
        return redirect('/pelanggaran')->with('success', 'Data Successfully Created!');
    }
    
    public function edit(string $id)
    {
        $pelanggaran = Pelanggaran::find($id);
        return view('home.admin.pelanggaran.edit', compact(['pelanggaran']));
    }
    
    public function update(Request $request, string $id)
    {
        $pelanggaran = Pelanggaran::find($id);
        $validated = $request->validate([
            'nis' => 'required', 
            'id_aturan' => 'required',
            'keterangan' => 'required',
            'poin' => 'required',
            'status' => 'required',
        ]);  

        $pelanggaran->update($validated);
        return redirect('/pelanggaran')->with('success', 'Data Successfully Updated!');
    }

    public function destroy(string $id)
    {
        $pelanggaran = Pelanggaran::find($id);
        $pelanggaran->delete();
        return redirect('/pelanggaran')->with('success', 'Data Successfully Deleted!');
    }
}
