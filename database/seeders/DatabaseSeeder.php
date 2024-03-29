<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\StructureSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StructureSeeder::class,
        ]);
        
        \App\Models\User::factory()->create([
            'structure_id' => 1,
            'name' => 'Super Admin',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
            'created_at' => now(),
        ]);
    }
}
