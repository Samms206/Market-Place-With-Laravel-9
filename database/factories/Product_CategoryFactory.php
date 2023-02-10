<?php

namespace Database\Factories;
use Faker\Factory as faker;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product_category>
 */
class Product_CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = faker::create();
        return [
            'product_id' => $faker->unique()->numberBetween(1,10),
            'category_id' => '2'
        ];
    }
}
