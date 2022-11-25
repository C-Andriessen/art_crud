<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.nl',
            'password' => Hash::make('welkom123'),
            'role_id' => Role::ADMIN,
        ]);
        User::create([
            'name' => 'Lotte',
            'email' => 'lotte@mail.nl',
            'password' => Hash::make('welkom123'),
            'role_id' => Role::ADMIN,
        ]);
        User::create([
            'name' => 'Collin',
            'email' => 'collin@mail.nl',
            'password' => Hash::make('welkom123'),
            'role_id' => Role::ADMIN,
        ]);
    }
}
