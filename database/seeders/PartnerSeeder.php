<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = [
            ['name' => 'partner', 'logo' => 'https://thumbs.dreamstime.com/b/hand-shake-logo-vector-flat-design-shaking-hands-symbol-handshake-logotype-concept-deal-partnership-icon-partner-agreement-123892727.jpg', 'url' => 'https://bh-foundation.org'],
            ['name' => 'partner', 'logo' => 'https://www.shutterstock.com/image-vector/handshake-partnership-logo-design-hand-600nw-2520743481.jpg', 'url' => 'https://bh-foundation.org'],
            ['name' => 'partner', 'logo' => 'https://t3.ftcdn.net/jpg/05/47/85/82/360_F_547858247_3pRJxIxgvDlf2HQiBlzqLfO98ncghF6J.jpg', 'url' => 'https://bh-foundation.org'],
            ['name' => 'partner', 'logo' => 'https://media.istockphoto.com/id/1369899988/vector/handshake-sign-in-the-circle-on-white-background-vector-illustration.jpg?s=612x612&w=0&k=20&c=auA4GuM2p-EmKmEgcFjIOUibPiXsuvTxfvRKB-EN7o8=', 'url' => 'https://bh-foundation.org'],
            ['name' => 'partner', 'logo' => 'https://t4.ftcdn.net/jpg/04/24/01/43/360_F_424014391_pIsVnz0NMtPcsVL5appIbqMrWu8bU6vA.jpg', 'url' => 'https://bh-foundation.org'],
            ['name' => 'partner', 'logo' => 'https://www.creativefabrica.com/wp-content/uploads/2021/05/29/Partner-Logo-Symbols-Graphics-12646980-1.png', 'url' => 'https://bh-foundation.org'],
        ];

        DB::table('partner')->insert($partners);
    }
}
