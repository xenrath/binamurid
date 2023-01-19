<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'nama' => 'Admin',
                'email' => 'admin@gmail.com',
                'telp' => '',
                'password' => bcrypt('admin'),
                'gender' => 'L',
                'alamat' => '',
                'role' => 'admin'
            ],
            [
                'nama' => 'Pendidik1',
                'email' => 'pendidik1@gmail.com',
                'telp' => '81234567890',
                'password' => bcrypt('pendidik1'),
                'gender' => 'L',
                'alamat' => 'Tegal',
                'role' => 'pendidik'
            ],
            [
                'nama' => 'Pendidik2',
                'email' => 'pendidik2@gmail.com',
                'telp' => '82345678901',
                'password' => bcrypt('pendidik2'),
                'gender' => 'P',
                'alamat' => 'Slawi',
                'role' => 'pendidik'
            ],
            [
                'nama' => 'Orangtua1',
                'email' => 'orangtua1@gmail.com',
                'telp' => '83456789012',
                'password' => bcrypt('orangtua1'),
                'gender' => 'L',
                'alamat' => 'Tegal',
                'role' => 'orangtua'
            ],
            [
                'nama' => 'Orangtua2',
                'email' => 'orangtua2@gmail.com',
                'telp' => '84567890123',
                'password' => bcrypt('orangtua2'),
                'gender' => 'P',
                'alamat' => 'Slawi',
                'role' => 'orangtua'
            ],
        ];

        User::insert($users);
    }
}
