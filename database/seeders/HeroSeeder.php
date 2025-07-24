<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hero = [
            [
                'image_url' => 'https://stpbogor.ac.id/wp-content/uploads/2024/09/1y-mkt-1024x1024.jpg.webp',
                'heading' => 'POLITEKNIK BOGOR',
                'body' => 'Jl. KH. R. Abdullah Bin Nuh Jl. Yasmin Raya No.16A, RT.01/RW.04,
                            Curugmekar,
                            Kec. Bogor Bar., Kota Bogor, Jawa Barat 16113 <br><br>
                            Phone: 0811-1162-647',
                'button_label' => 'Daftar Sekarang',
                'button_url' => 'https://pmb.stpbogor.siakad.tech/p/registrasi.php',
                'animo' => 1917900,
                'selected' => 452867
            ]
        ];

        DB::table('hero')->insert($hero);
    }
}
