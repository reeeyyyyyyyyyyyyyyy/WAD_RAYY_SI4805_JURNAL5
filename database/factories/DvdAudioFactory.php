<?php

namespace Database\Factories;

use App\Models\DvdAudio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DvdAudio>
 */
class DvdAudioFactory extends Factory
{
    protected $model = DvdAudio::class;

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
            'year' => fake()->numberBetween(2000, date('Y')),
        ];
    }
}
