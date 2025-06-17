<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //admin 
            [
                'name' => 'Admin',
                'username' => 'admin',
                'phone' => '1234567890',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'status' => 'active',
                'user_type' => 'real',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //user 
            [
                'name' => 'User',
                'username' => 'user',
                'phone' => '1234567891',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'status' => 'active',
                'user_type' => 'real',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //agent
            [
                'name' => 'Agent',
                'username' => 'agent',
                'phone' => '1234567892',
                'email' => 'agent@gmail.com',
                'role' => 'agent',
                'status' => 'active',
                'user_type' => 'real',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //DEVELOPER
            [
                'name' => 'Developer',
                'username' => 'developer',
                'phone' => '1234567893',
                'email' => 'developer@gmail.com',
                'role' => 'developer',
                'status' => 'active',
                'user_type' => 'real',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //client
            [
                'name' => 'Client',
                'username' => 'client',
                'phone' => '1234567894',
                'email' => 'client@gmail.com',
                'role' => 'client',
                'status' => 'active',
                'user_type' => 'real',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //stuff
            [
                'name' => 'Stuff',
                'username' => 'stuff',
                'phone' => '1234567895',
                'email' => 'stuff@gmail.com',
                'role' => 'stuff',
                'status' => 'active',
                'user_type' => 'real',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
