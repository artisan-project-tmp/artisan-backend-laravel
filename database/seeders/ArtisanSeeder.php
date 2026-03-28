<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Artisan;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;

class ArtisanSeeder extends Seeder
{
    public function run(): void
    {
        $maconnerie = Category::where('slug', 'maconnerie-zellige')->first();
        $menuiserie = Category::where('slug', 'menuiserie')->first();

        // Artisan 1
        $user1 = User::firstOrCreate(
            ['email' => 'anya@example.com'],
            [
                'name' => 'Anya Silva', // We can keep Anya or change it later
                'password' => Hash::make('password'),
                'role' => 'artisan'
            ]
        );
        
        Artisan::firstOrCreate(
            ['artisan_id' => $user1->id],
            [
                'craft_type' => $maconnerie ? $maconnerie->name : 'Maçonnerie & Zellige',
                'bio' => 'Passionate about bringing earth and stone to life through traditional Moroccan Zellige and solid masonry.',
            ]
        );

        // Artisan 2
        $user2 = User::firstOrCreate(
            ['email' => 'elias@example.com'],
            [
                'name' => 'Elias Thorne',
                'password' => Hash::make('password'),
                'role' => 'artisan'
            ]
        );
        
        Artisan::firstOrCreate(
            ['artisan_id' => $user2->id],
            [
                'craft_type' => $menuiserie ? $menuiserie->name : 'Menuiserie',
                'bio' => 'Third-generation Menuisier specializing in custom Moroccan woodwork and furniture repair.',
            ]
        );
    }
}
