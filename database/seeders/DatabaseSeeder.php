<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
		$this->call(UsersTableSeeder::class);
        \App\Models\User::factory(10)->create();
        \App\Models\Vehicle::factory(30)->create();
        \App\Models\Part::factory(500)->create();
        \App\Models\Offer::factory(50)->create();

        \App\Models\Offer::all()->each(function ($offer) { 
            $parts = \App\Models\Part::all()->random(rand(1, 10))->pluck('id')->toArray();
            $offerParts = [];
            foreach ($parts as $part) {
                $offerParts[$part] = ['quantity' => rand(1, 10)];
            }
            $offer->parts()->attach($offerParts);
        });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
