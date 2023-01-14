<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapels = [
            [
                'nama' => 'Huruf dan Bunyi',
                'keterangan' => 'Belajar mengenal 26 huruf dimulai dari huruf besar (kapital) hingga huruf kecil. Serta belajar mengenali tulisan namanya sendiri dan nama sederhana lain. Lalu belajar untuk menghubungkan antara huruf dan bunyi',
                'waktu' => ''
            ],
            [
                'nama' => 'Warna, bentuk, objek',
                'keterangan' => '',
                'waktu' => ''
            ],
        ];
    }
}
