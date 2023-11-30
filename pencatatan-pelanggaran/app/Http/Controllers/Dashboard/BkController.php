<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggaran;
use App\Models\Aturan;
use App\Models\Kelas;
use App\Models\Siswa;
use Carbon\Carbon;



class BkController extends Controller
{
    public function index()
    {
        $jumlah_kelas = Kelas::count();
        $jumlah_siswa = Siswa::count();
        $jumlah_aturan = Aturan::count();

        $pelanggaran = Pelanggaran::Select()->where('status','Belum')->get();

       
        $total_minggu = Pelanggaran::where('status', 'Belum')->count();

        return view('home.dashboard.dashboard-bk', compact(['pelanggaran','jumlah_siswa','jumlah_kelas','jumlah_aturan',
                    'total_minggu']));
    }
}
