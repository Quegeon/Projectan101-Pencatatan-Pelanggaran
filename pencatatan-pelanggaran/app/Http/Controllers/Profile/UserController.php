<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($request->username === Auth::user()->username) {
            $validated = $request->validate([
                'nama' => 'required|string|max:100', 
                'username' => 'required|string|max:20',
                'foto' => 'image|mimes:png,jpg,svg,gif',
            ]);

        } else {
            $validated = $request->validate([
                'nama' => 'required|string|max:100', 
                'username' => 'required|string|max:20|unique:users,username',
                'foto' => 'image|mimes:png,jpg,svg,gif',
            ]);
        }


        if ($request->hasFile('foto')) {
            try {
                $img_name = Str::orderedUuid() . '.' . $request->foto->extension();
                $request->file('foto')->move('fotopetugas', $img_name);    
    
                if (Auth::user()->foto !== 'default.png') {
                    File::delete(public_path('fotopetugas/' . Auth::user()->foto));
                }

                $validated['foto'] = $img_name;

                $user->update($validated);

                return back()
                    ->with('success','Profil Berhasil Diubah');
    
            } catch (\Throwable $th) {
                return back()
                    ->with('error','Error Update Profile');
            }
        }

        try {
            $user->update($validated);

            return back()
                ->with('success','Profil Berhasil Diubah');

        } catch (\Throwable $th) {
            return back()
                ->with('error','Error Update Profile');
        }
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'password_baru' => 'required|max:20',
            'konfirmasi_password' => 'required|max:20'
        ]);

        if ($request->password_baru === $request->konfirmasi_password) {
            try {
                $user = User::find(Auth::user()->id);

                $user->update(['password' => bcrypt($request->password_baru)]);

                return back()
                    ->with('success', 'Password Berhasil Dirubah');

            } catch (\Throwable $th) {
                return back()
                    ->with('error', 'Error Update Password');
            }

        }
        
        return back()
            ->with('error','Konfirmasi Password Tidak Sesuai');
    }
}
