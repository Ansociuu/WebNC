<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 1; $i <= 10; $i++) {
            DB::table('news')->insert([
                'title' => $faker->sentence(6),
                'content' => $faker->paragraph(5),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
