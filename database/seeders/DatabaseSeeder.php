<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CountrySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // データが存在しない場合のみ作成
        if (!\App\Models\User::where('email', 'test@example.com')->exists()) {
        \App\Models\User::factory()->create([
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('password'),
        ]);

        $this->call(CountrySeeder::class);
        }   
    }

}