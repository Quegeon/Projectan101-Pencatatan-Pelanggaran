<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Aturan;
use App\Models\Bk;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $start = Carbon::today()->firstOfMonth();
        $dupe_month = Carbon::today()->firstOfMonth();
        $daysInMonth = Carbon::today()->daysInMonth;
        $end = $dupe_month->addDays($daysInMonth -1);

        $data = array(
            'jumlah_kelas' => Kelas::count(),
            'jumlah_siswa' => Siswa::count(),
            'jumlah_aturan' => Aturan::count(),
            'pelanggaran_petugas' => Pelanggaran::select()->where('id_user', Auth::user()->id)->orderBy('tgl_pelanggaran','desc')->limit(5)->get(),
            'pelanggaran_admin' => Pelanggaran::select()->orderBy('tgl_pelanggaran','desc')->limit(5)->get(),
            'total_bulan_admin' => Pelanggaran::select()->whereBetWeen('tgl_pelanggaran',[$start , $end])->count(),
            'total_bulan_petugas' => Pelanggaran::select()->where('id_user', Auth::user()->id)->whereBetWeen('tgl_pelanggaran',[$start , $end])->count()
        );
            
      
        return view('home.dashboard.dashboard-petugas', $data); 
    }

    public function detail($id) {
        $data = array(
            'pelanggaran' => Pelanggaran::find($id),
            'user' => User::all(),
            'bk' => Bk::all(),
            'aturan' => Aturan::all(),
            'siswa' => Siswa::all()
        );

        return view('home.dashboard.detail-petugas', $data);
    }

}
