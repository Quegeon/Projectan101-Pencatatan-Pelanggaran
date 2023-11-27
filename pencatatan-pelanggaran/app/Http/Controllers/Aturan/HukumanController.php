<?php

namespace App\Http\Controllers\Aturan;

use App\Http\Controllers\Controller;
use App\Models\Hukuman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HukumanController extends Controller
{
    public function index()
    {
        $hukuman = Hukuman::all();

        return view('home.admin.hukuman.index', compact(['hukuman']));
    }

    public function store(Request $request)
    {
        $id = Str::orderedUuid()->toString();

        Hukuman::create([
            'id' => $id,
            'hukuman' => $request->hukuman,
            $request->except(['_token'])
        ]);

        return redirect()->route('hukuman.index')->with('success','Data Berhasil Dibuat');
    }

    public function edit(string $id)
    {
        $hukuman = Hukuman::find($id);

        return view('home.admin.hukuman.edit', compact(['hukuman']));
    }

    public function update(Request $request, string $id)
    {
        $hukuman = Hukuman::find($id);

        $hukuman->update($request->except(['_token']));

        return redirect()->route('hukuman.index')->with('success','Data Berhasil Diubah');
    }

    public function destroy(string $id)
    {
        $hukuman = Hukuman::find($id);

        $hukuman->delete();

        return redirect()->route('hukuman.index')->with('success','Data Berhasil Dihapus');
    }
}
