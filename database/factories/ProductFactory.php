<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->word,
            'product_description' => $this->faker->sentence(),
            'product_price' => $this->faker->randomFloat(2, 0, 100),
            'product_stock' => $this->faker->randomDigit,
            'product_sku' => Str::random(10)
        ];
    }
}
