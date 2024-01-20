<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $randomBreeds = [
            "papillon",
            "pekinese",
            "labrador",
            "pembroke",
            "boxer",
            "dalmatian",
            "beagle",
            "husky",
            "malamute",
            "chihuahua",
            "redbone",
            "corgi",
            "bulldog",
            "poodle",
            "pug",
            "shiba",
            "rottweiler",
            "weimaraner",
            "collie",
            "whippet",
            "tervuren"
        ];
        $breeds = [];
        foreach ($randomBreeds as $key => $breed) {

            array_push($breeds, [
                'name' =>  $breed,
                'description' => fake()->sentence(),
                'origin' =>  fake()->country(),
                'lifespan' => rand(5, 7) . '-' . rand(10, 16),
                'image' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],);
        };


        DB::table('breeds')->insert($breeds);
    }
}
