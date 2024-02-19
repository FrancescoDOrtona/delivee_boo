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
        // User::create([
        //     'name' => 'test',
        //     'email' => 'test@gmail.com',
        //     'password' => 'test',
        // ]);

        $users = [
            [
                'name'=> 'ilristorante',
                'email'=> 'ilristorante@gmail.com',
                'password'=> 'ilristorante',
            ],
            [
                'name'=> 'burgerking',
                'email'=> 'burgerking@gmail.com',
                'password'=> 'burgerking',
            ],
            [
                'name'=> 'anticovinaio',
                'email'=> 'anticovinaio@gmail.com',
                'password'=> 'anticovianio',
            ],
            [
                'name'=> 'sushizanmai',
                'email'=> 'sushizanmai@gmail.com',
                'password'=> 'sushizanmai',
            ],
            [
                'name'=> 'alibaba',
                'email'=> 'alibaba@gmail.com',
                'password'=> 'alibaba',
            ],
            [
                'name'=> 'napoli',
                'email'=> 'napoli@gmail.com',
                'password'=> 'napoli',
            ],
            [
                'name'=> 'iginiomassari',
                'email'=> 'iginiomassari@gmail.com',
                'password'=> 'iginio',
            ],
            [
                'name'=> 'currymania',
                'email'=> 'currymania@gmail.com',
                'password'=> 'currymania',
            ],
            [
                'name'=> 'oldwildwest',
                'email'=> 'oldwildwest@gmail.com',
                'password'=> 'oldwildwest',
            ],
            [
                'name'=> 'polonord',
                'email'=> 'polonord@gmail.com',
                'password'=> 'polonord',
            ],
            [
                'name'=> 'ruspantino',
                'email'=> 'ruspantino@gmail.com',
                'password'=> 'ruspantino',
            ],
            [
                
                'name'=> 'mcdonald',
                'email'=> 'mcdonald@gmail.com',
                'password'=> 'mcdonald',
            ],

        ];
        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password']
            ]);
        }
    }
}
