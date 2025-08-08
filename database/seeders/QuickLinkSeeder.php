<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuickLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $links = [
            ['name' => 'Portal Siakad (Mahasiswa)', 'url' => '#'],
            ['name' => 'Portal Siakad (Orangtua)', 'url' => '#'],
            ['name' => 'Tutorial Siakad Student', 'url' => '#'],
            ['name' => 'Contact Us', 'url' => '#'],
        ];

        DB::table('quick_link')->insert($links);
    }
}
