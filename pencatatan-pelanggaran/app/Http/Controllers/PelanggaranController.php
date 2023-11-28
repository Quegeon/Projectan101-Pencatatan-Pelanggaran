<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
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
            'id_aturan' => 'required|uuid',
            'id_bk' => 'required|uuid',
            'keterangan' => 'required',
            'total_poin' => 'required',
            'status' => 'required',
        ]);        
        $validated['id'] = Str::orderedUuid()->toString();
        $validated['id_user'] = Auth::user()->id;
        $validated['tgl_pelanggaran'] = $request->tgl_pelanggaran;
        // dd($validated);

        Pelanggaran::create($validated);
        return redirect('/pelanggaran')->with('success', 'Data Successfully Created!');
    }
    
    public function show(string $id)
    {
        $data = array(
            'pelanggaran' => Pelanggaran::find($id),
            'siswa' => Siswa::all(),
            'bk' => Bk::all(),
            'aturan' => Aturan::all(),
        );
        return view('home.admin.pelanggaran.edit', $data);
    }
    
    public function update(Request $request, string $id)
    {
        $pelanggaran = Pelanggaran::find($id);
        $validated = $request->validate([
            'nis' => 'required', 
            'id_aturan' => 'required',
            'keterangan' => 'required',
            'total_poin' => 'required',
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
