<?php

namespace Database\Seeders;

use App\Models\Anak;
use Illuminate\Database\Seeder;

class AnakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anaks = [
            [
                'nama' => 'Anak1',
                'panggilan' => 'A1',
                'gender' => 'L',
                'lahir' => '2018-01-01',
                'orangtua_id' => '4',
                'kelas_id' => '1'
            ],
            [
                'nama' => 'Anak2',
                'panggilan' => 'A2',
                'gender' => 'P',
                'lahir' => '2018-01-02',
                'orangtua_id' => '4',
                'kelas_id' => '1'
            ],
            [
                'nama' => 'Anak3',
                'panggilan' => 'A3',
                'gender' => 'L',
                'lahir' => '2018-01-03',
                'orangtua_id' => '5',
                'kelas_id' => '2'
            ],
            [
                'nama' => 'Anak4',
                'panggilan' => 'A4',
                'gender' => 'P',
                'lahir' => '2018-01-04',
                'orangtua_id' => '5',
                'kelas_id' => '2'
            ],
        ];

        Anak::insert($anaks);
    }
}
