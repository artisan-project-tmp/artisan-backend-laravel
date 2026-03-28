<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Studio Workspace - Artisan</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style> 
        body { font-family: 'Lato', sans-serif; } 
        h1, h2, h3, .font-heading { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-stone-50 text-stone-900 font-sans antialiased">
    <!-- Navbar -->
    <nav class="bg-stone-900 border-b border-stone-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="font-heading text-2xl font-bold tracking-tight text-white">Artisan <span class="text-amber-500 italic font-normal">Studio</span></span>
                </a>
                <div class="flex items-center space-x-6">
                    <span class="text-stone-400 hidden sm:inline-block">Welcome, <strong>{{ explode(' ', $user->name)[0] }}</strong></span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-xs font-bold tracking-widest uppercase text-stone-300 hover:text-white border border-stone-700 px-4 py-2 hover:border-stone-500 transition">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-12 border-b border-stone-200 pb-6">
            <div>
                <h1 class="font-heading text-4xl font-bold text-stone-900 mb-2">Your Impact this Week</h1>
                <p class="text-stone-500 text-lg">Manage your bookings, portfolio, and availability.</p>
            </div>
            <div class="mt-6 md:mt-0 flex items-center bg-white border border-stone-200 p-2 rounded-full shadow-sm hover:shadow-md transition">
                <div class="bg-amber-100 text-amber-800 text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full flex items-center cursor-pointer">
                    <div class="w-2 h-2 rounded-full bg-amber-600 mr-2 animate-pulse"></div> Available for Hire
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Impact Board -->
            <div class="lg:col-span-2 space-y-8">
                <h2 class="text-xs font-bold tracking-widest text-stone-500 uppercase mb-4 flex items-center">
                    <span class="w-8 h-[1px] bg-stone-400 mr-3"></span> The Impact Board
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="bg-white border border-stone-200 p-6 flex flex-col justify-center items-center text-center shadow-sm">
                        <div class="text-4xl font-heading font-bold text-stone-900 mb-1">12</div>
                        <div class="text-xs font-bold tracking-widest uppercase text-stone-500">Profile Views</div>
                    </div>
                    <div class="bg-stone-900 border border-stone-900 p-6 flex flex-col justify-center items-center text-center text-white shadow-md">
                        <div class="text-4xl font-heading font-bold mb-1 text-amber-500">3</div>
                        <div class="text-xs font-bold tracking-widest uppercase text-stone-400">New Inquiries</div>
                    </div>
                    <div class="bg-white border border-stone-200 p-6 flex flex-col justify-center items-center text-center shadow-sm">
                        <div class="text-4xl font-heading font-bold text-stone-900 mb-1">4.9</div>
                        <div class="text-xs font-bold tracking-widest uppercase text-stone-500">Avg Rating</div>
                    </div>
                </div>

                <!-- Inbox -->
                <div class="bg-white border border-stone-200 shadow-sm">
                    <div class="border-b border-stone-100 px-6 py-4 flex justify-between items-center bg-stone-50">
                        <h3 class="font-bold text-stone-900 text-sm tracking-wider uppercase">Pending Requests</h3>
                    </div>
                    <div class="p-6 text-center text-stone-500 italic py-12">
                        You have no new requests today. Check back later!
                    </div>
                </div>
            </div>

            <!-- Profile Overview -->
            <div class="space-y-8">
                <h2 class="text-xs font-bold tracking-widest text-stone-500 uppercase mb-4 flex items-center">
                    <span class="w-8 h-[1px] bg-stone-400 mr-3"></span> Craft Identity
                </h2>
                <div class="bg-white border border-stone-200 p-8 shadow-sm relative">
                    <div class="w-24 h-24 bg-stone-200 rounded-full mx-auto mb-6 flex items-center justify-center text-stone-400 font-heading text-2xl">
                         {{ mb_substr($user->name, 0, 1) }}
                    </div>
                    <h3 class="font-heading text-2xl font-bold text-center mb-1">{{ $user->name }}</h3>
                    <div class="text-amber-700 text-xs font-bold tracking-widest uppercase text-center mb-6">{{ $user->artisan->craft_type ?? 'New Artisan' }}</div>
                    
                    <div class="bg-stone-50 p-4 border border-stone-100 mb-6">
                        <p class="text-stone-600 text-sm text-center italic">
                            "{{ $user->artisan->bio ?? 'Update your studio space with a description of your craft to welcome new clients.' }}"
                        </p>
                    </div>
                    
                    <button class="w-full py-3 px-4 bg-stone-900 hover:bg-stone-800 text-xs font-bold tracking-widest uppercase text-white transition-colors">
                        Manage Portfolio
                    </button>
                    <button class="w-full mt-3 py-3 px-4 border border-stone-300 text-xs font-bold tracking-widest uppercase text-stone-700 hover:bg-stone-50 transition-colors">
                        Edit Profile
                    </button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
