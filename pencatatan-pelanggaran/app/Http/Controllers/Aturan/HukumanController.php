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
        $request->validate([
            'hukuman' => 'required'
        ]);
        
        try {
            $id = Str::orderedUuid()->toString();
    
            Hukuman::create([
                'id' => $id,
                'hukuman' => $request->hukuman,
                $request->except(['_token'])
            ]);
    
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
                
        } else {
            $request->validate([
                'hukuman' => 'required'
            ]);

            try {
                $hukuman->update($request->except(['_token']));

                return redirect()
                    ->route('hukuman.index')
                    ->with('success','Data Berhasil Diubah');
    
            } catch (\Throwable $th) {
                return redirect()
                    ->route('hukuman.index')
                    ->with('error','Error Update Data');
            }
        }
        
    }

    public function destroy(string $id)
    {
        $hukuman = Hukuman::find($id);
        
        if ($hukuman === null) {
            return redirect()
                ->route('hukuman.index')
                ->with('error','Invalid Target Data');
                
        } else {
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
}
