<?php

namespace App\Http\Controllers\Pelanggaran\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Aturan;
use App\Models\Bk;
use App\Models\DetailAturan;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\TempAturan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PelanggaranController extends Controller
{
    public function create()
    {
        $data = array(
            'siswa' => Siswa::all(),
            'no_pelanggaran' => IDGenerator(new Pelanggaran, 'no_pelanggaran', 4, 'DP'),
            'aturan' => Aturan::all(),
        );

        if ($data['siswa']->first() === null) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Reference Data Error');
        }

        return view('home.admin.user.create-laporan', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|max:99999999999|numeric',
            'keterangan' => 'required|max:255',
            'no_pelanggaran' => 'required'
        ]);

        try {
            $validated['id'] = Str::orderedUuid()->toString();
            $validated['id_user'] = Auth::user()->id;
            $validated['tgl_pelanggaran'] = Carbon::today();

            TempAturan::create([
                'id' => Str::orderedUuid(),
                'no_pelanggaran' => $request->no_pelanggaran,
                'id_aturan' => $request->id_aturan
            ]);

            Pelanggaran::create($validated);

            return redirect()
                ->route('dashboard')
                ->with('success','Data Berhasil Dibuat');

        } catch (\Throwable $th) {
            return redirect()
                ->route('dashboard.petugas')
                ->with('error','Error Store Data');
        }
    }

    public function edit(string $id)
    {
        $pelanggaran = Pelanggaran::find($id);
        $data = array(
            'pelanggaran' => $pelanggaran,
            'tempaturan' => TempAturan::where('no_pelanggaran', $pelanggaran->no_pelanggaran)->first(),
            'siswa' => Siswa::all(),
            'aturan' => Aturan::all(),
        ); 
        
        if ($pelanggaran === null) {
            return redirect()
                ->route('dashboard')
                ->with('error','Invalid Target Data');
        }


        if ($data['siswa']->first() === null) {
            return redirect()
                ->route('dashboard')
                ->with('error','Reference Data Error');

        }

        return view('home.admin.user.edit-laporan', $data);
    }

    public function update(Request $request, string $id)
    {
        $pelanggaran = Pelanggaran::find($id);
        $tempaturan = TempAturan::where('no_pelanggaran', $pelanggaran->no_pelanggaran)->first();

        if ($pelanggaran === null) {
            return redirect()
                ->route('dashboard')
                ->with('error','Invalid Target Data');

        }

        $validated = $request->validate([
            'nis' => 'required|max:99999999999|numeric',
            'keterangan' => 'required|max:255',
            'tgl_pelanggaran' => 'required|date'
        ]);

        try {
            $tempaturan->update(['id_aturan' => $request->id_aturan]);
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
