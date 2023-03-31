<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'login' => 'Banshee',
             'password' => Hash::make('banshee275933'),
             'name' => 'Пользователь',
             'email' => 'denissankov171@yandex.ru',
             'role' => '2',
         ]);
    }
}
