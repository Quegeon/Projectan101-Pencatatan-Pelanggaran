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
        $validated = $request->validate([
            'hukuman' => 'required|string|max:100'
        ]);
        
        try {
            $validated['id'] = Str::orderedUuid();
    
            Hukuman::create($validated);
    
            return redirect()
                ->route('hukuman.index')
                ->with('success','Data Berhasil Dibuat');
            
        } catch (\Throwable $th) {
            return redirect()
                ->route('hukuman.index')
                ->with('error','Error Store Data');
        }
    }

    public function edit(string $id)
    {
        $hukuman = Hukuman::find($id);

        if ($hukuman === null) {
            return redirect()
                ->route('hukuman.index')
                ->with('success','Invalid Target Data');

        } else {
            return view('home.admin.hukuman.edit', compact(['hukuman']));
        }
    }

    public function update(Request $request, string $id)
    {
        $hukuman = Hukuman::find($id);

        if ($hukuman === null) {
            return redirect()
                ->route('hukuman.index')
                ->with('error','Invalid Target Data');
                
        }

        $validated = $request->validate([
            'hukuman' => 'required|string|max:100'
        ]);

        try {
            $hukuman->update($validated);

            return redirect()
                ->route('hukuman.index')
                ->with('success','Data Berhasil Diubah');
    
         } catch (\Throwable $th) {
            return redirect()
                ->route('hukuman.index')
                ->with('error','Error Update Data');
        }
    }

    public function destroy(string $id)
    {
        $hukuman = Hukuman::find($id);
        
        if ($hukuman === null) {
            return redirect()
                ->route('hukuman.index')
                ->with('error','Invalid Target Data');
        }
        
        try {
            $hukuman->delete();
    
            return redirect()
                ->route('hukuman.index')
                ->with('success','Data Berhasil Dihapus');
            
        } catch (\Throwable $th) {
            return redirect()
                ->route('hukuman.index')
                ->with('error','Error Store Data');
        }
    }
}
