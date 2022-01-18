<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
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

        for ($i = 1; $i < 10; $i++) {
            Product::create([
                'name' => $faker->name,
                'price' => $faker->numberBetween(500, 9999),
                'stock' => $faker->numberBetween(10, 100),
                'type_id' => $faker->numberBetween(1, 10)
            ]);
        }
    }
}
