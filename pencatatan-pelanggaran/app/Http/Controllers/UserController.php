<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('home.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //todo:tambah foto
        User::create([
            'nama' => $request->nama,
            'level' => $request->level,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            $request->except(['_token']),
        ]);
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('home.user.edit', compact(['user']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user');
    }
}
