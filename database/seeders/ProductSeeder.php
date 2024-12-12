<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Customer;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Fetch all customers from the database
        $customers = Customer::all();

        // Ensure there are customers in the database before seeding products
        if ($customers->isEmpty()) {
            $this->command->warn('No customers found. Please seed customers first.');
            return;
        }

        // Create 25 product records
        for ($i = 0; $i < 25; $i++) {
            Product::create([
                'product_name' => $faker->word,
                'product_description' => $faker->sentence,
                'product_price' => $faker->randomFloat(2, 10, 1000),
                'customer_id' => $customers->random()->customer_id,
            ]);
        }
    }
}
