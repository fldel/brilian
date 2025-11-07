<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // $this->call(CategorySeeder::class);

        // Example user seeded with a hashed password
        User::factory()->create([
            'name' => 'Fidelina Affectine',
            'email' => 'fldelhyri@gmail.com',
            'password' => Hash::make('fideladmin123'),
            'role' => 'admin',
        ]);

    }
}
