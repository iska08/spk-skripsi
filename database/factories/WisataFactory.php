<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wisata>
 */
class WisataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'lokasi_maps' => $this->faker->name(),
            'fasilitas' => $this->faker->name(),
            'biaya' => $this->faker->money_format(),
            'jenis_id' => mt_rand(1, 13),
        ];
    }
}
