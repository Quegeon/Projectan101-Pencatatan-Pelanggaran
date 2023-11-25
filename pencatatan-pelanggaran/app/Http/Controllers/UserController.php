<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $img - User::create([
            'nama' => $request->nama,
            'level' => $request->level,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            $request->except(['_token']),
        ]);
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopetugas/',$request->file('foto')->getClientOriginalName());
            $img->foto = $request->file('foto')->getClientOriginalName();
            $img->save();
        return redirect('/user');
        }
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
