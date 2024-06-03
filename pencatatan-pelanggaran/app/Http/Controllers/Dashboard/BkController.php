<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pelanggaran;
use App\Models\Aturan;
use App\Models\Jenis;
use App\Models\Hukuman;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BkController extends Controller
{

    
//     public function getPelanggaranPerBulan()
// {
//     // Query untuk mendapatkan jumlah pelanggaran per bulan
//     $pelanggaran_per_bulan = Pelanggaran::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
//         ->whereIn('status', ['Beres', 'Selesai'])
//         ->groupBy('month')
//         ->get()
//         ->pluck('count', 'month')
//         ->toArray();

//     // Inisialisasi array untuk setiap bulan dengan nilai 0
//     $pelanggaran_bulanan = array_fill(1, 12, 0);

//     // Isi array dengan data dari query
//     foreach ($pelanggaran_per_bulan as $month => $count) {
//         $pelanggaran_bulanan[$month] = $count;
//     }

//     return array_values($pelanggaran_bulanan);
// }
// Model Pelanggaran

    public function index()
    {
        $start = Carbon::today()->firstOfMonth();
        $dupe_start = Carbon::today()->firstOfMonth();
        $daysInMonth = Carbon::today()->daysInMonth;
        $end = $dupe_start->addDays($daysInMonth);

        $pelanggaran_per_bulan = Pelanggaran::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereIn('status', ['Beres', 'Selesai'])
        ->groupBy('month')
        ->get()
        ->pluck('count', 'month')
        ->toArray();

        $pelanggaran_bulanan = [
            'Jan' => 0,
            'Feb' => 0,
            'Mar' => 0,
            'Apr' => 0,
            'May' => 0,
            'Jun' => 0,
            'Jul' => 0,
            'Aug' => 0,
            'Sep' => 0,
            'Oct' => 0,
            'Nov' => 0,
            'Dec' => 0,
        ];

        foreach ($pelanggaran_per_bulan as $month => $count) {
            $nama_bulan = date("M", mktime(0, 0, 0, $month, 1));
            $pelanggaran_bulanan[$nama_bulan] = $count;
        }

        $top_movers = Siswa::select('siswas.nis', 'siswas.nama', 'kelas.nama_kelas', DB::raw('COUNT(pelanggarans.id) as total_pelanggaran'))
        ->leftJoin('kelas', 'siswas.id_kelas', '=', 'kelas.id')
        ->leftJoin('pelanggarans', 'siswas.nis', '=', 'pelanggarans.nis')
        ->whereIn('pelanggarans.status', ['Beres', 'Selesai'])
        ->groupBy('siswas.nis', 'siswas.nama', 'kelas.nama_kelas')
        ->orderByDesc('total_pelanggaran')
        ->limit(5)
        ->get();

        foreach ($top_movers as $mover) {
            $siswa = Siswa::where('nis', $mover->nis)->first();
            $mover->nama_siswa = $siswa->nama;
        } 
        $pelanggaran_per_jurusan = Siswa::join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
        ->select('kelas.jurusan', DB::raw('COUNT(pelanggarans.id) as total_pelanggaran'))
        ->leftJoin('pelanggarans', 'siswas.nis', '=', 'pelanggarans.nis')
        ->whereIn('pelanggarans.status', ['Beres', 'Selesai'])
        ->groupBy('kelas.jurusan')
        ->get();

    // Mengubah format data untuk digunakan dalam chart JavaScript
        $data_jurusan = [];
        foreach ($pelanggaran_per_jurusan as $pelanggaran) {
            $data_jurusan[$pelanggaran->jurusan] = $pelanggaran->total_pelanggaran;
        }


        $data = array(
            'count_siswa' => Siswa::count(),
            'count_aturan' => Aturan::count(),
            'history' => Pelanggaran::select()->where('status','Beres')->orderBy('updated_at','desc')->limit(5)->get(),
            // TODO: Solve Total Minggu
            'top_movers' => $top_movers,
            'pelanggaran_per_jurusan' => $data_jurusan,
            // 'total_minggu' => Pelanggaran::select()->whereBetween('tgl_pelanggaran',[(7 * $diffInWeek) - 7 + 1, 7 * $diffInWeek])->count(),
            'count_inbox' => Pelanggaran::where('status','Belum')->count(),
            'total_bulan' => Pelanggaran::select()->whereBetween('tgl_pelanggaran',[$start,$end])->count()
            
        );

        return view('home.dashboard.dashboard-bk', $data, compact('pelanggaran_bulanan'));
    }
    public function view_siswa()
    {
        $siswa = Siswa::all();
        return view('home.bk.siswa', compact('siswa'));
    }

    public function view_aturan()
    {
        $aturan = Aturan::all();
        $jenis = Jenis::all();
        $hukuman = Hukuman::all();
        return view('home.bk.aturan', compact('aturan','jenis','hukuman'));
    }

    public function history_aturan($nis)
    {
        $siswa = Siswa::find($nis);
        return view('home.bk.pelanggaran.aturan', compact('aturan','jenis','hukuman'));
    }

}
