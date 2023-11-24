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

        return view('', compact(['hukuman']));
    }

    public function create()
    {
        return view('');
    }

    public function store(Request $request)
    {
        $id = Str::orderedUuid();

        Hukuman::create([
            'id' => $id,
            'hukuman' => $request->hukuman,
            $request->except(['_token'])
        ]);

        return redirect('');
    }

    public function show(string $id)
    {
        $hukuman = Hukuman::find($id);

        return view('', compact(['Hukuman']));
    }

    public function update(Request $request, string $id)
    {
        $hukuman = Hukuman::find($id);

        $hukuman->update($request->except(['_token']));

        return redirect('');
    }

    public function destroy(string $id)
    {
        $hukuman = Hukuman::find($id);

        $hukuman->delete();

        return redirect('');
    }
}
