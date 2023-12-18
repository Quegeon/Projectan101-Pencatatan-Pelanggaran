<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
    
        if($user === null) {
            return redirect()
                ->route('user.index')
                ->with('error', 'Invalid Target Data');
        }
    
        $validated = $request->validate([
            'nama' => 'required', 
            'username' => 'required',
            'level' => 'required',
            'foto' => 'required|image|mimes:png,jpg,svg,pdf,gif',
        ]);
    
        try {
            if($request->hasFile('foto')){
                $imgName = Str::orderedUuid().'.'.$request->foto->extension();
                $request->file('foto')->move('fotopetugas/',$imgName);
                $validated['foto'] = $imgName;
            } else {
                $validated['foto'] = 'kosong';
            }
    
            $user->update($validated);
    
            return redirect()
                ->route('user.index')
                ->with('success', 'Data Successfully Updated!');
            
        } catch (\Throwable $th) {
            return redirect()
                ->route('user.index')
                ->with('error', 'Error Update Data');
        }
    }
    public function change_password(Request $request)
    {
        $validated = $request->validate([
            'password_baru' => 'required',
            'konfirmasi_password' => 'required'
        ]);

        $bk = User::find( Auth::user()->id);

        if ($request->pasword_baru === $request->konfirmasi_password) {
            try {
                
            } catch (\Throwable $th) {
                //throw $th;
            }
        } else {
          
        }
    }

}
