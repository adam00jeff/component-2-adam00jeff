<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['artist' => 'The Jam', 'title' => 'Modern World','price' => 399],
            ['artist' => 'Amy Winehouse', 'title' => 'Back to Black','price' => 299],
        ];

        foreach($products as $product) {
            Product::create([
                'artist' => $product['artist'],
                'title' => $product['title'],
                'price' => $product['price'],
            ]);
        }
    }
}


