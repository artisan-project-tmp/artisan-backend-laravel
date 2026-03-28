<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Discovery Feed - Artisan</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style> 
        body { font-family: 'Lato', sans-serif; } 
        h1, h2, h3, .font-heading { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-stone-50 text-stone-900 font-sans antialiased selection:bg-amber-700 selection:text-white">
    <!-- Navbar -->
    <nav class="bg-white border-b border-stone-200 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Artisan Platform" class="h-10 w-auto rounded opacity-90">
                    <span class="ml-3 font-heading text-2xl font-bold tracking-tight text-stone-900">Artisan</span>
                </a>
                <div class="flex items-center space-x-6">
                    <span class="text-stone-600 text-sm hidden sm:inline-block">Welcome back, <strong>{{ explode(' ', $user->name)[0] }}</strong></span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm font-bold tracking-widest uppercase border border-stone-300 px-4 py-2 hover:bg-stone-100 text-stone-700 hover:text-amber-800 transition">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-12">
            <h1 class="font-heading text-4xl font-bold text-stone-900 mb-2">Discover Authentic Craftsmanship</h1>
            <p class="text-stone-500 text-lg">Browse by category or explore featured artisans near you.</p>
        </div>

        <!-- Artisan Spotlight -->
        <section class="mb-16">
            <h2 class="text-xs font-bold tracking-widest text-stone-500 uppercase mb-6 flex items-center">
                <span class="w-8 h-[1px] bg-amber-600 mr-3"></span> Artisan Spotlight
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($featuredArtisans as $index => $artisanUser)
                <div class="bg-white border border-stone-200 p-6 {{ $index === 1 ? 'md:-translate-y-4 shadow-md' : 'shadow-sm' }} hover:shadow-lg transition-all duration-300">
                    <div class="h-48 bg-stone-200 mb-4 bg-cover bg-center flex items-center justify-center">
                         <span class="text-stone-400 font-heading italic">Craft Showcase</span>
                    </div>
                    <div class="text-xs text-amber-700 font-bold uppercase tracking-widest mb-1">{{ $artisanUser->artisan->craft_type }}</div>
                    <h3 class="font-heading text-xl font-bold mb-2">{{ $artisanUser->name }}</h3>
                    <p class="text-stone-600 text-sm mb-4 line-clamp-2">"{{ $artisanUser->artisan->bio }}"</p>
                    <a href="#" class="text-xs font-bold border-b-2 border-amber-600 pb-1 text-stone-900 hover:text-amber-700 transition uppercase tracking-wider">View Profile</a>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Categories Grid -->
        <section class="mb-16">
            <h2 class="text-xs font-bold tracking-widest text-stone-500 uppercase mb-6 flex items-center">
                <span class="w-8 h-[1px] bg-stone-400 mr-3"></span> Browse by Craft
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($categories as $category)
                <a href="#" class="group relative h-40 flex items-end p-5 border border-stone-200 hover:border-amber-600 transition overflow-hidden bg-white shadow-sm hover:shadow-md">
                    <div class="absolute inset-0 bg-stone-50 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative z-10 w-full">
                        <div class="font-heading text-xl font-bold text-stone-900 group-hover:text-amber-800 transition">{{ $category->name }}</div>
                        <div class="text-sm text-stone-500 mt-2 opacity-80 group-hover:opacity-100 transition">{{ $category->description }}</div>
                    </div>
                </a>
                @endforeach
            </div>
        </section>
    </main>
</body>
</html>
