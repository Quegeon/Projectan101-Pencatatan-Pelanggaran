<?php

namespace App\Http\Controllers\Aturan;

use App\Http\Controllers\Controller;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JenisController extends Controller
{
    public function index()
    {
        $jenis = Jenis::all();

        return view('home.admin.jenis.index', compact(['jenis']));
    }

    public function store(Request $request)
    {
        $id = Str::orderedUuid()->toString();

        Jenis::create([
            'id' => $id,
            'nama_jenis' => $request->nama_jenis,
            'keterangan' => $request->keterangan,
            $request->except(['_token'])
        ]);

        return redirect()->route('jenis.index')->with('success','Data Berhasil Dibuat');
    }

    public function edit(string $id)
    {
        $jenis = Jenis::find($id);

        return view('home.admin.jenis.edit', compact(['jenis']));
    }
    
    public function update(Request $request, string $id)
    {
        $jenis = Jenis::find($id);

        $jenis->update($request->except(['_token']));

        return redirect()->route('jenis.index')->with('success','Data Berhasil Diubah');
    }

    public function destroy(string $id)
    {
        $jenis = Jenis::find($id);

        $jenis->delete();

        return redirect()->route('jenis.index')->with('success','Data Berhasil Dihapus');
    }
}
