<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'type'=>'admin'
        ]);
        User::create([
            'name' => 'Head',
            'email' => 'head@gmail.com',
            'password' => bcrypt('12345678'),
            'type'=>'head'
        ]);
        User::create([
            'name' => 'Supervisor',
            'email' => 'supervisor@gmail.com',
            'password' => bcrypt('12345678'),
            'type'=>'supervisor'
        ]);
    }
}
