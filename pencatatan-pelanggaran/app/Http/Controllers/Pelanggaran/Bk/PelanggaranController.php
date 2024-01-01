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

class PelanggaranController extends Controller
{
    private $dataAwal = [];

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
        $no_pelanggaran = IDGenerator(new Pelanggaran, 'no_pelanggaran', 4, 'DP');
        $data = array(
            'no_pelanggaran' => $no_pelanggaran,
            'siswa' => Siswa::all(),
            'bk' => Bk::all(),
            'aturan' => Aturan::all(),
            'tempaturan' => TempAturan::where('no_pelanggaran', $no_pelanggaran)->get()
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
        // 9

        $validated = $request->validate([
            'nis' => 'required|max:99999999999|numeric',
            'keterangan' => 'required|max:255',
            'no_pelanggaran' => 'required',
            'total_poin' => 'required'
        ]);
        $siswa = Siswa::find($validated['nis']);

        try {
            $validated['id'] = Str::orderedUuid();
            $validated['id_user'] = User::where(['username' => 'admin'])->first()->id;
            $validated['tgl_pelanggaran'] = Carbon::today();
            $validated['status'] = 'Beres';
            $validated['id_bk'] = Auth()->User()->id;
            // TODO: sum from tempaturan to total_poin
            $tempaturan = TempAturan::query()->where('no_pelanggaran', $validated['no_pelanggaran']);
            
            $tempaturan->each(function($old) {
                $new = $old->replicate();
                $new->id = Str::orderedUuid();
                $new->setTable('detail_aturans');
                $new->save();

                $old->delete();
            });

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
            Pelanggaran::create($validated);
            cache()->forget('dataAwal');

            return redirect()
                ->route('dashboard.bk')
                ->with('success', 'Data Berhasil Dibuat');

        } catch (\Throwable $th) {
            dd($th);
            return redirect()
                ->route('review.inbox')
                ->with('error','Error Store Data');
        }
    }

    public function edit(string $id)
    {
        $pelanggaran = Pelanggaran::find($id);
        $data = array(
            'pelanggaran' => $pelanggaran,
            'aturan' => Aturan::all(),
            'siswa' => Siswa::all(),
            'bk' => Bk::all(),
            'no_pelanggaran' => $pelanggaran->no_pelanggaran,
        );
        
        if(!cache()->has('dataAwal')) {
            DetailAturan::query()
                ->where('no_pelanggaran', $pelanggaran->no_pelanggaran)
                ->each(function($old) {
                    $new = $old->replicate();
                    $new->id = Str::orderedUuid();
                    $new->setTable('temp_aturans');
                    $new->save();

                    $cached = cache('dataAwal');
                    $cached[] = $old;
                    cache()->put('dataAwal', $cached);
                    $old->delete();
                });
        }

        // dd($this->dataAwal);
        $data['tempaturan'] = TempAturan::where('no_pelanggaran', $pelanggaran->no_pelanggaran)->get();

        if ($data['pelanggaran'] === null) {
            return redirect(url()->previous())
                ->with('error', 'Invalid Target Data');
        }


        if ($data['siswa']->first() === null) {
            return redirect(url()->previous())
                ->with('error', 'Reference Data Error');
        } else {
            return view('home.bk.pelanggaran.edit', $data);
        }
    }

    public function detail(string $id)
    {
        $pelanggaran = Pelanggaran::find($id);
        $data = array(
            'pelanggaran' => $pelanggaran,
            'aturan' => Aturan::all(),
            'siswa' => Siswa::all(),
            'bk' => Bk::all(),
            // 18
            'detailaturan' => DetailAturan::where('no_pelanggaran', $pelanggaran->no_pelanggaran)->get()
        );

        if ($data['pelanggaran'] === null) {
            return redirect(url()->previous())
                ->with('error', 'Invalid Target Data');
        }


        if ($data['siswa']->first() === null) {
            return redirect(url()->previous())
                ->with('error', 'Reference Data Error');
        } else {
            return view('home.bk.pelanggaran.detail', $data);
        }
    }

    public function update(Request $request, string $id)
    {
        $pelanggaran = Pelanggaran::find($id);

        if ($pelanggaran === null) {
            return redirect()
                ->route('dashboard.bk')
                ->with('error', 'Invalid Target Data');
        }
        $validated = $request->validate([
            'nis' => 'required|max:99999999999|numeric',
            'keterangan' => 'required|max:255',
            'total_poin' => 'required'
        ]);
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
            cache()->forget('dataAwal');

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

    public function temp_store(Request $request) {
        // 3
        $validated = Validator::make($request->all(), [
            'id' => 'required',
            'id_aturan' => 'required|unique:temp_aturans'
        ]);

        if ($validated->fails()) {
            return back()->with('error', 'Pelanggaran tidak boleh sama!');
        }

        $validated->getData()['no_pelanggaran'] = $request->no_pelanggaran;
        $validated->getData()['id'] = $request->id;
        TempAturan::create($validated->getData());
        return back()->with('success', 'Data berhasil dibuat');
    }
    
    public function temp_destroy($id) {
        TempAturan::find($id)->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }

    // 5
    public function cancel($opt, $atr) {
        if($opt == 'kembali') {
            TempAturan::query()
                ->where('no_pelanggaran', $atr)
                ->each(function($old) {
                    $old->delete();
                });

            return redirect()
                ->route('review.inbox')
                ->with('success', 'Sukses membatalkan');
        }

        // ngambil ke cache trus di loooping deh
        $detailsToMove = cache('dataAwal');

        try {
            TempAturan::query()
                ->where('no_pelanggaran', $atr)
                ->each(function($old) {
                    $old->delete();
                });
            
            foreach ($detailsToMove as $detailCache) {
                $details = new DetailAturan();
                $details->id = Str::orderedUuid();
                $details->fill($detailCache->toArray());
                $details->save();
            }

            cache()->forget('dataAwal');

            return redirect()
            ->route('review.inbox')
            ->with('success', 'Sukses membatalkan edit');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }

}
