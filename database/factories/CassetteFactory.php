<?php

namespace Database\Factories;

use App\Models\Cassette;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cassette>
 */
class CassetteFactory extends Factory
{
    protected $model = Cassette::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'artist' => fake()->name(),
            'year' => fake()->numberBetween(1970, date('Y')),
        ];
    }
}
