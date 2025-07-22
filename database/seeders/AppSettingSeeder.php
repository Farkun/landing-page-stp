<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'app_name' => 'POLITEKNIK BOGOR',
                'app_logo' => '/storag/logo-bhs%20(2).png',
                'address' => 'Jl. KH. R. Abdullah Bin Nuh Jl. Yasmin Raya No.16A, RT.01/RW.04, Curugmekar, Kec. Bogor Bar., Kota Bogor, Jawa Barat 16113',
                'phone' => '(0251) 123-4567', //
                'email' => 'info@poltekbogor.ac.id', //
                'primary_color' => '#962F33',
                'primary_content_color' => '#FAE2A2',
                'secondary_color' => '#B64F53',
                'secondary_content_color' => '#FDF1D1',
                'accent_color' => '#D3A02A'
            ]
        ];

        DB::table('app_setting')->insert($settings);
    }
}
