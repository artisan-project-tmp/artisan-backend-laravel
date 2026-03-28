<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Pottery & Ceramics', 'slug' => 'pottery-ceramics', 'description' => 'Clay work, terracotta, and custom dishware.'],
            ['name' => 'Woodcraft & Carpentry', 'slug' => 'woodcraft-carpentry', 'description' => 'Hand-carved furniture and wooden decor.'],
            ['name' => 'Textiles & Weaving', 'slug' => 'textiles-weaving', 'description' => 'Handmade rugs, traditional clothing, and embroidery.'],
            ['name' => 'Metalwork & Jewelry', 'slug' => 'metalwork-jewelry', 'description' => 'Silvercraft, copperware, and handcrafted accessories.'],
            ['name' => 'Leatherwork', 'slug' => 'leatherwork', 'description' => 'Custom bags, belts, and traditional footwear.'],
            ['name' => 'Masonry & Tilework', 'slug' => 'masonry-tilework', 'description' => 'Traditional tile setting, plastering, and stone carving.'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
