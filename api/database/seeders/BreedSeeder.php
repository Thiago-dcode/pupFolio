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
        $breeds = [
            ['name' => 'Labrador Retriever', 'description' => 'Friendly, outgoing, and high-spirited.', 'origin' => 'United Kingdom', 'lifespan' => '10-12 years', 'image' => 'storage/breed_images/labrador.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bulldog', 'description' => 'Docile, willful, and friendly.', 'origin' => 'United Kingdom', 'lifespan' => '8-10 years', 'image' => 'storage/breed_images/bulldog.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Siberian Husky', 'description' => 'Outgoing, alert, and gentle.', 'origin' => 'Russia', 'lifespan' => '12-14 years', 'image' => 'storage/breed_images/siberian_husky.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Boxer', 'description' => 'Fun-loving, bright, and active.', 'origin' => 'Germany', 'lifespan' => '10-12 years', 'image' => 'storage/breed_images/boxer.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chihuahua', 'description' => 'Graceful, alert, and swift.', 'origin' => 'Mexico', 'lifespan' => '12-20 years', 'image' => 'storage/breed_images/chihuahua.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Doberman Pinscher', 'description' => 'Energetic, watchful, and determined.', 'origin' => 'Germany', 'lifespan' => '10-12 years', 'image' => 'storage/breed_images/doberman.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Shih Tzu', 'description' => 'Outgoing, affectionate, and friendly.', 'origin' => 'China', 'lifespan' => '10-16 years', 'image' => 'storage/breed_images/shihtzu.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Great Dane', 'description' => 'Friendly, patient, and dependable.', 'origin' => 'Germany', 'lifespan' => '7-10 years', 'image' => 'storage/breed_images/great_dane.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rottweiler', 'description' => 'Good-natured, confident, and fearless.', 'origin' => 'Germany', 'lifespan' => '8-10 years', 'image' => 'storage/breed_images/rottweiler.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Saint Bernard', 'description' => 'Friendly, gentle, and patient.', 'origin' => 'Switzerland', 'lifespan' => '8-10 years', 'image' => 'storage/breed_images/saint_bernard.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Basset Hound', 'description' => 'Easygoing, friendly, and low-key.', 'origin' => 'France/Belgium', 'lifespan' => '10-12 years', 'image' => 'storage/breed_images/basset_hound.jpg', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('breeds')->insert($breeds);
    }
}
