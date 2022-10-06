<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class user_admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'firstname' => 'User',
            'lastname' => 'Admin',
            'username' => 'SuperAdmin',
            'email' => 'admin@admin.com',
            'type' => '1',
            'password' => Hash::make('abc123'),
        ]);
        User::insert([
            'firstname' => 'Normal',
            'lastname' => 'user',
            'username' => 'Demo',
            'email' => 'demo@demo.com',
            'type' => '2',
            'password' => Hash::make('abc123'),
        ]);
    }
}
