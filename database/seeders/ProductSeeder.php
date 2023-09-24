<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 30) as $index) {
            DB::table('products')->insert([
                'name' => $faker->unique()->name,
                'description' => $faker->text,
                'category_id' => $faker->numberBetween(1, 5),
                'price' => $faker->randomFloat(2, 10, 100),
                'barcode' => $faker->ean13,
                'sku' => $faker->unique()->ean8,
                'type' => $faker->randomElement(['Crop', 'Animal', 'Feed', 'Seed', 'Fertilizer', 'Treatment']),
                'status' => $faker->randomElement([1, 0]),
                'can_show' => $faker->boolean,
                'qty' => $faker->numberBetween(1, 100),
                'image' => 'https://www.hydroscand.se/media/catalog/product/placeholder/default/image-placeholder-base.png',
            ]);
        }
    }
}
