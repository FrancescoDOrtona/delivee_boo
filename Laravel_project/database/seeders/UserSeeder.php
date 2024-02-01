<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creazione di un Utente Test
        User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => 'test',
        ]);
    }
}
