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
        $request->validate([
            'nama_jenis' => 'required',
            'keterangan' => 'required'
        ]);

        try {
            $id = Str::orderedUuid()->toString();
    
            Jenis::create([
                'id' => $id,
                'nama_jenis' => $request->nama_jenis,
                'keterangan' => $request->keterangan,
                $request->except(['_token'])
            ]);
    
            return redirect()
                ->route('jenis.index')
                ->with('success','Data Berhasil Dibuat');
            
        } catch (\Throwable $th) {
            return redirect()
                ->route('jenis.index')
                ->with('error','Error Store Data');
        }

    }

    public function edit(string $id)
    {
        $jenis = Jenis::find($id);

        if ($jenis === null) {
            return redirect()
                ->route('jenis.index')
                ->with('error','Invalid Target Data');

        } else {
            return view('home.admin.jenis.edit', compact(['jenis']));
        }
    }
    
    public function update(Request $request, string $id)
    {
        $jenis = Jenis::find($id);

        if ($jenis === null) {
            return redirect()
                ->route('jenis.index')
                ->with('error','Invalid Target Data');

        } else {
            $request->validate([
                'nama_jenis' => 'required',
                'keterangan' => 'required'
            ]);

            try {
                $jenis->update($request->except(['_token']));
        
                return redirect()
                    ->route('jenis.index')
                    ->with('success','Data Berhasil Diubah');
                
            } catch (\Throwable $th) {
                return redirect()
                    ->route('jenis.index')
                    ->with('error','Error Update Data');
            }
        }

    }

    public function destroy(string $id)
    {
        $jenis = Jenis::find($id);

        if ($jenis === null) {
            return redirect()
                ->route('jenis.index')
                ->with('error','Invalid Target Data');

        } else {
            try {
                $jenis->delete();
        
                return redirect()
                    ->route('jenis.index')
                    ->with('success','Data Berhasil Dihapus');
                
            } catch (\Throwable $th) {
                return redirect()
                    ->route('jenis.index')
                    ->with('error','Error Destroy Data');
            }
        }

    }
}
