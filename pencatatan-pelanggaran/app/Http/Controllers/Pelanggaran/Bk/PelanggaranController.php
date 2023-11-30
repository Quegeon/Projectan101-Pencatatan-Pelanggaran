<?php

namespace App\Http\Controllers\Pelanggaran\Bk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggaran;
use App\Models\Bk;
use App\Models\Siswa;
use App\Models\Aturan;

class PelanggaranController extends Controller
{
    public function index()
    {
        $data = array(
            'pelanggaran' => Pelanggaran::where('status', 'Belum')->get(),
            'siswa' => Siswa::all(),
            'bk' => Bk::all(),
            'aturan' => Aturan::all(),
        );

        if($data['siswa']->first() === null || $data['bk']->first() === null || $data['aturan'] === null) {
            return redirect()
                ->route('pelanggaran.index')
                ->with('error', 'Reference Data Error');
        }

        return view('home.bk.pelanggaran.index', $data);
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
            return redirect()
                ->route('pelanggaran.index')
                ->with('error', 'Error Store Data');
        }

    }

    public function edit(string $id) {
        $data = array(
            'pelanggaran' => Pelanggaran::find($id),
            'aturan' => Aturan::all(),
        );

        if($data['pelanggaran'] === null) {
            return redirect()
                ->route('pelanggaran.index')
                ->with('error', 'Invalid Target Data');
        }
        
        return view('home.bk.pelanggaran.edit', $data);
    }

    public function update(string $id, Request $request) {
        $data = array(
            'pelanggaran' => Pelanggaran::find($id),
            'aturan' => Aturan::all(),
        );

        if($data['pelanggaran'] === null) {
            return redirect()
                ->route('pelanggaran.index')
                ->with('error', 'Invalid Target Data');
        }

        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function proses(string $id) {
        $data = array(
            'pelanggaran' => Pelanggaran::find($id),
            'aturan' => Aturan::all(),
            'siswa' => Siswa::all(),
        );

        if($data['pelanggaran'] === null) {
            return redirect()
                ->route('review.index')
                ->with('error', 'Invalid Target Data');
        }

        return view('home.bk.pelanggaran.proses', $data);
    }

    public function done(string $id, Request $request) {
        $data = array(
            'pelanggaran' => Pelanggaran::find($id),
        );

        if($data['pelanggaran'] === null) {
            return redirect()
                ->route('review.index')
                ->with('error', 'Invalid Target Data');
        }
        
        try {
            $data['pelanggaran']->update(['status' => 'Sudah']);
            
            return redirect()
                ->route('review.index')
                ->with('success', 'Data Sudah Di Proses!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
