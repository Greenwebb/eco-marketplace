<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Maize Seed',
                'description' => 'Description for Product 1',
                'price' => 19.99,
            ],
            [
                'name' => 'Product 2',
                'description' => 'Description for Product 2',
                'price' => 29.99,
            ],
            [
                'name' => 'Product 3',
                'description' => 'Description for Product 3',
                'price' => 39.99,
            ],
            [
                'name' => 'Product 4',
                'description' => 'Description for Product 4',
                'price' => 49.99,
            ],
            [
                'name' => 'Product 5',
                'description' => 'Description for Product 5',
                'price' => 59.99,
            ],
            [
                'name' => 'Product 6',
                'description' => 'Description for Product 6',
                'price' => 69.99,
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
