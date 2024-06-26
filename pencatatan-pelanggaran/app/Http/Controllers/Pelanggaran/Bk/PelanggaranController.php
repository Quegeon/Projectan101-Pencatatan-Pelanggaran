<?php

namespace App\Http\Controllers\Pelanggaran\Bk;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Aturan;
use App\Models\TempAturan;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Bk;
use App\Models\DetailAturan;
use Illuminate\Support\Arr;

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
        $auth = Auth::User();
        if (cache($auth->id.'newData')) {
            $no_pelanggaran = cache($auth->id.'newData');
        } else {
            $no_pelanggaran = IDGenerator(new Pelanggaran, 'no_pelanggaran', 'DP');
            cache()->put($auth->id.'newData', $no_pelanggaran);
        }

        $data = array(
            'no_pelanggaran' => $no_pelanggaran,
            'siswa' => Siswa::all(),
            'bk' => Bk::all(),
            'aturan' => Aturan::all(),
            'tempaturan' => TempAturan::where('no_pelanggaran', $no_pelanggaran)->get(),
            'tgl_pelanggaran' => Carbon::today()
        );

        if ($data['siswa']->first() === null || $data['bk']->first() === null || $data['aturan'] === null) {
            return redirect()
                ->route('review.inbox')
                ->with('error', 'Reference Data Error');
        }

        return view('home.bk.pelanggaran.create', $data);
    }


    public function store(Request $request)
    {
        $auth = Auth::user();
        $validated = $request->validate([
            'nis' => 'required|max:99999999999|numeric',
            'keterangan' => 'required|max:255',
            'no_pelanggaran' => 'required',
            'total_poin' => 'required|numeric',
            'hukuman_pilihan' => 'required',
        ]);
        $siswa = Siswa::find($validated['nis']);

        try {
            $validated['id'] = Str::orderedUuid();
            $validated['tgl_pelanggaran'] = Carbon::today();
            $validated['status'] = 'Beres';
            $validated['id_bk'] = $auth->id;

            $tempaturan = TempAturan::query()->where('no_pelanggaran', $validated['no_pelanggaran']);

            $tempaturan->each(function($old) {
                $new = $old->replicate();
                $new->id = Str::orderedUuid();
                $new->setTable('detail_aturans');
                $new->save();

                $old->delete();
            });

            $poin = $siswa->poin + $validated['total_poin'];
            if ($poin > 100) {
                $poin = 100;
                $status = "Sangat Buruk";
            }
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

            $validated['total_poin'] = $validated['total_poin'] >= 100 ? 100 : $validated['total_poin'];

            $siswa->update(['poin' => $poin, 'status' => $status]);
            Pelanggaran::create($validated);
            cache()->forget('dataAwal');
            cache()->forget($auth->id . 'newData');

            return redirect()
                ->route('dashboard.bk')
                ->with('success', 'Data Berhasil Dibuat');

        } catch (\Throwable $th) {
            dd($th);
            return redirect()
                ->route('review.inbox')
                ->with('error', 'Error Store Data');
        }
    }


    public function edit(string $id)
    {
        $pelanggaran = Pelanggaran::find($id);
        $auth = Auth::User();
        $cachekey = $auth->id.'dataEdit';
        $data = array(
            'pelanggaran' => $pelanggaran,
            'aturan' => Aturan::all(),
            'siswa' => Siswa::all(),
            'bk' => Bk::all(),
            'no_pelanggaran' => $pelanggaran->no_pelanggaran,
        );

        if(!cache()->has($cachekey)) {
            DetailAturan::query()
                ->where('no_pelanggaran', $pelanggaran->no_pelanggaran)
                ->each(function($old) {
                    $auth = Auth::User();
                    $cachekey = $auth->id.'dataEdit';

                    $new = $old->replicate();
                    $new->id = Str::orderedUuid();
                    $new->setTable('temp_aturans');
                    $new->save();

                    $cached = cache($cachekey);
                    $cached[] = $old;
                    cache()->put($cachekey, $cached);
                    $old->delete();
                });
        }

        $data['tempaturan'] = TempAturan::where('no_pelanggaran', $pelanggaran->no_pelanggaran)->get();

        if ($data['pelanggaran'] === null) {
            return back()
                ->with('error', 'Invalid Target Data');
        }

        if ($data['siswa']->first() === null) {
            return back()
                ->with('error', 'Reference Data Error');
        } else {
            return view('home.bk.pelanggaran.edit', $data);
        }
    }

    public function review(string $id) {
        $pelanggaran = Pelanggaran::find($id);

        $data = array(
            'pelanggaran' => $pelanggaran,
            'aturan' => Aturan::all(),
            'siswa' => Siswa::find($pelanggaran->nis)
        );

        if ($data['pelanggaran'] === null) {
            return back()
                ->with('error', 'Invalid Target Data');
        }

        if ($data['siswa'] === null) {
            return back()
                ->with('error', 'Reference Data Error');
        }

        $auth = Auth::User();
        $cachekey = $auth->id.'dataEdit';

        if(!cache()->has($cachekey)) {
            DetailAturan::query()
                ->where('no_pelanggaran', $pelanggaran->no_pelanggaran)
                ->each(function($old) {
                    $auth = Auth::User();
                    $cachekey = $auth->id.'dataEdit';

                    $new = $old->replicate();
                    $new->id = Str::orderedUuid();
                    $new->setTable('temp_aturans');
                    $new->save();

                    $cached = cache($cachekey);
                    $cached[] = $old;
                    cache()->put($cachekey, $cached);
                    $old->delete();
                });
        }

        $data['tempaturan'] = TempAturan::where('no_pelanggaran', $pelanggaran->no_pelanggaran)->get();

        return view('home.bk.pelanggaran.review', $data);
    }

    public function detail(string $id)
    {
        $pelanggaran = Pelanggaran::find($id);
        $detail_aturan = DetailAturan::where('no_pelanggaran', $pelanggaran->no_pelanggaran)->get();

        $data = array(
            'pelanggaran' => $pelanggaran,
            'aturan' => Aturan::all(),
            'siswa' => Siswa::all(),
            'bk' => Bk::all(),
            'detailaturan' => $detail_aturan
        );

        if ($data['pelanggaran'] === null) {
            return back()
                ->with('error', 'Invalid Target Data');
        }


        if ($data['siswa']->first() === null) {
            return back()
                ->with('error', 'Reference Data Error');
        } else {
            return view('home.bk.pelanggaran.detail', $data);
        }
    }

    public function proses(Request $request, string $id)
    {
        $pelanggaran = Pelanggaran::find($id);
        $auth = Auth::User();
        $cachekey = $auth->id.'dataEdit';

        if ($pelanggaran === null) {
            return redirect()
                ->route('dashboard.bk')
                ->with('error', 'Invalid Target Data');
        }
        $validated = $request->validate([
            'nis' => 'required|max:99999999999|numeric',
            'keterangan' => 'required|max:255',
            'total_poin' => 'required',
            'hukuman_pilihan' => 'required'
        ]);
        $validated['status'] = 'Beres';
        $validated['id_bk'] = $auth->id;

        $siswa = Siswa::find($validated['nis']);

        try {
            $pelanggaran->update($validated);
            $tempaturan = TempAturan::query()->where('no_pelanggaran', $pelanggaran->no_pelanggaran);

            $tempaturan->each(function($old) {
                $new = $old->replicate();
                $new->id = Str::orderedUuid();
                $new->setTable('detail_aturans');
                $new->save();

                $old->delete();
            });

            $poin = $siswa->poin + $validated['total_poin'];
            if ($poin > 100) {
                $poin = 100;
                $status = "Sangat Buruk";
            }
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
            $validated['total_poin'] = $validated['total_poin'] >= 100 ? 100 : $validated['total_poin'];

            $siswa->update(['poin' => $poin, 'status' => $status]);
            cache()->forget($cachekey);

            return redirect()
                ->route('dashboard.bk')
                ->with('success', 'Data Berhasil Diubah');
        } catch (\Throwable $th) {
            return redirect()
                ->route('dashboard.bk')
                ->with('error', 'Error Update Data');
        }

    }

    public function update(Request $request, string $id)
    {
        $pelanggaran = Pelanggaran::find($id);
        $auth = Auth::User();
        $cachekey = $auth->id.'dataEdit';

        if ($pelanggaran === null) {
            return redirect()
                ->route('dashboard.bk')
                ->with('error', 'Invalid Target Data');
        }

        $validated = $request->validate([
            'nis' => 'required|max:99999999999|numeric',
            'keterangan' => 'required|max:255',
            'total_poin' => 'required',
            'hukuman_pilihan' => 'required'
        ]);

        $siswa = Siswa::find($validated['nis']);

        if ($siswa === null) {
            return redirect()
                ->route('dashboard.bk')
                ->with('error', 'Error reference data');
        }

        try {
            $tempaturan = TempAturan::query()->where('no_pelanggaran', $pelanggaran->no_pelanggaran);

            $tempaturan->each(function($old) {
                $new = $old->replicate();
                $new->id = Str::orderedUuid();
                $new->setTable('detail_aturans');
                $new->save();

                $old->delete();
            });

            $poin = ((int) $siswa->poin - (int) $pelanggaran->total_poin) + (int) $validated['total_poin'];
            if ($poin > 100) {
                $poin = 100;
                $status = "Sangat Buruk";
            }
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
            $validated['total_poin'] = $validated['total_poin'] >= 100 ? 100 : $validated['total_poin'];

            $siswa->update(['poin' => $poin, 'status' => $status]);
            $pelanggaran->update($validated);
            cache()->forget($cachekey);

            return redirect()
                ->route('dashboard.bk')
                ->with('success', 'Data Berhasil Diubah');
        } catch (\Throwable $th) {
            return redirect()
                ->route('dashboard.bk')
                ->with('error', 'Error Update Data');
        }

    }

    public function destroy($id)
    {
        $pelanggaran = Pelanggaran::find($id);
        $siswa = Siswa::find($pelanggaran->nis);

        if ($pelanggaran === null) {
            return back()
                ->with('error', 'Invalid Target Data');
        }

        try {
            $poin = $siswa->poin - $pelanggaran->total_poin;
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
            DetailAturan::where('no_pelanggaran', $pelanggaran->no_pelanggaran)->delete();
            $pelanggaran->delete();

            return redirect()
                ->route('dashboard.bk')
                ->with('success', 'Data Berhasil Dihapus');

        } catch (\Throwable $th) {
            return redirect()
                ->route('dashboard.bk')
                ->with('error', 'Error Destroy Data');
        }

    }

    public function printbk()
    {
        $userId = auth()->user()->id;
        $pelanggaran = Pelanggaran::where('id_bk', '=', $userId)
            ->whereIn('status',['Beres', 'Sudah'])
            ->get();
        $user = User::all();
        $bk = Bk::all();
        $aturan = Aturan::all();
        $siswa = Siswa::all();

        return view('home.dashboard.printbk', compact('pelanggaran', 'siswa', 'bk', 'user', 'aturan'));
    }

    public function history($nis)
    {
        $siswa = Siswa::find($nis);
        $pelanggaran = Pelanggaran::where('nis', $nis)->pluck('no_pelanggaran');
        $no_pelanggaran = DetailAturan::whereIn('no_pelanggaran', $pelanggaran->toArray())->get();

        if ($siswa === null) {
            return back()
                ->with('error','Target Data Error');
        }

        return view('home.bk.pelanggaran.historysiswa',compact(['siswa','no_pelanggaran']));
    }

    public function receipt($id)
    {
        $pelanggaran = Pelanggaran::find($id);
        $nop = $pelanggaran->no_pelanggaran;
        $detail = DetailAturan::where('no_pelanggaran', '=', $nop)->get();
        $user = User::all();
        $bk = Bk::all();
        $aturan = Aturan::all();
        $siswa = Siswa::all();

        return view('home.dashboard.receipt', compact('pelanggaran', 'siswa', 'bk', 'user', 'aturan','detail'));
    }

    public function cancel($opt, $atr) {
        $tempaturan = TempAturan::query()->where('no_pelanggaran', $atr);
        $auth = Auth::User();
        $cachekey = $auth->id.'dataEdit';

        if($tempaturan !== null) {
            $tempaturan
                ->each(function($old) {
                    $old->delete();
                });
        }

        if ($opt == 'kembali') {
            return redirect()
                ->route('review.inbox')
                ->with('success', 'Sukses membatalkan');
        }

        $detailsToMove = cache($cachekey);

        if ($detailsToMove) {
            foreach ($detailsToMove as $detailCache) {
                $details = new DetailAturan();
                $details->id = Str::orderedUuid();
                $details->fill($detailCache->toArray());
                $details->save();
            }

            cache()->forget($cachekey);

            return redirect()
                ->route('review.inbox')
                ->with('success', 'Sukses membatalkan edit');
        }

        return redirect()
            ->route('review.inbox');
    }

}
