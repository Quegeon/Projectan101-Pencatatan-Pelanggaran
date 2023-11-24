<?php

namespace App\Http\Controllers;

use App\Models\Bk;
use Illuminate\Http\Request;

class BkController extends Controller
{
    public function index()
    {
     $bk = Bk::all();
     return view('home.bk.index', compact(['bk']));
    }
    public function create()
    {
     return view('home.bk.tambah');
    }
    public function store(Request $request)
    {
     Bk::create([
        'id_bk' => $request->id_bk,
        'foto' => $request->foto,
        'nama' => $request->nama,
        'username' => $request->username,
        'password' => bcrypt($request->password),
        $request-except(['_token']),
     ]);
     return redirect('/bk');
    }
    public function show($id)
    {
     $bk = Bk::find($id);
     return view('home.bk.edit',compact(['bk']));
    }
    public function update($id, Request $request)
    {
     $bk = Bk::find($id);
     $bk->update([
        'id_bk' => $request->id_bk,
        'foto' => $request->foto,
        'nama' => $request->nama,
        'username' => $request->username,
        'password' => bcrypt($request->password),
        $request-except(['_token']),  
     ]);
     return redirect('/bk');
    }
    public function destroy($id)
    {
     $bk = Bk::find($id);
     $bk->delete();
     return redirect('/bk');
    }
}
