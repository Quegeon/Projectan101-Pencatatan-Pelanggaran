<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required', 
            'username' => 'required',
            'foto' => 'image|mimes:png,jpg,svg,pdf,gif',
        ]);

        $user = User::find(Auth::user()->id);

        if ($request->hasFile('foto')) {
            try {
                $img_name = Str::orderedUuid() . '.' . $request->foto->extension();
                $request->file('foto')->move('fotopetugas', $img_name);    
    
                Storage::delete(Auth::user()->foto);

                $validated['foto'] = $img_name;
                $user->update($validated);

                return redirect()
                    ->route('profile.user')
                    ->with('success','Profil Berhasil Diubah');
    
            } catch (\Throwable $th) {
                return redirect()
                    ->route('profile.user')
                    ->with('error','Error Update Profile');
            }

        } else {
            try {
                $user->update($validated);

                return redirect()
                    ->route('profile.user')
                    ->with('success','Profil Berhasil Diubah');

            } catch (\Throwable $th) {
                return redirect()
                    ->route('profile.user')
                    ->with('error','Error Update Profile');
            }
        }
    }
    public function change_password(Request $request)
    {
        $validated = $request->validate([
            'password_baru' => 'required',
            'konfirmasi_password' => 'required'
        ]);

        $user = User::find( Auth::user()->id);

        if ($request->password_baru === $request->konfirmasi_password) {
            try {
                $user->update(['password' => bcrypt($request->password_baru)]);

                return redirect()
                    ->route('profile.user')
                    ->with('success','Password Berhasil Diperbaharui');

            } catch (\Throwable $th) {
                return redirect()
                    ->route('profile.user')
                    ->with('error','Error Update Password');
            } catch (\Throwable $th) {
                return redirect()
                ->route('profile.user')
                ->with('error','Error Update Password');
            }
        } else {
            return redirect()
                ->route('profile.user')
                ->with('error','Konfirmasi Password Tidak Sesuai');
        }
    }

}
