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

        return view("home.admin.siswa.index", compact("siswa", "kelas"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "nis" => "required|numeric|unique:siswas,nis",
            "id_kelas" => "required|exists:kelas,id",
            "nama" => "required|string|max:255",
            "no_telp" => "required|numeric|digits_between:9,15",
            "alamat" => "required|string|max:500",
        ]);

        try {
            $poin = $request->has("poin") ? $request->poin : 0;
            
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

            $validated['poin'] = $poin;
            $validated['status'] = $status;
    
            Siswa::create($validated);

            return redirect()
                ->route('siswa.index')
                ->with("success", "Data Successfully Created!");
            
        } catch (\Throwable $th) {
            return redirect()
                ->route('siswa.index')
                ->with('error', 'Error Store Data');
        }
    }

    public function edit(string $nis)
    {
        $kelas = Kelas::all();
        $siswa = Siswa::find($nis);

        if($siswa === null) {
            return redirect()
                ->route('siswa.index')
                ->with('error', 'Invalid Target Data');
        }

        return view("home.admin.siswa.edit", compact("siswa", "kelas"));
    }

    public function update(Request $request, string $nis)
    {
        $siswa = Siswa::find($nis);

        $validated = $request->validate([
            "id_kelas" => "required|exists:kelas,id",
            "nama" => "required|string|max:255",
            "no_telp" => "required|numeric|digits_between:9,15",
            "alamat" => "required|string|max:500",
            "poin" => "required|numeric|between:0,100",
        ]);

        try {
            $poin = $request->poin;
    
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
   
            $validated['status'] = $status;

            $siswa->update($validated);

            return redirect()
                ->route('siswa.index')
                ->with("success", "Data Successfully Updated!");   
        } catch (\Throwable $th) {
            if($siswa === null) {
                return redirect()
                    ->route('siswa.index')
                    ->with('error', 'Invalid Target Data');
            }
        }
    }

    public function destroy(string $nis)
    {
        $siswa = Siswa::find($nis);

        if($siswa === null) {
            return redirect()
                ->route('siswa.index')
                ->with('error', 'Invalid Target Data');
        }

        try {
            $siswa->delete();
            return redirect()
                ->route('siswa.index')
                ->with("success", "Data Successfully Deleted!");
            
        } catch (\Throwable $th) {
            return redirect()
                ->route('siswa.index')
                ->with('error', 'Error Destroy Data');
        }
    }
}
