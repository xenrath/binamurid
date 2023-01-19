<?php

namespace Database\Seeders;

use App\Models\Mapel;
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
                'tanggal_awal' => '16 Jan 2023',
                'tanggal_akhir' => '20 Jan 2023'
            ],
            [
                'nama' => 'Warna, bentuk, objek',
                'keterangan' => 'Belajar mengenal bentuk gambar',
                'tanggal_awal' => '23 Jan 2023',
                'tanggal_akhir' => '27 Jan 2023'
            ],
        ];
        
        Mapel::insert($mapels);
    }
}
