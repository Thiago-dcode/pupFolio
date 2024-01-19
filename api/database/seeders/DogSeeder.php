<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Generator as Faker;
use Illuminate\Support\Testing\Fakes\Fake;

class DogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
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
            $dogs[] = [
                'breed_id' => $id,
                'image' => 'dog' . ($i + 1) . '.jpg',
                'name' => 'Dog' . ($i + 1),
                'description' => 'Description for Dog' . ($i + 1),
                'size' => $sizes[rand(0, count($sizes) - 1)],
                'color' => $dogColors[rand(0, count($dogColors) - 1)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
    }
}
