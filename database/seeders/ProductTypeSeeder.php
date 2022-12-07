<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductType;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producttypes = [
            'Book',
            'CD',
            'Game',
        ];

        foreach($producttypes as $producttype) {
            ProductType::create([
                'type' => $producttype,
            ]);
        }
    }
}

