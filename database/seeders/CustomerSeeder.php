<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

use function Laravel\Prompts\password;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();

        // // Seed multiple customer records
        // for ($i = 0; $i < 25; $i++) {
        //     Customer::create([
        //         'name' => $faker->name,
        //         'email' => $faker->unique()->safeEmail,
        //         'password' => Hash::make('1234'),
        //         'phone' => $faker->phoneNumber,
        //         'address' => $faker->address,
        //         'gender' => $faker->randomElement(['Male', 'Female']),
        //     ]);
        // }

        // Customer::where('email', 'sstanton@example.net')->delete();

        Customer::factory()->count(10)->create();
    }
}
