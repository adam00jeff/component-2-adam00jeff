<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'artist'=>$this->faker->word(),
            'title'=>$this->faker->words(3,true),
            'price'=>rand(100,999),
        ];
    }
}
