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
use App\Models\TempAturan;
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
            'no_pelanggaran' => IDGenerator(new Pelanggaran, 'no_pelanggaran', 4, 'DP')
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
            'id_bk' => 'required',
            'no_pelanggaran' => 'required',
            'keterangan' => 'required|string|max:255',
            'status' => 'required'
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

    public function detail(string $id)
    {
        $pelanggaran = Pelanggaran::find($id);

        if ($pelanggaran === null) {
            return back()
                ->with('error','Reference Data Error');
        }

        return view('home.admin.pelanggaran.detail', compact(['pelanggaran']));
    }
    
    public function edit(string $id)
    {
        $pelanggaran = Pelanggaran::find($id);
        $data = array(
            'siswa' => Siswa::all(),
            'bk' => Bk::all(),
            'aturan' => Aturan::all(),
            'tempaturan' => TempAturan::where('no_pelanggaran', $pelanggaran->no_pelanggaran)->get()
        );

        if ($pelanggaran === null) {
            return redirect()
                ->route('pelanggaran.index')
                ->with('error', 'Invalid Target Data');
        }

        if ($data['siswa']->first() === null || $data['bk']->first() === null || $data['aturan'] === null) {
            return redirect()
                ->route('pelanggaran.index')
                ->with('error', 'Reference Data Error');
        }

        return view('home.admin.pelanggaran.edit', $data, compact(['pelanggaran']));
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
            'id_bk' => 'required',
            'keterangan' => 'required|string|max:255',
            'total_poin' => 'required|numeric|max:100',
            'tgl_pelanggaran' => 'required|date',
            'status' => 'required',
        ]);  

        try {
            $tempaturan = TempAturan::query()->where('no_pelanggaran', $pelanggaran->no_pelanggaran);
            $tempaturan->each(function($old){
                $new = $old->replicate();
                $new->id = Str::orderedUuid();
                $new->setTable('detail_aturans');
                $new->save();

                $old->delete();
            });

            $siswa = Siswa::find($validated['nis']);
            ($siswa->poin + $validated['total_poin'] > 100) ? $poin = 100 : $poin = $siswa->poin + $validated['total_poin'];

            if ($poin >= 0 && $poin <= 25) {
                $status = "Baik";
            } elseif ($poin > 25 && $poin <= 50) {
                $status = "Kurang Baik";
            } elseif ($poin > 50 && $poin <= 75) {
                $status = "Buruk";
            } elseif ($poin > 75 && $poin <= 100) {
                $status = "Sangat Buruk";
            } else {
                $status = "Undefined Status";
            }

            $siswa->update(['poin' => $poin, 'status' => $status]);

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
}
