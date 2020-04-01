<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'John Lee',
            'username' => 'admin',
            'email' => 'admin@ktu.repo.edu.gh',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'admin' => 1,
            'active' => 1
        ]);
    }
}
