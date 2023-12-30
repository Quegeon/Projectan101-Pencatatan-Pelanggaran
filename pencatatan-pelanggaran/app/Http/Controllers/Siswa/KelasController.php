<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use illuminate\Support\str;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();

        return view('home.admin.kelas.index', compact('kelas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|string|unique:kelas,nama_kelas|max:15',
            'jurusan' => 'required|string|max:50',
        ]);
        
        try {
            $validated['id'] = Str::orderedUuid();

            Kelas::create($validated);

            return redirect()
                ->route('kelas.index')
                ->with('success', 'Data Berhasil Dibuat');

        } catch (\Throwable $th) {
            return redirect()
                ->route('kelas.index')
                ->with('error', 'Error Store Data');
        }
    }

    public function edit(string $id)
    {
        $kelas = Kelas::find($id);

        if($kelas === null) {
            return redirect()
                ->route('kelas.index')
                ->with('error', 'Invalid Target Data');
        }

        return view('home.admin.kelas.edit', compact(['kelas']));
    }
    
    public function update(Request $request, string $id)
    {
        $kelas = Kelas::find($id);

        if($kelas === null) {
            return redirect()
                ->route('kelas.index')
                ->with('error', 'Invalid Target Data');
        }

        // TODO: Refactor This

        if ($request->nama_kelas === $kelas->nama_kelas) {
            $validated = $request->validate([
                'nama_kelas' => 'required|string|max:15',
                'jurusan' => 'required|string|max:50',
            ]);

        } else {
            $validated = $request->validate([
                'nama_kelas' => 'required|string|unique:kelas,nama_kelas|max:15',
                'jurusan' => 'required|string|max:50',
            ]);
        }

        try {
            $kelas->update($validated);
    
            return redirect()
                ->route('kelas.index')
                ->with('success', 'Data Berhasil Diubah');
            
        } catch (\Throwable $th) {
            return redirect()
                ->route('kelas.index')
                ->with('error', 'Error Update Data');
        }

    }

    public function destroy(string $id)
    {
        $kelas = Kelas::find($id);

        if($kelas === null) {
            return redirect()
                ->route('kelas.index')
                ->with('error', 'Invalid Target Data');
        }
        try {
            $kelas->delete();
            return redirect()
                ->route('kelas.index')
                ->with('success', 'Data Berhasil Dihapus');
            
        } catch (\Throwable $th) {
            return redirect()
                ->route('kelas.index')
                ->with('error', 'Error Destroy Data');
        }
    }
}
