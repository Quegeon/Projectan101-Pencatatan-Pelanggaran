<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Bk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class BkController extends Controller
{
    public function update_profile(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required', 
            'username' => 'required',
            'foto' => 'image|mimes:png,jpg,svg,pdf,gif',
        ]);

        $bk = Bk::find(Auth::user()->id);

        if ($request->hasFile('foto')) {
            try {
                $img_name = Str::orderedUuid() . '.' . $request->foto->extension();
                $request->file('foto')->move('fotobk', $img_name);    
    
                Storage::delete(Auth::user()->foto);

                $validated['foto'] = $img_name;
                $bk->update($validated);

                return redirect()
                    ->route('profile.bk')
                    ->with('sucess','Profil Berhasil Diubah');
    
            } catch (\Throwable $th) {
                return redirect()
                    ->route('profile.bk')
                    ->with('error','Error Update Profile');
            }

        } else {
            try {
                $bk->update($validated);

                return redirect()
                    ->route('profile.bk')
                    ->with('sucess','Profil Berhasil Diubah');

            } catch (\Throwable $th) {
                return redirect()
                    ->route('profile.bk')
                    ->with('error','Error Update Profile');
            }
        }

        // if ($request->hasFile('foto')) {
        //     $imageName = Str::orderedUuid() . '.' . $request->foto->extension();
        //     $request->file('foto')->move('fotobk/temp/', $imageName);

        //     $request_image = public_path('fotobk/temp/' . $imageName);
        //     $local_image = public_path('fotobk/' . Auth::user()->foto);

        //     $request_compare = Image::make($request_image);
        //     $local_compare = Image::make($local_image);

        //     if ($request_compare->hashName() === $local_compare->hashName()) {
        //         return redirect()
        //             ->route('profile.bk')
        //             ->with('error','Error Tidak Bisa Input Image yang Sama');

        //     } else {
        //         try {
        //             File::move($request_image, 'fotobk');

        //             $validated['foto'] = $imageName;
        //             $bk = Bk::find(Auth::user()->id);
        //             $bk->update($validated);
                    
        //             return redirect()
        //                 ->route('profile.bk')
        //                 ->with('success','Profil Berhasil Diubah');

        //         } catch (\Throwable $th) {
        //             return redirect()
        //                 ->route('profile.bk')
        //                 ->with('error','Error Update Profile');
        //         }

        //     }

        // } else {
        //     try {
        //         $bk = Bk::find(Auth::user()->id);

        //         $bk->update($validated);

        //         return redirect()
        //             ->route('profile.bk')
        //             ->with('success','Profil Berhasil Diubah');

        //     } catch (\Throwable $th) {
        //         return redirect()
        //             ->route('profile.bk')
        //             ->with('error','Error Update Profile');
        //     }
        // }
    }
}
