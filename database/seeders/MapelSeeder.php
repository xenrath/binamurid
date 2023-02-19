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
                'keterangan' => 'Belajar mengenal 26 huruf dimulai dari huruf besar (kapital) hingga huruf kecil. Serta belajar mengenali tulisan namanya sendiri dan nama sederhana lain seperti "Mama dan Papa". Lalu belajar untuk menghubungkan antara huruf dan bunyi',
                'pembelajaran' => 'Untuk mengajarkannya di rumah, orangtua dapat bermain bersama anak usia dini menggunakan huruf dari magnet kulkas dengan cara menebak huruf apakah itu dan menyusunnya menjadi suatu kata sederhana. Selain itu, Mama juga dapat bermain dengan menunjukkan huruf pertama di kotak susu atau biskuit dan bertanya padanya huruf depan apa yang tertulis di situ. Terakhir, orangtua dapat menstimulasi anak usia dini dengan mengajaknya berbicara, membacakan dongeng serta bernyanyi lagu anak-anak.',
                'tanggal_awal' => '16 Jan 2023',
                'tanggal_akhir' => '20 Jan 2023'
            ],
            [
                'nama' => 'Warna, bentuk, objek',
                'keterangan' => 'Belajar mengenal nama warna (merah, biru, kuning, dan lain-lain), bentuk (bulat, segitiga, persegi dan lain-lain), serta objek (seperti bagian tubuh yakni tangan, kaki, mata dan lain-lain)',
                'pembelajaran' => 'Untuk mengajarkannya di rumah, orangtua dapat mengajukan pertanyaan seputar benda yang ada di sekitar anak, seperti “Apa ini? Apa warnanya? Apa bentuknya?”. Selain itu orangtua juga dapat bermain “Di manakah aku?” bersama anak dengan menanyakan dan menunjuk “Di mana hidungmu? Di mana tanganmu?” untuk mengajarkannya mengenal anggota tubuh secara tidak langsung.',
                'tanggal_awal' => '23 Jan 2023',
                'tanggal_akhir' => '27 Jan 2023'
            ],
            [
                'nama' => 'Angka dan berhitung',
                'keterangan' => 'Belajar mengenal angka dari 1 hingga 10 dan menghitung objek.',
                'pembelajaran' => 'Untuk mengajarkannya di rumah, orangtua dapat bertanya pada anak mengenai angka yang tertulis pada kalender, buku dan sebagainya. Mengajak anak untuk menghitung benda-benda yang ada disekitarnya juga bisa menjadi pilihan, seperti menghitung mobil-mobilan atau boneka kesayangan anak.',
                'tanggal_awal' => '23 Jan 2023',
                'tanggal_akhir' => '27 Jan 2023'
            ],
            [
                'nama' => 'Menggunting dan menggambar',
                'keterangan' => 'Belajar mengembangkan kemampuan untuk mengkoordinasi tangan dan mata, termasuk kemampuan motorik halus seperti menggunting, mengelem, menggambar, mewarnai dan menggunakan kuas cat.',
                'pembelajaran' => 'Untuk mengajarkannya di rumah, orangtua dapat menyediakan krayon dengan ukuran besar dan spidol untuk anak usia dini agar bisa mewarnai atau menggambar sesukanya. Plastisin juga sangat baik untuk melatih otot tangan anak ketika meremas dan membuat bentuk sederhana seperti bola.',
                'tanggal_awal' => '23 Jan 2023',
                'tanggal_akhir' => '27 Jan 2023'
            ],
            [
                'nama' => 'Bersosialisasi',
                'keterangan' => 'Belajar untuk bekerja sama, mengantri atau menunggu giliran bersama teman-temannya serta berbagi. Anak juga belajar bagaimana berkomunikasi dan mengikuti perintah sederhana.',
                'pembelajaran' => 'Untuk mengaplikasikan hal tersebut di rumah, orangtua dapat mengajak anak untuk bermain bersama teman atau saudara sebaya yang tinggal di dekat rumah, juga dalam kelompok bermain. Orangtua dapat menerapkan peraturan sederhana di rumah dan harus konsisten menjalankannya, seperti merapikan mainan setelah bermain, bersikap sopan, dan lain sebagainya.',
                'tanggal_awal' => '23 Jan 2023',
                'tanggal_akhir' => '27 Jan 2023'
            ],
        ];

        Mapel::insert($mapels);
    }
}
