<?php

namespace Database\Seeders;


use App\Models\Car;
use App\Models\User;
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
         User::factory(10)->create();

         User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);

         Car::factory(20)->create();
    }
}
