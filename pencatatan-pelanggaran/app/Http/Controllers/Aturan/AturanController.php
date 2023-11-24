<?php

namespace App\Http\Controllers\Aturan;

use App\Http\Controllers\Controller;
use App\Models\Aturan;
use App\Models\Jenis;
use App\Models\Hukuman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AturanController extends Controller
{
    public function index()
    {
        $aturan = Aturan::all();

        return view('', compact(['aturan']));
    }

    public function create()
    {
        $jenis = Jenis::all();
        $hukuman = Hukuman::all();

        return view('', compact(['jenis','hukuman']));
    }

    public function store(Request $request)
    {
        $id = Str::orderedUuid();

        Aturan::create([
            'id' => $id,
            'id_jenis' => $request->id_jenis,
            'id_hukuman' => $request->id_hukuman,
            'nama_aturan' => $request->nama_aturan,
            'poin' => $request->poin,
            'keterangan' => $request->keterangan,
            $request->except(['_token'])
        ]);

        return redirect('');
    }

    public function show(string $id)
    {
        $aturan = Aturan::find($id);
        $jenis = Jenis::all();
        $hukuman = Hukuman::all();

        return view('', compact(['aturan','jenis','hukuman']));
    }

    public function update(Request $request, string $id)
    {
        $aturan = Aturan::find($id);

        $aturan->update($request->except(['_token']));

        return redirect('');
    }

    public function destroy(string $id)
    {
        $aturan = Aturan::find($id);

        $aturan->delete();

        return redirect('');
    }
}
