<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socials = [
            ['name' => 'facebook', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Facebook_Logo_%282019%29.png/500px-Facebook_Logo_%282019%29.png', 'url' => 'https://bh-foundation.org'],
            ['name' => 'x', 'image' => 'https://images.freeimages.com/image/large-previews/f35/x-twitter-logo-on-black-circle-5694247.png', 'url' => 'https://bh-foundation.org'],
            ['name' => 'instagram', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/1000px-Instagram_logo_2022.svg.png', 'url' => 'https://bh-foundation.org'],
        ];

        DB::table('social')->insert($socials);
    }
}
