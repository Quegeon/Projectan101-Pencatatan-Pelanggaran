<?php

namespace App\Http\Controllers\Pelanggaran\Bk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Aturan;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Bk;
use App\Models\Kelas;

class PelanggaranController extends Controller
{
    public function inbox()
    {
        $data = array(
            'pelanggaran' => Pelanggaran::where('status', 'Belum')->get(),
            'siswa' => Siswa::all(),
            'bk' => Bk::all(),
            'aturan' => Aturan::all(),
        );

        if ($data['siswa']->first() === null || $data['bk']->first() === null || $data['aturan'] === null) {
            return view('home.bk.pelanggaran.inbox', $data)
                ->with('error', 'Reference Data Error');
        }

        // dd($data['pelanggaran']);

        return view('home.bk.pelanggaran.inbox', $data);
    }

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
                ->route('review.index')
                ->with('error', 'Reference Data Error');
        }

        return view('home.bk.pelanggaran.index', $data);
    }

    public function create()
    {
        $siswa = Siswa::all();

        if ($siswa->first() === null) {
            return redirect()
                ->route('dashboard.petugas')
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
        $validated['id_user'] = User::where(['username' => 'admin'])->first()->id;
        $validated['tgl_pelanggaran'] = Carbon::today();

        Pelanggaran::create($validated);

        return redirect(url()->previous())
            ->with('success', 'Data Berhasil Dibuat');

        // } catch (\Throwable $th) {
        //     return redirect()
        //         ->route('dashboard.petugas')
        //         ->with('error','Error Store Data');
        // }
    }

    public function edit(string $id)
    {
        $data = array(
            'pelanggaran' => Pelanggaran::find($id),
            'aturan' => Aturan::all(),
            'siswa' => Siswa::all(),
            'bk' => Bk::all()
        );

        if ($data['pelanggaran'] === null) {
            return redirect(url()->previous())
                ->with('error', 'Invalid Target Data');
        }


        if ($data['siswa']->first() === null) {
            return redirect(url()->previous())
                ->with('error', 'Reference Data Error');
        } else {
            return view('home.bk.pelanggaran.review', $data);
        }
    }

    public function update(Request $request, string $id)
    {
        $pelanggaran = Pelanggaran::find($id);

        if ($pelanggaran === null) {
            return redirect()
                ->route('dashboard.petugas')
                ->with('error', 'Invalid Target Data');
        } else {
            $validated = $request->validate([
                'nis' => 'required|max:99999999999|numeric',
                'keterangan' => 'required|max:255',
                'id_aturan' => 'required',
                'total_poin' => 'required'
            ]);
            $siswa = Siswa::find($validated['nis']);

            try {
                $validated['status'] = 'Beres';
                $validated['id_bk'] = Auth::User()->id;
                $pelanggaran->update($validated);

                $poin = $siswa->poin + $validated['total_poin'];
                $status = '';

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

                return redirect()
                    ->route('dashboard.bk')
                    ->with('success', 'Data Berhasil Diubah');
            } catch (\Throwable $th) {
                return redirect()
                    ->route('dashboard.bk')
                    ->with('error', 'Error Update Data');
            }
        }
    }

    public function destroy($id)
    {
        $pelanggaran = Pelanggaran::find($id);

        if ($pelanggaran === null) {
            return redirect(url()->previous())
                ->with('error', 'Invalid Target Data');
        } else {
            try {
                $pelanggaran->delete();

                return redirect(url()->previous())
                    ->with('success', 'Data Berhasil Dihapus');
            } catch (\Throwable $th) {
                return redirect(url()->previous())
                    ->with('error', 'Error Destroy Data');
            }
        }
    }

    public function printbk()
    {
        $pelanggaran = Pelanggaran::all();
        $user = User::all();
        $bk = Bk::all();
        $aturan = Aturan::all();
        $siswa = Siswa::all();

        return view('home.dashboard.printbk', compact('pelanggaran', 'siswa', 'bk', 'user', 'aturan'));
    }

    public function receipt($id)
    {
        $pelanggaran = Pelanggaran::find($id);
        $user = User::all();
        $bk = Bk::all();
        $aturan = Aturan::all();
        $siswa = Siswa::all();

        return view('home.dashboard.receipt', compact('pelanggaran', 'siswa', 'bk', 'user', 'aturan'));
    }

    
    public function detail($nis) {
        $siswa = Siswa::find($nis);

        if ($siswa === null) {
            return back()
                ->with('error','Target Data Error');
        }

        return view('home.bk.pelanggaran.siswa',compact('siswa'));
    }


    public function history($nis)
    {
        $siswa = Siswa::find($nis);
        $pelanggaran = Pelanggaran::where('nis', $nis)->get();

        if ($siswa === null) {
            return back()
                ->with('error','Target Data Error');
        }

        return view('home.bk.pelanggaran.historysiswa',compact(['siswa','pelanggaran']));
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
