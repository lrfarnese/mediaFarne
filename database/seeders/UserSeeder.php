<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Usuário admin
        User::create([
            'name'             => 'Lucas Farnese',
            'username'         => 'farnesisnho',
            'email'            => 'admin@mediafarne.com',
            'password'         => Hash::make('password'),
            'data_nascimento'  => '1998-03-15',
            'type'             => 'admin',
            'email_verified_at'=> now(),
        ]);

        // Usuários comuns
        $users = [
            ['name' => 'Ana Silva',    'username' => 'ana.silva',    'email' => 'ana@teste.com'],
            ['name' => 'João Pedro',   'username' => 'joaopedro',    'email' => 'joao@teste.com'],
            ['name' => 'Maria Costa',  'username' => 'mariacosta',   'email' => 'maria@teste.com'],
            ['name' => 'Carlos Lima',  'username' => 'carloslima',   'email' => 'carlos@teste.com'],
            ['name' => 'Beatriz Souza','username' => 'beasouza',     'email' => 'bea@teste.com'],
        ];

        foreach ($users as $user) {
            User::create([
                'name'              => $user['name'],
                'username'          => $user['username'],
                'email'             => $user['email'],
                'password'          => Hash::make('password'),
                'data_nascimento'   => '2000-06-10',
                'type'              => 'comum',
                'email_verified_at' => now(),
            ]);
        }
    }
}
