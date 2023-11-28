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

        if($data['siswa']->first() === null || $data['bk']->first() === null || $data['aturan'] === null) {
            return route('pelanggaran.index')
                ->with('error', 'Reference Data Error');
        }

        return view('home.admin.pelanggaran.index', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required', 
            'id_aturan' => 'required',
            'id_bk' => 'required',
            'keterangan' => 'required',
            'total_poin' => 'required|numeric|max:100',
            'status' => 'required',
        ]);        
        
        try {
            $validated['id'] = Str::orderedUuid()->toString();
            $validated['id_user'] = Auth::user()->id;
            $validated['tgl_pelanggaran'] = $request->tgl_pelanggaran;

            Pelanggaran::create($validated);

            return redirect()
                ->route('pelanggaran.index')
                ->with('success', 'Data Successfully Created!');

        } catch(\Throwable $th) {
            dd($th);
            return redirect()
                ->route('pelanggaran.index')
                ->with('error', 'Error Store Data');
        }

    }
    
    public function edit(string $id)
    {
        $data = array(
            'pelanggaran' => Pelanggaran::find($id),
            'siswa' => Siswa::all(),
            'bk' => Bk::all(),
            'aturan' => Aturan::all(),
        );

        if($data['siswa']->first() === null || $data['bk']->first() === null || $data['aturan'] === null) {
            return redirect()
                ->route('pelanggaran.index')
                ->with('error', 'Reference Data Error');
        }

        return view('home.admin.pelanggaran.edit', $data);
    }
    
    public function update(Request $request, string $id)
    {
        $pelanggaran = Pelanggaran::find($id);

        if($pelanggaran === null) {
            return redirect()
                ->route('pelanggaran.index')
                ->with('error', 'Invalid Target Data');
        }

        $validated = $request->validate([
            'nis' => 'required', 
            'id_aturan' => 'required',
            'id_bk' => 'required',
            'keterangan' => 'required',
            'total_poin' => 'required|numeric|max:100',
            'status' => 'required',
        ]);  

        try {
            
            $pelanggaran->update($validated);
            return redirect()
                ->route('pelanggaran.index')
                ->with('success', 'Data Successfully Updated!');
            
        } catch (\Throwable $th) {
            return redirect()
                ->route('pelanggaran.index')
                ->with('error', 'Error Update Data');   
        }

    }

    public function destroy(string $id)
    {
        $pelanggaran = Pelanggaran::find($id);

        if($pelanggaran === null) {
            return redirect()
                ->route('pelanggaran.index')
                ->with('error', 'Invalid Target Data');
        }

        try {
            $pelanggaran->delete();
            return redirect()
                ->route('pelanggaran.index')
                ->with('success', 'Data Successfully Deleted!');
        } catch (\Throwable $th) {
            return redirect()
                ->route('pelanggaran.index')
                ->with('error','Error Destroy Data'); 
        }
    }
}
