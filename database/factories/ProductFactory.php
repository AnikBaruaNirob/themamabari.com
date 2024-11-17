<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'pname'=>$this->faker->name(),
            'price'=>$this->faker->numberBetween(100,1000),
            'pcategory'=>$this->faker->numberBetween(1-5),
             'pdescription'=>$this->faker->text(),
             'image'=> $this->faker->image(),
             'stock'=>$this->faker->numberBetween(100,200),

        ];
    }
}
