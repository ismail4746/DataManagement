<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;
use Faker\Factory as Faker;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        // $faker = Faker::create();

        // for ($i = 0; $i < 25; $i++) {
        //     Member::create([
        //         'name' => $faker->name,
        //         'email' => $faker->unique()->safeEmail,
        //         'contact_no' => $faker->numerify('###########'),
        //     ]);
        // }

        Member::factory()->count(10)->create();
    }
}
