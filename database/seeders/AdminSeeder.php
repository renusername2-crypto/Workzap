<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'first_name' => 'Admin',
            'last_name'  => 'Workzap',
            'email'      => 'admin@workzap.com',
            'password'   => Hash::make('Admin@1234'),
            'role'       => 'admin',
        ]);
    }
}
