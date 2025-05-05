<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all venues
        $venues = Venue::all();

        // Seed more events for each venue
        foreach ($venues as $venue) {
            Event::create([
                'venue_id' => $venue->id,
                'name' => 'Music Concert ' . rand(1, 100),
                'description' => 'A live music concert featuring popular bands.',
                'date' => now()->addDays(rand(1, 30)),
                'total_seats' => rand(100, 500),
                'price_per_seat' => rand(50, 200),
            ]);

            Event::create([
                'venue_id' => $venue->id,
                'name' => 'Art Exhibition ' . rand(1, 100),
                'description' => 'An exhibition showcasing local artists.',
                'date' => now()->addDays(rand(10, 60)),
                'total_seats' => rand(100, 300),
                'price_per_seat' => rand(30, 100),
            ]);

            Event::create([
                'venue_id' => $venue->id,
                'name' => 'Tech Talk ' . rand(1, 100),
                'description' => 'An event for tech enthusiasts to discuss latest trends.',
                'date' => now()->addDays(rand(20, 90)),
                'total_seats' => rand(50, 150),
                'price_per_seat' => rand(100, 250),
            ]);

            Event::create([
                'venue_id' => $venue->id,
                'name' => 'Food Festival ' . rand(1, 100),
                'description' => 'A celebration of food from around the world.',
                'date' => now()->addDays(rand(30, 120)),
                'total_seats' => rand(200, 1000),
                'price_per_seat' => rand(10, 50),
            ]);
        }
    }
}
