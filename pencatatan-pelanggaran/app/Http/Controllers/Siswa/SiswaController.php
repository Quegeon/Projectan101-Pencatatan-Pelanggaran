<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();

        return view("home.admin.siswa.index", compact(['siswa','kelas']));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "nis" => "required|numeric|unique:siswas,nis|digits_between:10,15",
            "id_kelas" => "required|exists:kelas,id",
            "nama" => "required|string|max:100",
            "no_telp" => "required|numeric|digits_between:12,13",
            "alamat" => "max:255",
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
                return redirect()
                    ->route('siswa.index')
                    ->with('error','Invalid Poin');
            }

            $validated['poin'] = $poin;
            $validated['status'] = $status;

            Siswa::create($validated);

            return redirect()
                ->route('siswa.index')
                ->with("success", "Data Berhasil Dibuat");

        } catch (\Throwable $th) {
            return redirect()
                ->route('siswa.index')
                ->with('error', 'Error Store Data');
        }
    }

    public function edit(string $nis)
    {
        $siswa = Siswa::find($nis);
        $kelas = Kelas::all();

        if ($siswa === null) {
            return redirect()
                ->route('siswa.index')
                ->with('error', 'Invalid Target Data');
        }

        return view("home.admin.siswa.edit", compact(['siswa','kelas']));
    }

    public function update(Request $request, string $nis)
    {
        $siswa = Siswa::find($nis);

        if ($siswa === null) {
            return redirect()
                ->route('siswa.index')
                ->with('error', 'Invalid Target Data');
        }

        $validated = $request->validate([
            "id_kelas" => "required|exists:kelas,id",
            "nama" => "required|string|max:100",
            "no_telp" => "required|numeric|digits_between:12,13",
            "poin" => "required|numeric|between:0,100",
            "alamat" => "max:255",
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
                return redirect()
                    ->route('siswa.index')
                    ->with('error','Invalid Poin');
            }

            $validated['status'] = $status;

            $siswa->update($validated);

            return redirect()
                ->route('siswa.index')
                ->with("success", "Data Berhasil Diubah");

        } catch (\Throwable $th) {
            return redirect()
                ->route('siswa.index')
                ->with('error', 'Error Update Data');
        }
    }

    public function destroy(string $nis)
    {
        $siswa = Siswa::find($nis);

        if ($siswa === null) {
            return redirect()
                ->route('siswa.index')
                ->with('error', 'Invalid Target Data');
        }

        try {
            $siswa->delete();
            return redirect()
                ->route('siswa.index')
                ->with("success", "Data Berhasil Dihapus");

        } catch (\Throwable $th) {
            return redirect()
                ->route('siswa.index')
                ->with('error', 'Error Destroy Data');
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
            $update_poin = $siswa->poin - $request->poin;
            $siswa->update(['poin' => $update_poin]);
            return back()
                ->with('success','Poin Berhasil Diubah');

        } catch (\Throwable $th) {
            return back()
                ->with('error','Error Update Poin');
        }
    }

}
