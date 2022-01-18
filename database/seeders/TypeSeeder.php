<?php

namespace Database\Seeders;

use App\Models\Type;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::create();
        for ($i = 1; $i <= 10; $i++) {
            Type::create([
                'type_name' => $faker->jobTitle
            ]);
        }
    }
}
