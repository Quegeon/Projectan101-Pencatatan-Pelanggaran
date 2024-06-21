<?php

namespace App\Http\Controllers\Pelanggaran\Petugas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
class ImportController extends Controller
{
    public function import(Request $request)
{
    $auth = Auth::user();

    try {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:xlsx,xls'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Format file tidak valid');
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            Excel::import($file, function($rows) use ($auth) {
                foreach ($rows as $row) {
                    $validated = [
                        'nis' => $row['nis'],
                        'keterangan' => $row['keterangan'],
                        'no_pelanggaran' => $row['no_pelanggaran'],
                        'id' => Str::orderedUuid(),
                        'id_user' => Auth::user()->id,
                        'tgl_pelanggaran' => Carbon::today()
                    ];

                    DB::table('pelanggaran')->insert($validated);

                    DB::table('detail_aturan')->insert([
                        'id' => Str::orderedUuid(),
                        'no_pelanggaran' => $row['no_pelanggaran'],
                        'id_aturan' => $row->id_aturan 
                    ]);
                }
            });

            cache()->forget($auth->id.'newData');

            return redirect()
                ->route('dashboard')
                ->with('success', 'Data berhasil diimpor');
        } else {
            return redirect()
                ->route('dashboard')
                ->with('error', 'File tidak ditemukan');
        }
    } catch (\Throwable $th) {
        return redirect()
            ->route('dashboard')
            ->with('error', 'Error saat mengimpor data: ' . $th->getMessage());
    }
}
}

