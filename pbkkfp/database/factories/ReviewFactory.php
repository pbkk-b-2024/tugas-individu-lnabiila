<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rating' => mt_rand(3, 5),
            'message' => $this->faker->sentence(mt_rand(10, 30)),
            'user_id' => mt_rand(6, 15),
            'menu_id' => mt_rand(1, 9),
        ];
    }
}
