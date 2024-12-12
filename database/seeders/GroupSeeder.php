<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;  // Import Faker
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();

        // // Create 10 groups
        // for ($i = 0; $i < 10; $i++) {
        //     Group::create([
        //         'name' => $faker->word,
        //         'description' => $faker->sentence,
        //     ]);
        // }
        Group::factory()->count(10)->create();
    }
}
