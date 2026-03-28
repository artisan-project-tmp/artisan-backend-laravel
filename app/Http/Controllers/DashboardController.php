<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'artisan') {
            $user->load('artisan.portfolioImages');
            return view('artisan.dashboard', compact('user'));
        }

        // If client, fetch categories and featured artisans for the discovery feed
        $categories = Category::all();
        $artisans = User::where('role', 'artisan')
            ->with(['artisan', 'artisan.portfolioImages'])
            ->get()
            ->sortByDesc(function ($userParam) {
                return $userParam->artisan->is_available ?? false;
            });
        
        return view('client.dashboard', compact('user', 'categories', 'artisans'));
    }
}
