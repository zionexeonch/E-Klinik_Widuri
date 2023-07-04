<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\Obat;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'password'  => Hash::make("admin1234"),
            'role'      => 1
        ]);
        User::create([
            'name'      => 'Ardianto',
            'email'     => 'ardianto@gmail.com',
            'password'  => Hash::make("dokter1234"),
            'role'      => 3
        ]);
        User::create([
            'name'      => 'Tresnanda',
            'email'     => 'nanda@gmail.com',
            'password'  => Hash::make("nanda1234"),
            'role'      => 2
        ]);
        Dokter::create([
            'nama_dokter'      => 'Ardianto',
            'spesialisasi_dokter'     => 'Poli Umum',
            'alamat_dokter'  => 'Selabaya',
        ]);
        Obat::create([
            'nama_obat'      => 'Nolak Angin',
            'jumlah_obat'     => '4',
            'harga_obat'  => '10000',
        ]);
    }
}
