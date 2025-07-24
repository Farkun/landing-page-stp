<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarouselImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            ['url' => 'https://store.bandccamera.com/cdn/shop/articles/landscape-photography-settings-164919.jpg?v=1659674922'],
            ['url' => 'https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/247/2024/09/24/IMG-20240924-WA0033-4132147207.jpg']
        ];

        DB::table('carousel_image')->insert($images);
    }
}
