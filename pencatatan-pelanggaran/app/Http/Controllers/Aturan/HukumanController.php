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
        $id = Str::orderedUuid();

        Hukuman::create([
            'id' => $id,
            'hukuman' => $request->hukuman,
            $request->except(['_token'])
        ]);

        return redirect('/hukuman');
    }

    public function show(string $id)
    {
        $hukuman = Hukuman::find($id);

        return view('home.admin.hukuman.edit', compact(['Hukuman']));
    }

    public function update(Request $request, string $id)
    {
        $hukuman = Hukuman::find($id);

        $hukuman->update($request->except(['_token']));

        return redirect('/hukuman');
    }

    public function destroy(string $id)
    {
        $hukuman = Hukuman::find($id);

        $hukuman->delete();

        return redirect('/hukuman');
    }
}
