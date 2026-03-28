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
        $pottery = Category::where('slug', 'pottery-ceramics')->first();
        $wood = Category::where('slug', 'woodcraft-carpentry')->first();

        // Artisan 1
        $user1 = User::firstOrCreate(
            ['email' => 'anya@example.com'],
            [
                'name' => 'Anya Silva',
                'password' => Hash::make('password'),
                'role' => 'artisan'
            ]
        );
        
        Artisan::firstOrCreate(
            ['artisan_id' => $user1->id],
            [
                'craft_type' => $pottery ? $pottery->name : 'Pottery & Ceramics',
                'bio' => 'Passionate about bringing earth to life through traditional ceramics.',
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
                'craft_type' => $wood ? $wood->name : 'Woodcraft',
                'bio' => 'Third-generation woodworker specializing in reclaimed timber.',
            ]
        );
    }
}
