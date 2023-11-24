<?php

namespace App\Http\Controllers;

use App\Models\Bk;
use Illuminate\Http\Request;

class BkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $bk = Bk::all();
     return view('home.bk.index', compact(['bk']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('home.bk.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     Bk::create([
        'foto' => $request->foto,
        'nama' => $request->nama,
        'username' => $request->username,
        'password' => bcrypt($request->password),
        $request-except(['_token']),
     ]);
     return redirect('/bk');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
     $bk = Bk::find($id);
     return view('home.bk.edit',compact(['bk']));
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
    public function update($id, Request $request)
    {
     $bk = Bk::find($id);
     $bk->update([
        'foto' => $request->foto,
        'nama' => $request->nama,
        'username' => $request->username,
        'password' => bcrypt($request->password),
        $request-except(['_token']),  
     ]);
     return redirect('/bk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
     $bk = Bk::find($id);
     $bk->delete();
     return redirect('/bk');
    }
}
