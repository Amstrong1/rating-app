<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('structures')->insert([
            'name' => "Vibecro Corp",
            'address' => 'bohicon',
            'contact' => '52 85 85 90',
            'email' => 'contact@vibecro-corp.com',
            'slug' => 'www.vibecro-corp.net',
            'logo' => 'logos/vibecro.png',
        ]);
    }
}
