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
        $validated = $request->validate([
            'nama' => 'required', 
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
            'foto' => 'required|image|mimes:png,jpg,svg,pdf,gif',
        ]);
        $validated['id'] = Str::orderedUuid();

        if($request->hasFile('foto')){
            $imgName = Str::orderedUuid().'.'.$request->foto->extension(); // jadina nama si file teh ngacak
            $request->file('foto')->move('fotopetugas/',$imgName);
            $validated['foto'] = $imgName;
        } else {
            $validated['foto'] = 'kosong';
        }

        User::create($validated);
        return redirect('/user')->with('success', 'Data Created Successfully!');
    }
    

    public function edit(string $id)
    {
        $user = User::find($id);
        return view('home.admin.user.edit', compact(['user']));
    }
    
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $validated = $request->validate([
            'nama' => 'required', 
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
            'foto' => 'required|image|mimes:png,jpg,svg,pdf,gif',
        ]);


        if($request->hasFile('foto')){
            $imgName = Str::orderedUuid().'.'.$request->foto->extension(); // jadina nama si file teh ngacak
            $request->file('foto')->move('fotopetugas/',$imgName);
            $validated['foto'] = $imgName;
        } else {
            $validated['foto'] = 'kosong';
        }

        $user->update($validated);

        return redirect('/user');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('success', 'Data Deleted Successfully!');
    }
}
