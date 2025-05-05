<?php

namespace Database\Seeders;

use App\Models\Venue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Venue::insert([
            [
                'name' => 'Grand Hall',
                'address' => '123 Main Street',
                'city' => 'New York',
                'state' => 'NY',
                'country' => 'USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Expo Center',
                'address' => '456 Elm Avenue',
                'city' => 'Los Angeles',
                'state' => 'CA',
                'country' => 'USA',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
