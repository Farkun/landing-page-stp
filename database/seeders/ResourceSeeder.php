<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resources = [
            ['name' => 'Student Portal', 'url' => '#'],
            ['name' => 'Faculty Login', 'url' => '#'],
            ['name' => 'Library', 'url' => '#'],
        ];

        DB::table('resource')->insert($resources);
    }
}
