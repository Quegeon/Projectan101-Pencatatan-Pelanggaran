<?php

namespace App\Http\Controllers\Pelanggaran\Temporary;

use App\Http\Controllers\Controller;
use App\Models\TempAturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TempController extends Controller
{
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
}
