<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Karyawan;
use App\Models\Pelanggan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create an admin user

       $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'level' => 'admin',
        ]);

        // Create corresponding karyawan record
        Karyawan::create([
            'nama_karyawan' => 'Admin',
            'alamat' => 'Jl. Admin No. 1',
            'no_hp' => '081234567890',
            'jabatan' => 'administrasi',
            'id_users' => $adminUser->id,
        ]);

        // Create a Bendahara user

        $bendaharaUser = User::create([
            'name' => 'Bendahara',
            'email' => 'bendahara@gmail.com',
            'password' => Hash::make('12345678'),
            'level' => 'bendahara',
        ]);

        Karyawan::create([
            'nama_karyawan' => 'Bendahara - super',
            'alamat' => 'Jl. Bendahara No. 2',
            'no_hp' => '081234567891',
            'jabatan' => 'bendahara',
            'id_users' => $bendaharaUser->id,
        ]);

        // Create an Owner user
        $ownerUser = User::create([
            'name' => 'Owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('12345678'),
            'level' => 'pemilik',
        ]);
        
        Karyawan::create([
            'nama_karyawan' => 'Owner - super',
            'alamat' => 'Jl. Owner No. 3',
            'no_hp' => '081234567892',
            'jabatan' => 'pemilik',
            'id_users' => $ownerUser->id,
        ]);

        // Create a Pelanggan user
        $pelangganUser = User::create([
            'name' => 'Pelanggan',
            'email' => 'pelanggan1@gmail.com',
            'password' => Hash::make('12345678'),
            'level' => 'pelanggan',
        ]);

        // Create corresponding pelanggan record
        Pelanggan::create([
            'nama_lengkap' => 'Pelanggan - super',
            'no_hp' => '081234567893',
            'alamat' => 'Jl. Pelanggan No. 4',
            'foto' => '',
            'id_users' => $pelangganUser->id,
        ]);
    }
}
