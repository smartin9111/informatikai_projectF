<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    public const DAILY_RATE = 10000;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isOffer = (bool)rand(0, 1); // ajánlat, vagy munkalap?
        $isCompleted = !$isOffer && (bool)rand(0, 1); // még folyamatban lévő, vagy már befejezett munkáról van szó

        $user = User::all()->random();
        $startDate = $isOffer ? null : fake()->dateTimeBetween('-2 week', '-1 week');
        $completionDate = $isCompleted ? fake()->dateTimeBetween('-5 day', 'now') : null;
        $repairTime = rand(2, 14);

        return [
            'fault_description' => substr(fake()->paragraph(), 0, 255),
            'repair_time' => $repairTime,
            'labor_fee' => $repairTime * self::DAILY_RATE * fake()->randomFloat(2, 0.75, 1.25),
            'start_date' => $startDate,
            'completion_date' => $completionDate,
            'user_id' => $user->id,
            'vehicle_id' => $user->vehicles->random(),
        ];
    }
}
