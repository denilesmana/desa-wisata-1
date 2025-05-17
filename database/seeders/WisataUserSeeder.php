<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WisataUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userdata = [
            [
                'name' => 'adminstaydesa',
                'email' => 'adminstaydesa@gmail.com',
                'level' => 'admin',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'bendahara',
                'email' => 'bendahara@gmail.com',
                'level' => 'bendahara',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'pelanggan',
                'email' => 'pelanggan@gmail.com',
                'level' => 'pelanggan',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'pemilik',
                'email' => 'pemilik@gmail.com',
                'level' => 'pemilik',
                'password' => bcrypt('12345678')
            ],
        ];

        foreach($userdata as $key => $val){
            User::create($val);
        }
    }
}
