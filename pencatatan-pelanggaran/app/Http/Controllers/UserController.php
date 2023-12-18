<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('home.admin.user.index', compact('petugas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required', 
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
            'foto' => 'required|image|mimes:png,jpg,svg,pdf,gif',
        ]);
        
        try {
            $imgName = Str::orderedUuid() . '.' . $request->foto->extension();
            $request->file('foto')->move('fotopetugas/' ,$imgName);
            
            $validated['id'] = Str::orderedUuid();
            $validated['password'] = bcrypt($request->password);
            $validated['foto'] = $imgName;
            
            User::create($validated);

            return redirect()
                ->route('petugas.index')
                ->with('success', 'Data Berhasil Dibuat');

        } catch (\Throwable $th) {
            return redirect()
                ->route('petugas.index')
                ->with('error', 'Error Store Data');
        }
    }

    public function edit(string $id)
    {
        $user = User::find($id);

        if ($user === null) {
            return redirect()
                ->route('user.index')
                ->with('error', 'Invalid Target Data');
        }

        return view('home.admin.user.edit', compact(['user']));
    }
    
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if ($user === null) {
            return redirect()
                ->route('petugas.index')
                ->with('error', 'Invalid Target Data');
        }

        $validated = $request->validate([
            'nama' => 'required', 
            'username' => 'required',
            'level' => 'required',
            'foto' => 'image|mimes:png,jpg,svg,pdf,gif',
        ]);

        if ($request->hasFile('foto')){
            try {
                $imgName = Str::orderedUuid() . '.' . $request->foto->extension(); // jadina nama si file teh ngacak
                $request->file('foto')->move('fotopetugas/', $imgName);

                $validated['foto'] = $imgName;

                $user->update($validated);
                
                return redirect()
                    ->route('petugas.index')
                    ->with('success', 'Data Berhasil Diubah');

            } catch (\Throwable $th) {
                return redirect()
                    ->route('petugas.index')
                    ->with('error', 'Error Update Data');
            }
        }
        
        try {
            $user->update($validated);
            
            return redirect()
                ->route('petugas.index')
                ->with('success', 'Data Berhasil Diubah');
                
        } catch (\Throwable $th) {
            return redirect()
                ->route('petugas.index')
                ->with('error', 'Error Update Data');
        }
    }

    public function destroy(string $id)
    {
        $user = User::find($id);

        if ($user === null) {
            return redirect()
                ->route('petugas.index')
                ->with('error', 'Invalid Target Data');
        }

        try {
            $user->delete();
            
            return redirect()
                ->route('petugas.index')
                ->with('success', 'Data Berhasil Dihapus');
            
        } catch (\Throwable $th) {
            return redirect()
                ->route('petugas.index')
                ->with('error', 'Error Destroy Data');
        }
    }
}
