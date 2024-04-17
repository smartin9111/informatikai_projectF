<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    public const MANUFACTURERS = ['Toyota', 'Ford', 'Honda', 'Chevrolet'];
    public const MODELS = ['Camry', 'Corolla', 'Accord', 'Civic', 'F-150', 'Mustang', 'Silverado'];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'license_plate' => fake()->regexify('[A-Z]{5}[0-4]{3}'),
            'manufacturer' => fake()->randomElement(self::MANUFACTURERS),
            'type' => fake()->randomElement(self::MODELS),
            'year' => fake()->year(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
