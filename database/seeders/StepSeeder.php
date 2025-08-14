<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $selection_step = [
            [
                'title' => 'Tahapan Seleksi PMB STP Bogor',
                'description' => null,
                'image' => null,
                'url' => null
            ],
            [
                'title' => null,
                'description' => 'Pendaftaran atau Regristasi',
                'image' => null,
                'url' => null
            ],
            [
                'title' => null,
                'description' => 'isi Formulir',
                'image' => null,
                'url' => null
            ],
            [
                'title' => null,
                'description' => 'Bayar Pendaftaran',
                'image' => null,
                'url' => null
            ],
            [
                'title' => null,
                'description' => 'isi Biodata',
                'image' => null,
                'url' => null
            ],
            [
                'title' => null,
                'description' => 'Ujian Online - Jalur test / Upload Berkas - Jalur tanpa test',
                'image' => null,
                'url' => null
            ],
            [
                'title' => null,
                'description' => 'Pengumuman Hasil Ujian Online',
                'image' => null,
                'url' => null
            ]
        ];

        DB::table('selection_step')->insert($selection_step);
    }
}
