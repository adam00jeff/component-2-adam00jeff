<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ProductTypeSeeder::class);
        \App\Models\Product::factory(40)->create();

        //\App\Models\Product::factory(40)->create();

        //$this->call(ProductSeeder::class);
    }
}
