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
        $jumlah_kelas = Kelas::count();
        $jumlah_siswa = Siswa::count();
        $jumlah_aturan = Aturan::count();

        $pelanggaran_petugas = Pelanggaran::Select()->where('id_user', Auth()->User()->id)
            ->orderBy('tgl_pelanggaran','desc')
            ->limit(5)
            ->get();

        $pelanggaran_admin = Pelanggaran::Select()
            ->orderBy('tgl_pelanggaran','desc')
            ->limit(5)
            ->get();

            $start = Carbon::today()->firstOfMonth();
            $dupe_month = Carbon::today()->firstOfMonth();
            $daysInMonth = Carbon::today()->daysInMonth;
            $end = $dupe_month->addDays($daysInMonth -1);
            $total_bulan = Pelanggaran::Select(Pelanggaran::raw('COUNT(*) as total_pelanggaran'))
            ->whereBetWeen('tgl_pelanggaran',[$start , $end])->first();
            
      
        return view('home.dashboard.dashboard-petugas',compact('jumlah_kelas','jumlah_siswa','jumlah_aturan','pelanggaran_admin','pelanggaran_petugas','total_bulan')); 
    }

    public function detail($id) {
        $pelanggaran = Pelanggaran::find($id);
        $user = User::all();
        $bk = Bk::all();
        $aturan = Aturan::all();
        $siswa = Siswa::all();
        return view('home.dashboard.detail-petugas',compact('pelanggaran','siswa','bk','user','aturan'));
    }

}
