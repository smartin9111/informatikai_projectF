<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Part>
 */
class PartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $partNames = [
            "Fékbetét",
            "Féknyereg",
            "Féktárcsa",
            "Fékcső",
            "Fékbetét rugó",
            "Fékrendszer szervo",
            "Kormánykerék",
            "Kormányváltó",
            "Kormánymű",
            "Kormányrudazat",
            "Kormányrúd",
            "Kormánymű",
            "Lámpa",
            "Fényszóró",
            "Hátsó lámpa",
            "Indexlámpa",
            "Ködlámpa",
            "Izzó",
            "Indítómotor",
            "Akumulátor",
            "Generátor",
            "Hűtő",
            "Hűtőventilátor",
            "Hűtőfolyadék tartály",
            "Hűtővíz hőmérő",
            "Hűtőborda",
            "Olajszűrő",
            "Olajpumpa",
            "Olajtartály",
            "Olajleeresztő szelep"
        ];
        $purchasePrice = fake()->randomFloat(2, 500, 50000);
        $sellPrice = $purchasePrice + ($purchasePrice * fake()->randomFloat(2, 0.1, 0.3));

        return [
            'name' => fake()->randomElement($partNames),
            'manufacturer' => fake()->randomElement(VehicleFactory::MANUFACTURERS),
            'type' => fake()->randomElement(VehicleFactory::MODELS),
            'delivery_time' => fake()->numberBetween(1, 100),
            'purchase_price' => $purchasePrice,
            'sell_price' => $sellPrice,
        ];
    }
}
