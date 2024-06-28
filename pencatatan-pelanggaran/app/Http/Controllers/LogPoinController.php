<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\LogPoin;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class LogPoinController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('home.bk.log-poin', compact('kelas'));
    }

    public function get_log_poin()
    {
        $data = LogPoin::orderBy('created_at', 'desc')
            ->with(['Siswa', 'BK', 'Kelas'])
            ->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('nama_siswa', function ($item) {
                return $item->Siswa->nama ?? '-';
            })
            ->addColumn('masked_datetime', function ($item) {
                return (new Carbon($item->created_at))
                    ->locale('id')
                    ->translatedFormat('l, d F Y \p\u\k\u\l H:i');
            })
            ->editColumn('poin_asal', function ($item) {
                return $item->poin_asal ?? 0;
            })
            ->addColumn('aktivitas', function ($item) {
                $el = '';

                // Kalau Reset Semua
                if ($item->is_reset && !$item->id_user && !$item->id_kelas) {
                    $el = "{$item->BK->nama} Melakukan Reset poin ke seluruh siswa";
                }

                // Reset Perkelas
                if ($item->is_reset && !$item->id_user && $item->id_kelas) {
                    $el = "{$item->BK->nama} Melakukan Reset poin ke siswa {$item->Kelas->nama_kelas}";
                }

                // Reset Siswa
                if ($item->is_reset && $item->id_user) {
                    $el = "{$item->BK->nama} Mereset poin {$item->Siswa->nama}";
                }

                // Pengurangan biasa
                if (!$item->is_reset && $item->id_user) {
                    $el = "{$item->BK->nama} Mengurangi poin sebesar {$item->poin_perubahan} ke {$item->Siswa->nama}";
                }

                // CMIIW MASZEH
                return $el;
            })
            ->rawColumns(['nama_siswa', 'masked_datetime', 'aktivitas'])
            ->toJson();
    }

    public function get_per_siswa($nis)
    {
        try {
            $decrypt = Crypt::decrypt($nis);
            $nis = $decrypt['id'];
            $siswa = Siswa::where('nis', $nis)->first();

            $data = LogPoin::orderBy('created_at', 'desc')
            ->where(function ($query) use ($nis) {
                return $query->where('id_user', $nis)
                    ->orWhere('id_user', null);
            })
            ->where(function ($query) use ($siswa) {
                return $query->where('id_kelas', $siswa->id_kelas)
                    ->orWhere('id_kelas', null);
            })
            ->with(['Siswa', 'BK', 'Kelas'])
            ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('masked_datetime', function ($item) {
                    return (new Carbon($item->created_at))
                        ->locale('id')
                        ->translatedFormat('l, d F Y \p\u\k\u\l H:i');
                })
                ->editColumn('poin_asal', function ($item) {
                    return $item->poin_asal ?? 0;
                })
                ->addColumn('aktivitas', function ($item) use ($nis) {
                    $el = '';

                    // Kalau Reset Semua
                    if ($item->is_reset && !$item->id_user && !$item->id_kelas) {
                        $el = "{$item->BK->nama} Melakukan Reset poin ke seluruh siswa";
                    }

                    // Reset Perkelas
                    if ($item->is_reset && !$item->id_user && $item->id_kelas) {
                        $el = "{$item->BK->nama} Melakukan Reset poin ke siswa {$item->Kelas->nama_kelas}";
                    }

                    // Reset Siswa
                    if ($item->is_reset && ($item->id_user && $item->id_user == $nis)) {
                        $el = "{$item->BK->nama} Mereset poin {$item->Siswa->nama}";
                    }

                    // Pengurangan biasa
                    if (!$item->is_reset && ($item->id_user && $item->id_user == $nis)) {
                        $el = "{$item->BK->nama} Mengurangi poin sebesar {$item->poin_perubahan} ke {$item->Siswa->nama}";
                    }

                    // CMIIW MASZEH
                    return $el;
                })
                ->rawColumns(['masked_datetime', 'aktivitas'])
                ->toJson();
            
        } catch (\Throwable $th) {
            $siswa = Siswa::where('nis', $nis)->first();

            $data = LogPoin::orderBy('created_at', 'desc')
            ->where(function ($query) use ($nis) {
                return $query->where('id_user', $nis)
                    ->orWhere('id_user', null);
            })
            ->where(function ($query) use ($siswa) {
                return $query->where('id_kelas', $siswa->id_kelas)
                    ->orWhere('id_kelas', null);
            })
            ->with(['Siswa', 'BK', 'Kelas'])
            ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('masked_datetime', function ($item) {
                    return (new Carbon($item->created_at))
                        ->locale('id')
                        ->translatedFormat('l, d F Y \p\u\k\u\l H:i');
                })
                ->editColumn('poin_asal', function ($item) {
                    return $item->poin_asal ?? 0;
                })
                ->addColumn('aktivitas', function ($item) use ($nis) {
                    $el = '';

                    // Kalau Reset Semua
                    if ($item->is_reset && !$item->id_user && !$item->id_kelas) {
                        $el = "{$item->BK->nama} Melakukan Reset poin ke seluruh siswa";
                    }

                    // Reset Perkelas
                    if ($item->is_reset && !$item->id_user && $item->id_kelas) {
                        $el = "{$item->BK->nama} Melakukan Reset poin ke siswa {$item->Kelas->nama_kelas}";
                    }

                    // Reset Siswa
                    if ($item->is_reset && ($item->id_user && $item->id_user == $nis)) {
                        $el = "{$item->BK->nama} Mereset poin {$item->Siswa->nama}";
                    }

                    // Pengurangan biasa
                    if (!$item->is_reset && ($item->id_user && $item->id_user == $nis)) {
                        $el = "{$item->BK->nama} Mengurangi poin sebesar {$item->poin_perubahan} ke {$item->Siswa->nama}";
                    }

                    // CMIIW MASZEH
                    return $el;
                })
                ->rawColumns(['masked_datetime', 'aktivitas'])
                ->toJson();
        }
    }

    public function reset_semua(Request $request)
    {
        $user = Auth::User();
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'tipe_reset' => ['required']
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator->errors());
            }

            if ($request->tipe_reset == 'per_kelas') {
                $siswa = Siswa::where('id_kelas', $request->reset_kelas)->get();
                LogPoin::create([
                    'id' => Str::orderedUuid(),
                    'id_bk' => $user->id,
                    'id_kelas' => $request->reset_kelas,
                    'is_reset' => 1
                ]);
            } else {
                $siswa = Siswa::all();
                LogPoin::create([
                    'id' => Str::orderedUuid(),
                    'id_bk' => $user->id,
                    'is_reset' => 1
                ]);
            }

            $siswa->each(function ($item) {
                $item->poin = 0;
                $item->status = 'Baik';
                $item->save();
            });

            DB::commit();
            return redirect()
                ->back()
                ->with('success', 'sukses mereset poin siswa!');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()
                ->back()
                ->with('error', 'Gagal mereset poin siswa!');
        }
    }

    public function reset_poin_siswa($nis)
    {
        $user = Auth::User();
        try {
            DB::beginTransaction();
            $siswa = Siswa::where('nis', $nis)->first();

            LogPoin::create([
                'id' => Str::orderedUuid(),
                'id_bk' => $user->id,
                'id_user' => $siswa->nis,
                'poin_asal' => $siswa->poin,
                'poin_perubahan' => 0,
                'is_reset' => 1
            ]);
            $siswa->poin = 0;
            $siswa->status = 'Baik';
            $siswa->save();

            DB::commit();
            return redirect()
                ->back()
                ->with('success', 'sukses mereset poin siswa!');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            DB::rollBack();
            return redirect()
                ->back()
                ->with('error', 'Gagal mereset poin siswa!');
        }
    }
}
