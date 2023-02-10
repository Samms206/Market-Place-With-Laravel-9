<?php

namespace Database\Factories;
use Faker\Factory as faker;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'name' => Arr::random(['Hp Xiomi S1','Hp Samsung S2 Ultra','Iphone 13','Asus ROG 2022','Black Berry','Nokia']),
            'price' => Arr::random([150000,125000,300000,240000,100000]),
            'description' => $faker->text(15),
            'image' => Arr::random(['hp1.jpg','hp2.jpg','hp3.jpg','hp4.jpg','hp5.jpg','hp6.jpg','hp7.jpg']),
            'seller_id' => Arr::random([5,6])
        ];
    }
}
