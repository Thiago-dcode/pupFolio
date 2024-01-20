<?php

namespace Database\Seeders;

use App\Models\Dog;
use Faker\Factory;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Testing\Fakes\Fake;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $dogs = [];
        $breedIds = DB::table('breeds')->pluck('id')->toArray();
        $sizes = DB::table('sizes')->pluck('id')->toArray();
        $dogColors = [
            '#000000', // Black
            '#8B4513', // Brown
            '#FFFFFF', // White
            '#FFD700', // Golden
            '#808080', // Gray
        ];

        foreach ($breedIds as $i => $id) {
            for ($j = 0; $j < 2; $j++) {
                $dogs[] = [
                    'breed_id' => $id,
                    'image' => null,
                    'name' => fake()->name(),
                    'description' => fake()->sentence(),
                    'size_id' => $sizes[rand(0, count($sizes) - 1)],
                    'color' => $dogColors[rand(0, count($dogColors) - 1)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert the generated dogs into the database
        Dog::insert($dogs);
    }
}
