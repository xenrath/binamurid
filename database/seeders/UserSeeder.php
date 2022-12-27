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
                'nama' => 'admin',
                'email' => 'admin@gmail.com',
                'telp' => '',
                'password' => bcrypt('admin'),
                'gender' => 'L',
                'role' => 'admin'
            ],
            [
                'nama' => 'pendidik1',
                'email' => 'pendidik1@gmail.com',
                'telp' => '81234567890',
                'password' => bcrypt('pendidik1'),
                'gender' => 'L',
                'role' => 'pendidik'
            ],
            [
                'nama' => 'pendidik2',
                'email' => 'pendidik2@gmail.com',
                'telp' => '82345678901',
                'password' => bcrypt('pendidik2'),
                'gender' => 'P',
                'role' => 'pendidik'
            ],
            [
                'nama' => 'orangtua1',
                'email' => 'orangtua1@gmail.com',
                'telp' => '83456789012',
                'password' => bcrypt('orangtua1'),
                'gender' => 'L',
                'role' => 'orangtua'
            ],
            [
                'nama' => 'orangtua2',
                'email' => 'orangtua2@gmail.com',
                'telp' => '84567890123',
                'password' => bcrypt('orangtua2'),
                'gender' => 'P',
                'role' => 'orangtua'
            ],
        ];

        User::insert($users);
    }
}
