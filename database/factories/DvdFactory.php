<?php

namespace Database\Factories;

use App\Models\Dvd;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dvd>
 */
class DvdFactory extends Factory
{
    protected $model = Dvd::class;

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
