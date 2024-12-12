<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();

        // // Generate 10 random orders
        // for ($i = 0; $i < 10; $i++) {
        //     // Generate and save an order
        //     Order::create([
        //         'customer_id' => $faker->numberBetween(1, 10), // Random customer ID
        //         'product_name' => $faker->word, // Random product name
        //         'quantity' => $faker->numberBetween(1, 10), // Random quantity
        //         'price' => $faker->randomFloat(2, 1, 100), // Random price between 1 and 100
        //         'total_amount' => $faker->randomFloat(2, 10, 1000), // Random total amount (just for example)
        //     ]);
        // }
        Order::factory()->count(10)->create();
    }
}
