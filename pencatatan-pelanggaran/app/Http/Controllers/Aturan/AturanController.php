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
        $jenis = Jenis::all();
        $hukuman = Hukuman::all();

        if ($aturan->first() === null || $jenis->first() === null || $hukuman->first() === null){
            return redirect()
                ->route('aturan.index')
                ->with('error','Reference Data Error');

        } else {
            return view('home.admin.aturan.index', compact(['aturan', 'jenis', 'hukuman']));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_jenis' => 'required',
            'id_hukuman' => 'required',
            'nama_aturan' => 'required',
            'poin' => 'required|numeric|max:100'
        ]);

        try {
            $id = Str::orderedUuid()->toString();

            Aturan::create([
                'id' => $id,
                'id_jenis' => $request->id_jenis,
                'id_hukuman' => $request->id_hukuman,
                'nama_aturan' => $request->nama_aturan,
                'poin' => $request->poin,
                $request->except(['_token'])
            ]);
    
            return redirect()
                ->route('aturan.index')
                ->with('success','Data Berhasil Dibuat');
            
        } catch (\Throwable $th) {
            return redirect()
                ->route('aturan.index')
                ->with('error','Error Store Data');
        }
    }

    public function edit(string $id)
    {
        $aturan = Aturan::find($id);
        $jenis = Jenis::all();
        $hukuman = Hukuman::all();

        if ($aturan->first() === null || $jenis->first() === null || $hukuman->first() === null){
            return redirect()
                ->route('aturan.index')
                ->with('error','Reference Data Error');

        } else {
            return view('home.admin.aturan.edit', compact(['aturan','jenis','hukuman']));
        }

    }

    public function update(Request $request, string $id)
    {
        $aturan = Aturan::find($id);

        if ($aturan === null){
            return redirect()
                ->route('aturan.index')
                ->with('error','Invalid Target Data');

        } else {
            $request->validate([
                'id_jenis' => 'required',
                'id_hukuman' => 'required',
                'nama_aturan' => 'required',
                'poin' => 'required|numeric|max:100'
            ]);

            try {
                $aturan->update($request->except(['_token']));
                
                return redirect()
                    ->route('aturan.index')
                    ->with('success','Data Berhasil Diubah');

            } catch (\Throwable $th) {
                return redirect()
                    ->route('aturan.index')
                    ->with('error','Error Update Data');
            }
        }


    }

    public function destroy(string $id)
    {
        $aturan = Aturan::find($id);

        if ($aturan === null){
            return redirect()
                ->route('aturan.index')
                ->with('error','Invalid Target Data');

        } else {
            try {
                $aturan->delete();
        
                return redirect()
                    ->route('aturan.index')
                    ->with('success','Data Berhasil Dihapus');
                
            } catch (\Throwable $th) {
                return redirect()
                    ->route('aturan.index')
                    ->with('error','Error Destroy Data');        
            }
        }

    }
}
