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
        return view('home.admin.user.index', compact('user'));
    }

    public function create()
    {
        return view('home.admin.user.create');
    }

    public function store(Request $request)
    {
        //todo:tambah foto
        $validated = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
            'foto' => 'required|image|mimes:png,jpg,svg,pdf,gif|max:2048',
        ]); // validasi doang supaya si inputan teh diisi semua

        if($request->hasFile('foto')){
            $imgName = Str::orderedUuid().'.'.$request->foto->extension(); // jadina nama si file teh ngacak
            $request->file('foto')->move('fotopetugas/',$imgName);
            $validated['foto'] = $imgName;
        } else {
            $validated['foto'] = 'kosong';
        }

        User::create($validated);

        return redirect('/user');
    }

    public function show(string $id)
    {
        $user = User::find($id);
        return view('home.admin.user.edit', compact(['user']));
    }
    
    public function update(Request $request, string $id)
    {
        //todo:tambah foto
        $user = User::find($id);
        $user->update([
            'nama' => $request->nama,
            'level' => $request->level,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            $request->except(['_token']),
        ]);
        return redirect('/user');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user');
    }
}
