<?php

namespace Database\Factories;

use App\Models\Category;
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
        return [
            'title' => $this->faker->sentence(3),
            'imageUrl'=> $this->faker->imageUrl(),
            'cost' => random_int(199, 100000),
            'production_country' => $this->faker->word,
            'model' => $this->faker->word,
            'production_year' => random_int(2006, 2022),
            'category_id' => Category::all()->pluck('id')->random(),
            'amount' => random_int(0, 10)
        ];
    }
}
