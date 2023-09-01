<?php

namespace Database\Factories;

use App\Models\MedicalTest;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
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
            'id_paciente'=> Patient::all()->random()->id_paciente,
            'id_prueba'=> MedicalTest::all()->random()->id_prueba,
            'fecha_resultado'=>$this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
            'resultado'=> $this->faker->randomElement(['positivo','negativo']),
        ];
    }
}
