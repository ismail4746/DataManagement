<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         // Fetch all customers from the database
         $customers = Customer::all();

         // Ensure there are customers in the database before seeding products
        //  if ($customers->isEmpty()) {
        //      $this->command->warn('No customers found. Please seed customers first.');
        //      return;
        //  }

        return [
            'product_name' => $this->faker->word,
            'product_description' => $this->faker->sentence,
            'product_price' => $this->faker->randomFloat(2, 10, 1000),
            'customer_id' => $customers->random()->customer_id,
        ];
    }
}
