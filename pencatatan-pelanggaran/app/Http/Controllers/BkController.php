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
     return view('home.admin.bk.index', compact(['bk']));
    }
    
    public function create()
    {
     return view('home.admin.bk.tambah');
    }
    
    public function store(Request $request)
    {
      $validated = $request->validate([
         'id'=>'required',
         'nama' => 'required', 
         'username' => 'required',
         'password' => 'required',
         'foto' => 'required|image|mimes:png,jpg,svg,pdf,gif',
     ]);


     if($request->hasFile('foto')){
      $imgName = Str::orderedUuid().'.'.$request->foto->extension(); // jadina nama si file teh ngacak
            $request->file('foto')->move('fotopetugas/',$imgName);
            $validated['foto'] = $imgName;
        } else {
            $validated['foto'] = 'kosong';
        }

        Bk::create($validated);

        return redirect('/bk');
    }
    
    public function edit($id)
    {
     $bk = Bk::find($id);
     return view('home.admin.bk.edit',compact(['bk']));
    }
    
    public function update($id, Request $request)
    {
     $bk = Bk::find($id);
     $validated = $request->validate([
      'id'=>'required',
      'nama' => 'required', 
      'username' => 'required',
      'password' => 'required',
      'foto' => 'required|image',
  ]);


  if($request->hasFile('foto')){
   $imgName = Str::orderedUuid().'.'.$request->foto->extension(); // jadina nama si file teh ngacak
         $request->file('foto')->move('fotopetugas/',$imgName);
         $validated['foto'] = $imgName;
     } else {
         $validated['foto'] = 'kosong';
     }

     $bk->update($validated);

     return redirect('/bk');
    }
    public function destroy($id)
    {
     $bk = Bk::find($id);
     $bk->delete();
     return redirect('/bk');
    }
}
