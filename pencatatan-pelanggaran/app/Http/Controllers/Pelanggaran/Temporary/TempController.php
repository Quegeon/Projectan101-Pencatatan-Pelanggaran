<?php

namespace App\Http\Controllers\Pelanggaran\Temporary;

use App\Http\Controllers\Controller;
use App\Models\DetailAturan;
use App\Models\Pelanggaran;
use App\Models\TempAturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TempController extends Controller
{
    public function temp_store(Request $request) {
        // 3
        $validated = $request->validate([
            'no_pelanggaran' => 'required',
            'id_aturan' => 'required',
            'id' => 'required'
        ]);

        $unique = [
            'temp' => TempAturan::where('no_pelanggaran', $validated['no_pelanggaran'])->where('id_aturan', $validated['id_aturan'])->first(),
            'detail' => DetailAturan::where('no_pelanggaran', $validated['no_pelanggaran'])->where('id_aturan', $validated['id_aturan'])->first()
        ];

        if ($unique['temp'] !== null || $unique['detail'] !== null) {
            return back()->with('error', 'Pelanggaran tidak boleh sama!');
        }

        TempAturan::create($validated);

        return back()->with('success', 'Data berhasil dibuat');
    }
    
    public function temp_destroy($id) {
        TempAturan::find($id)->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
