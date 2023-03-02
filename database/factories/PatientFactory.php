<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;
use App\Models\Doctor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_patient' => $this->faker->unique()->randomNumber(3),
            'name' => $this->faker->name,
            'address' => $this->faker->city(), 
            'phone' => $this->faker->phoneNumber,
            'date' => $this->faker->date,
            'doctor_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
