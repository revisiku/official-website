<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name'              => 'Administrator',
            'email'             => 'admin@mail.com',
            'username'          => 'admin23',
            'password'          => 'adm_23010111',
            'email_verified_at' => now(),
            'remember_token'    => null,
        ]);
    }
}
