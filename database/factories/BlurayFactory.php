<?php

namespace Database\Factories;

use App\Models\Bluray;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bluray>
 */
class BlurayFactory extends Factory
{
    protected $model = Bluray::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'director' => fake()->name(),
            'year' => fake()->numberBetween(1990, date('Y')),
        ];
    }
}
