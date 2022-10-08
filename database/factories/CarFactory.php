<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $carsModel = ['Mazda', 'Lada', 'Renault', 'Nissan', 'Skoda', 'Volkswagen'];
        return [
            'name' => $carsModel[rand(0, 5)]
        ];
    }
}
