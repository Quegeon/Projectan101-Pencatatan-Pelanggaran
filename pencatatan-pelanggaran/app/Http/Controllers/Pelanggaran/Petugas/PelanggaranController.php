<?php

namespace App\Http\Controllers\Pelanggaran\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Aturan;
use App\Models\Bk;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PelanggaranController extends Controller
{
    public function create()
    {
        $siswa = Siswa::all();
    
        if ($siswa->first() === null) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Reference Data Error');
        } else {
            return view('home.admin.user.create-laporan', compact(['siswa']));
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|max:99999999999|numeric',
            'keterangan' => 'required|max:255'
        ]);

        // try {
            $validated['id'] = Str::orderedUuid()->toString();
            $validated['id_user'] = Auth::user()->id;
            $validated['tgl_pelanggaran'] = Carbon::today();

            Pelanggaran::create($validated);

            return redirect()
                ->route('dashboard')
                ->with('success','Data Berhasil Dibuat');

        // } catch (\Throwable $th) {
        //     return redirect()
        //         ->route('dashboard.petugas')
        //         ->with('error','Error Store Data');
        // }
    }

    public function edit(string $id)
    {
        $pelanggaran = Pelanggaran::find($id);
        
        if ($pelanggaran === null) {
            return redirect()
                ->route('dashboard')
                ->with('error','Invalid Target Data');
        }

        $siswa = Siswa::all();

        if ($siswa->first() === null) {
            return redirect()
                ->route('dashboard')
                ->with('error','Reference Data Error');

        } else {
            return view('home.admin.user.edit-laporan', compact(['pelanggaran','siswa']));
        }
    }

    public function update(Request $request, string $id)
    {
        $pelanggaran = Pelanggaran::find($id);

        if ($pelanggaran === null) {
            return redirect()
                ->route('dashboard')
                ->with('error','Invalid Target Data');

        } else {
            $validated = $request->validate([
                'nis' => 'required|max:99999999999|numeric',
                'keterangan' => 'required|max:255',
                'tgl_pelanggaran' => 'required|date'
            ]);

            try {
                $pelanggaran->update($validated);

                return redirect()
                    ->route('dashboard')
                    ->with('success','Data Berhasil Diubah');

            } catch (\Throwable $th) {
                return redirect()
                    ->route('dashboard')
                    ->with('error','Error Update Data');
            }
        }
    }

    public function destroy($id)
    {
        $pelanggaran = Pelanggaran::find($id);

        if ($pelanggaran === null) {
            return redirect()
                ->route('dashboard')
                ->with('error','Invalid Target Data');

        } else {
            try {
                $pelanggaran->delete();

                return redirect()
                    ->route('dashboard')
                    ->with('success','Data Berhasil Dihapus');

            } catch (\Throwable $th) {
                return redirect()
                    ->route('dashboard')
                    ->with('error','Error Destroy Data');
            }
        }
    }

    public function print()
    {
        $pelanggaran = Pelanggaran::all();
        $user = User::all();
        $bk = Bk::all();
        $aturan = Aturan::all();
        $siswa = Siswa::all();

        return view('home.dashboard.printpetugas', compact('pelanggaran', 'siswa', 'bk', 'user', 'aturan'));
    }
}
