<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Doctor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code_doctor' => $this->faker->unique()->randomNumber(3),
            'name' => $this->faker->name,
            'address' => $this->faker->country(),
            'specialist' => $this->faker->jobTitle,
        ];
    }
}
