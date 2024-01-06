<?php

namespace App\Http\Controllers\Pelanggaran\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggaran;
use App\Models\Aturan;
use App\Models\Siswa;
use App\Models\Bk;
use Carbon\Carbon;

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

        if ($data['siswa']->first() === null || $data['bk']->first() === null || $data['aturan'] === null) {
            return redirect()
                ->route('pelanggaran.index')
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
            'keterangan' => 'required|string|max:255',
            'total_poin' => 'required|numeric|max:100',
            'status' => 'required',
        ]);        
        
        try {
            $validated['id'] = Str::orderedUuid();
            $validated['id_user'] = Auth::user()->id;
            $validated['tgl_pelanggaran'] = Carbon::today();

            Pelanggaran::create($validated);

            return redirect()
                ->route('pelanggaran.index')
                ->with('success', 'Data Berhasil Dibuat');

        } catch(\Throwable $th) {
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

        if ($data['pelanggaran'] === null) {
            return redirect()
                ->route('pelanggaran.index')
                ->with('error', 'Invalid Target Data');
        }

        if ($data['siswa']->first() === null || $data['bk']->first() === null || $data['aturan'] === null) {
            return redirect()
                ->route('pelanggaran.index')
                ->with('error', 'Reference Data Error');
        }

        return view('home.admin.pelanggaran.edit', $data);
    }
    
    public function update(Request $request, string $id)
    {
        $pelanggaran = Pelanggaran::find($id);

        if ($pelanggaran === null) {
            return redirect()
                ->route('pelanggaran.index')
                ->with('error', 'Invalid Target Data');
        }

        $validated = $request->validate([
            'nis' => 'required', 
            'id_aturan' => 'required',
            'id_bk' => 'required',
            'keterangan' => 'required|string|max:255',
            'total_poin' => 'required|numeric|max:100',
            'tgl_pelanggaran' => 'required|date',
            'status' => 'required',
        ]);  

        try {
            $pelanggaran->update($validated);

            return redirect()
                ->route('pelanggaran.index')
                ->with('success', 'Data Berhasil Diubah');
            
        } catch (\Throwable $th) {
            return redirect()
                ->route('pelanggaran.index')
                ->with('error', 'Error Update Data');   
        }

    }

    public function destroy(string $id)
    {
        $pelanggaran = Pelanggaran::find($id);

        if ($pelanggaran === null) {
            return redirect()
                ->route('pelanggaran.index')
                ->with('error', 'Invalid Target Data');
        }

        try {
            $pelanggaran->delete();

            return redirect()
                ->route('pelanggaran.index')
                ->with('success', 'Data Berhasil Dihapus');

        } catch (\Throwable $th) {
            return redirect()
                ->route('pelanggaran.index')
                ->with('error','Error Destroy Data'); 
        }
    }

    public function history($nis)
    {
        $siswa = Siswa::find($nis);
        $pelanggaran = Pelanggaran::where('nis', $nis)->get();

        if ($siswa === null) {
            return back()
                ->with('error','Target Data Error');
        }

        return view('home.admin.siswa.historysiswa',compact(['siswa','pelanggaran']));
    }

    public function change_point($nis, Request $request)
    {
        $siswa = Siswa::find($nis);
        
        if ($siswa === null) {
            return back()
                ->with('error','Target Data Error');
        }

        
        $request->validate(['poin' => 'required|numeric|max:100']);

        if ($request->poin > $siswa->poin) {
            return back()
                ->with('error','Poin Pengurangan Melebihi Poin Siswa');
        }
        
        try {
            $siswa->update(['poin' => $request->poin]);
            return back()
                ->with('success','Poin Berhasil Diubah');

        } catch (\Throwable $th) {
            return back()
                ->with('error','Error Update Poin');
        }
    }

}
