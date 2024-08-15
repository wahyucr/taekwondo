<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Geup;
use App\Models\Kegiatan;
use App\Models\Pelatih;
use App\Models\Penguji;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'role'  => 'admin'
        ]);
        Role::create([
            'role'  => 'pelatih'
        ]);
        Role::create([
            'role'  => 'penguji'
        ]);
        Geup::create([
            'geup'  => 'Geup 1',
            'sabuk' => 'Sabuk Merah Ujung Hitam'
        ]);
        Geup::create([
            'geup'  => 'Geup 2',
            'sabuk' => 'Sabuk Merah'
        ]);
        Geup::create([
            'geup'  => 'Geup 3',
            'sabuk' => 'Sabuk Biru Ujung Merah'
        ]);
        Geup::create([
            'geup'  => 'Geup 4',
            'sabuk' => 'Sabuk Merah'
        ]);
        Geup::create([
            'geup'  => 'Geup 5',
            'sabuk' => 'Sabuk Hijau Ujung Biru'
        ]);
        Geup::create([
            'geup'  => 'Geup 6',
            'sabuk' => 'Sabuk Hijau'
        ]);
        Geup::create([
            'geup'  => 'Geup 7',
            'sabuk' => 'Sabuk Kuning Ujung Hijau'
        ]);
        Geup::create([
            'geup'  => 'Geup 8',
            'sabuk' => 'Sabuk Kuning'
        ]);
        Geup::create([
            'geup'  => 'Geup 9',
            'sabuk' => 'Sabuk Putih Ujung Kuning'
        ]);
        Geup::create([
            'geup'  => 'Geup 10',
            'sabuk' => 'Sabuk Putih',
        ]);

        User::create([
            'username'  => 'atia123',
            'password'  => bcrypt('1234'),
            'role_id'   => 1
        ]);
        Admin::create([
            'user_id'   => 1,
            'nama'      => 'admin'
        ]);

        User::create([
            'username'  => 'robert',
            'password'  => bcrypt('1234'),
            'role_id'   => 2
        ]);
        Pelatih::create([
            'user_id'       => 2,
            'nama'          => 'Robert Davis Chaniago',
            'da'            => 'Dan 1',
            'alamat'        => 'Pinang Jaya',
            'tmpt_dojang'   => 'Pinang jaya/Langkapur',
            'jmlh_muri'     => 60
        ]);

        User::create([
            'username'  => 'susanto',
            'password'  => bcrypt('1234'),
            'role_id'   => 3
        ]);
        Penguji::create([
            'user_id'       => 3,
            'nama'          => 'Susanto',
            'dan'           => 'Dan 1',
            'geup_id'       => 1,
            'no_peserta'    => '001-100'
        ]);

        Kegiatan::create([
            'kegiatan'      => 'Liga ATF',
            'tgl_mulai'     => '2024-8-1',
            'tgl_selesai'   => '2024-8-5',
        ]);
    }
}
