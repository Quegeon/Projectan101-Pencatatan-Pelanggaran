<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Aturan;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $jumlah_kelas = Kelas::count();
        $jumlah_siswa = Siswa::count();
        $jumlah_aturan = Aturan::count();

        $pelanggaran = Pelanggaran::Select()->where('id_user', Auth::User()->id)
        ->orderBy('tgl_pelanggaran','desc')
        ->limit(5)
        ->get();
    
        $today = Carbon::today();
        $start = Carbon::today()->subDays(7);
        $total_minggu = Pelanggaran::Select(Pelanggaran::raw('COUNT(*) as total_pelanggaran'))
        ->whereBetWeen('tgl_pelanggaran',[$start , $today])->first();
    
        return view('home.dashboard.dashboard-petugas',compact('jumlah_kelas','jumlah_siswa','jumlah_aturan','pelanggaran','total_minggu')); 
       
        // return view('home.dashboard.dashboard-petugas');
    }

}
