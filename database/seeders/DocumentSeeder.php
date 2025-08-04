<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $document = [
            [
                'title' => 'Pendaftaran Online',
                'description' => 'Calon Mahasiswa Baru melakukan pendaftaran pada website STP Bogor.',
                'image' => null,
                'url' => 'https://pmb.stpbogor.siakad.tech/p/registrasi.php'
            ],
            [
                'title' => 'Prosedur PMB Online',
                'description' => 'Calon mahasiswa baru melakukan aktivasi ID dan Password melalui notifikasi yang dikirim ke alamat email yang di daftarkan.',
                'image' => null,
                'url' => 'https://pmb.stpbogor.siakad.tech/admisi/bantuan/documentation.php#aktivasi'
            ],
            [
                'title' => 'Login PMB',
                'description' => 'Calon mahasiswa baru login pada halaman login PMB.',
                'image' => null,
                'url' => 'https://pmb.stpbogor.siakad.tech/p/login.php'
            ]
        ];

        DB::table('document')->insert($document);
    }
}
