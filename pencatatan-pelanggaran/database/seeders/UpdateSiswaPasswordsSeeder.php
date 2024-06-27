<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UpdateSiswaPasswordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil semua data siswa
        $siswas = Siswa::all();

        foreach ($siswas as $siswa) {
            // Mengupdate password menggunakan bcrypt
            $siswa->update([
                'password' => Hash::make('123'),
                'view_password' => '123'
            ]);
        }
    }
}
