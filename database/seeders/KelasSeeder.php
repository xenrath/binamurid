<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelases = [
            [
                'nama' => 'Kelas A',
                'pendidik_id' => '2'
            ],
            [
                'nama' => 'Kelas B',
                'pendidik_id' => '3'
            ],
        ];

        Kelas::insert($kelases);
    }
}
