<?php

namespace App\Http\Controllers;

use App\Models\DetailAturan;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;

class PreviewController extends Controller
{
    public function index()
    {
        return view('layouts.siswa-preview');
    }

    public function search(Request $request)
    {
        $nis = $request->input('nis');
        $password = $request->input('password');

        $siswa = Siswa::select(['nis', 'nama', 'id_kelas', 'poin'])
            ->where('nis', $nis)
            ->where('view_password', $password)
            ->first();

        if ($siswa) {
            $url_crypt = Crypt::encrypt(['id' => $siswa->nis]);
            $render = view('layouts.component.display-search-siswa', compact(['siswa', 'url_crypt']));
            return response()->json(['data' => $render->render()]);

        } else {
            return response()->json(['data' => null]);
        }
    }

    public function history_siswa($nis)
    {
        $pelanggaran = Pelanggaran::select('no_pelanggaran')
            ->where('nis', Crypt::decrypt($nis))
            ->pluck('no_pelanggaran');

        $data = DetailAturan::orderBy('created_at', 'desc')
            ->with(['Aturan'])
            ->whereIn('no_pelanggaran', $pelanggaran->toArray())
            ->get();
        
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('pelanggaran', function($item){
                return $item->Aturan->nama_aturan;
            })
            ->addColumn('poin', function($item){
                return $item->Aturan->poin;
            })
            ->rawColumns(['pelanggaran', 'poin'])
            ->toJson();
    }
}