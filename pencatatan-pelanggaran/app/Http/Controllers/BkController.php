<?php

namespace App\Http\Controllers;

use App\Models\Bk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BkController extends Controller
{
    public function index()
    {
        $bk = Bk::all();
        return view('home.admin.bk.index', compact('bk'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required', 
            'username' => 'required',
            'password' => 'required',
            'foto' => 'required|image|mimes:png,jpg,svg,pdf,gif',
        ]);
      
        try {
            $imgName = Str::orderedUuid() . '.' . $request->foto->extension();
            $request->file('foto')->move('fotobk/', $imgName);
            
            $validated['id'] = Str::orderedUuid();
            $validated['password'] = bcrypt($validated['password']);
            $validated['foto'] = $imgName;
            
            Bk::create($validated);

            return redirect()
                ->route('bk.index')
                ->with('success', 'Data Berhasil Dibuat');
          
        } catch (\Throwable $th) {
            return redirect()
                ->route('bk.index')
                ->with('error', 'Error Store Data');
        }
    }

    public function edit(string $id)
    {
        $bk = Bk::find($id);

        if ($bk === null) {
            return redirect()
                ->route('bk.index')
                ->with('error', 'Invalid Target Data');
        }

        return view('home.admin.bk.edit', compact(['bk']));
    }
    
    public function update(Request $request, string $id)
    {
        $bk = Bk::find($id);

        if ($bk === null) {
            return redirect()
                ->route('bk.index')
                ->with('error', 'Invalid Target Data');
        }

        $validated = $request->validate([
            'nama' => 'required', 
            'username' => 'required',
            'foto' => 'image|mimes:png,jpg,svg,pdf,gif',
        ]);

        if ($request->hasFile('foto')){
            try {
                $imgName = Str::orderedUuid() . '.' . $request->foto->extension(); // jadina nama si file teh ngacak
                $request->file('foto')->move('fotobk/', $imgName);
                
                $validated['foto'] = $imgName;

                return redirect()
                    ->route('bk.index')
                    ->with('success', 'Data Berhasil Diubah');

            } catch (\Throwable $th) {
                return redirect()
                    ->route('bk.index')
                    ->with('error', 'Error Update Data');
            }
        }

        try {
            $bk->update($validated);
    
            return redirect()
                ->route('bk.index')
                ->with('success', 'Data Berhasil Diubah');
            
        } catch (\Throwable $th) {
            return redirect()
                ->route('bk.index')
                ->with('error', 'Error Update Data');
        }
    }

    public function destroy(string $id)
    {
        $bk = Bk::find($id);

        if ($bk === null) {
            return redirect()
                ->route('bk.index')
                ->with('error', 'Invalid Target Data');
        }

        try {
            $bk->delete();

            return redirect()
                ->route('bk.index')
                ->with('success', 'Data Berhasil Dihapus');
            
        } catch (\Throwable $th) {
            return redirect()
                ->route('bk.index')
                ->with('error', 'Error Destroy Data');
        }
    }
}
