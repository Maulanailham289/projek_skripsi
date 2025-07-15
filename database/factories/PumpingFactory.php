<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pumping>
 */
class PumpingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'tanggal' => fake()->date(),
            'pukul' => fake()->time(),
            'menit' => 2,
            'note' => Str::random(5),
            'pd_kanan' => 200,
            'pd_kiri' => 100,
            'mother_id' => fake()->numberBetween(1, 2)
        ];
    }
}
