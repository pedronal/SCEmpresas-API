<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SegmentosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('segmentos')->insert([
            ['nome' => 'Tecnologia'],
            ['nome' => 'Comércio'],
            ['nome' => 'Indústria'],
            ['nome' => 'Serviços'],
            ['nome' => 'Agronegócio'],
        ]);
    }
}
