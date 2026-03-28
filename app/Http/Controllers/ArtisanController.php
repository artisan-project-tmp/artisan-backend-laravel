<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artisan;
use App\Models\PortfolioImage;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArtisanController extends Controller
{
    public function settings()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('artisan.settings', compact('user', 'categories'));
    }

    public function toggleAvailability(Request $request)
    {
        $artisan = Artisan::where('artisan_id', Auth::id())->firstOrFail();
        $artisan->is_available = !$artisan->is_available;
        $artisan->save();

        $status = $artisan->is_available ? 'Available' : 'Busy';
        return redirect()->back()->with('success', "Status set to $status.");
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'bio' => 'nullable|string|max:1000',
            'craft_type' => 'required|string|max:100',
        ]);

        $artisan = Artisan::where('artisan_id', Auth::id())->firstOrFail();
        $artisan->update([
            'bio' => $request->bio,
            'craft_type' => $request->craft_type,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function uploadPortfolioImage(Request $request)
    {
        $request->validate([
            'portfolio_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120', // Max 5MB
        ]);

        $artisan = Artisan::where('artisan_id', Auth::id())->firstOrFail();

        if ($request->hasFile('portfolio_image')) {
            $path = $request->file('portfolio_image')->store('portfolios', 'public');
            
            PortfolioImage::create([
                'artisan_id' => $artisan->artisan_id,
                'image_path' => $path,
            ]);

            return redirect()->back()->with('success', 'Image added to portfolio!');
        }

        return redirect()->back()->with('error', 'Failed to upload image.');
    }

    public function deletePortfolioImage(Request $request, $id)
    {
        $image = PortfolioImage::where('id', $id)->where('artisan_id', Auth::id())->firstOrFail();
        
        // Delete from local storage
        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        $image->delete();

        return redirect()->back()->with('success', 'Image removed from portfolio.');
    }
}
