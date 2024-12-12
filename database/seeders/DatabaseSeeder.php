<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the customer seeder
        $this->call([
            CustomerSeeder::class,
            ProductSeeder::class,

        ]);

      

        // Uncomment if using factories
        // \App\Models\User::factory(10)->create();

        // Example for creating a single user (optional)
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
