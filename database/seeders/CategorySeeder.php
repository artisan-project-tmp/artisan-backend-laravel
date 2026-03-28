<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Électricité', 'slug' => 'electricite', 'description' => 'Wiring, lighting, panel repairs.'],
            ['name' => 'Plomberie', 'slug' => 'plomberie', 'description' => 'Leaks, pipe installations, water heaters.'],
            ['name' => 'Peinture & Décoration', 'slug' => 'peinture-decoration', 'description' => 'Interior/exterior painting, wallpapering.'],
            ['name' => 'Menuiserie', 'slug' => 'menuiserie', 'description' => 'Custom furniture, door/window repairs, woodcraft.'],
            ['name' => 'Maçonnerie & Zellige', 'slug' => 'maconnerie-zellige', 'description' => 'Wall repairs, traditional Moroccan tiling, floor work.'],
            ['name' => 'Bricolage', 'slug' => 'bricolage', 'description' => 'Small fixes, TV mounting, furniture assembly.'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
