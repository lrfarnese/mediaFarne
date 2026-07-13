<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserFriendSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            // Cada usuário segue 3 outros aleatórios
            $outros = $users->where('id', '!=', $user->id)
                            ->random(3);

            $user->following()->syncWithoutDetaching(
                $outros->pluck('id')->toArray()
            );
        }
    }
}