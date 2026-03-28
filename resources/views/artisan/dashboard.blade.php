<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Studio Command Center - Artisan</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style> 
        body { font-family: 'Lato', sans-serif; background-color: #0c0a09; color: #d6d3d1; } 
        h1, h2, h3, .font-heading { font-family: 'Playfair Display', serif; }
        .glass-card { background: rgba(28, 25, 23, 0.7); backdrop-filter: blur(12px); border: 1px solid rgba(120, 113, 108, 0.2); }
        .glow-amber { box-shadow: 0 0 20px rgba(217, 119, 6, 0.15); }
        .glow-amber-text { text-shadow: 0 0 15px rgba(217, 119, 6, 0.4); }
        .kanban-col { background: rgba(28, 25, 23, 0.4); border: 1px dashed rgba(120, 113, 108, 0.3); }
        
        /* Toggle Switch styling */
        .toggle-checkbox:checked { right: 0; border-color: #d97706; }
        .toggle-checkbox:checked + .toggle-label { background-color: #9a3412; box-shadow: inset 0 0 10px rgba(217,119,6,0.5); }
        .toggle-checkbox:checked { transform: translateX(11px); }
    </style>
</head>
<body class="antialiased selection:bg-amber-700 selection:text-white pb-20">

    <!-- Premium Navbar -->
    <nav class="fixed w-full z-50 glass-card border-b-0 border-stone-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <span class="font-heading text-2xl font-bold tracking-tight text-amber-500 glow-amber-text">Artisan <span class="text-stone-300 italic font-light">Studio</span></span>
                </a>
                <div class="flex items-center space-x-6">
                    <span class="hidden sm:inline-block text-sm text-stone-400">Welcome, <span class="text-stone-200">{{ explode(' ', $user->name)[0] }}</span></span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-xs font-bold tracking-widest uppercase text-stone-400 hover:text-amber-500 transition-colors">Sign Out</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-32 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header & Availability Switch -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-8">
            <div>
                <h1 class="text-amber-500 glow-amber-text text-xs font-bold tracking-widest uppercase mb-2">Command Center</h1>
                <h2 class="font-heading text-4xl font-bold text-stone-100">Your Impact Pipeline</h2>
            </div>
            
            <!-- Glowing Availability Switch -->
            <div class="glass-card p-4 flex items-center gap-6 rounded-lg border-amber-900/30 glow-amber bg-amber-900/10">
                <div class="text-right">
                    <div class="text-amber-500 text-sm font-bold uppercase tracking-widest leading-tight">Available For Hire</div>
                    <div class="text-stone-500 text-xs">Visible in client feed</div>
                </div>
                <!-- Toggle -->
                <div class="relative inline-block w-14 mr-2 align-middle select-none transition duration-200 ease-in">
                    <input type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-amber-500 border-4 appearance-none cursor-pointer z-10 top-0.5 right-[16px] transition-transform" style="border-color: #7b2c0e;" checked/>
                    <label for="toggle" class="toggle-label block overflow-hidden h-7 rounded-full bg-amber-900/50 cursor-pointer border border-amber-800/30 shadow-[inset_0_0_10px_rgba(217,119,6,0.3)]"></label>
                </div>
            </div>
        </div>

        <!-- Impact KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="glass-card rounded-lg p-6 border-stone-800 hover:border-amber-700/50 transition-colors relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-amber-600/10 rounded-full blur-xl group-hover:bg-amber-600/20 transition-all"></div>
                <div class="text-stone-400 text-xs font-bold uppercase tracking-widest mb-2">Profile Views (7d)</div>
                <div class="font-heading text-4xl font-bold text-amber-500 glow-amber-text mb-2">1,248</div>
                <div class="text-emerald-500 text-xs font-bold">+14.5% vs last week</div>
            </div>
            <div class="glass-card rounded-lg p-6 border-stone-800 hover:border-amber-700/50 transition-colors relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-amber-600/10 rounded-full blur-xl group-hover:bg-amber-600/20 transition-all"></div>
                <div class="text-stone-400 text-xs font-bold uppercase tracking-widest mb-2">New Inquiries</div>
                <div class="font-heading text-4xl font-bold text-stone-100 mb-2">4</div>
                <div class="text-stone-500 text-xs">Awaiting your response</div>
            </div>
            <div class="glass-card rounded-lg p-6 border-stone-800 hover:border-amber-700/50 transition-colors relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-amber-600/10 rounded-full blur-xl group-hover:bg-amber-600/20 transition-all"></div>
                <div class="text-stone-400 text-xs font-bold uppercase tracking-widest mb-2">Client Rating</div>
                <div class="font-heading text-4xl font-bold text-stone-100 mb-2 flex items-center gap-2">
                    4.9 <span class="text-amber-500 text-2xl">★</span>
                </div>
                <div class="text-stone-500 text-xs">Based on 34 reviews</div>
            </div>
        </div>

        <!-- Lead Pipeline (Kanban Lite) -->
        <h3 class="text-xs font-bold tracking-widest text-stone-400 uppercase mb-6 flex items-center">
            <span class="w-4 h-[1px] bg-amber-600 mr-3"></span> Active Job Pipeline
        </h3>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Col 1: New Offers -->
            <div class="kanban-col rounded-lg p-4 h-full min-h-[400px]">
                <div class="flex items-center justify-between mb-6 px-2">
                    <span class="text-sm font-bold text-stone-200">New Inquiries</span>
                    <span class="bg-amber-600 text-stone-950 text-xs font-bold px-2 py-0.5 rounded">1</span>
                </div>
                
                <!-- Mock Ticket -->
                <div class="glass-card rounded-lg bg-stone-900/90 p-4 mb-4 border-l-4 border-l-amber-600 cursor-pointer hover:-translate-y-1 transition-transform">
                    <div class="flex justify-between items-start mb-3">
                        <span class="text-[10px] font-bold text-amber-500 uppercase tracking-widest px-2 py-1 bg-amber-900/20 rounded">Quote Request</span>
                        <span class="text-[10px] text-stone-500 uppercase font-bold tracking-wider">2h ago</span>
                    </div>
                    <h4 class="font-bold text-stone-100 mb-2 text-sm">Custom Dining Table</h4>
                    <p class="text-xs text-stone-400 line-clamp-2 mb-4 leading-relaxed">"Hi! I loved your portfolio. I'm looking for a reclaimed wood table..."</p>
                    <div class="flex items-center gap-2 border-t border-stone-800 pt-3">
                        <div class="w-6 h-6 rounded-full bg-stone-800 border border-stone-700 text-[9px] flex items-center justify-center font-bold text-amber-500">SJ</div>
                        <span class="text-xs text-stone-300">Sarah Jenkins</span>
                    </div>
                </div>
            </div>

            <!-- Col 2: In Discussion -->
            <div class="kanban-col rounded-lg p-4 h-full min-h-[400px]">
                <div class="flex items-center justify-between mb-6 px-2">
                    <span class="text-sm font-bold text-stone-200">In Discussion</span>
                    <span class="bg-stone-700 text-stone-300 text-xs font-bold px-2 py-0.5 rounded">0</span>
                </div>
                <!-- Empty State -->
                <div class="h-32 flex flex-col items-center justify-center text-stone-600 border border-stone-800/50 rounded-lg border-dashed mt-4">
                    <span class="text-xs uppercase tracking-widest font-bold">No active chats</span>
                </div>
            </div>

            <!-- Col 3: Booked Jobs -->
            <div class="kanban-col rounded-lg p-4 h-full min-h-[400px]">
                <div class="flex items-center justify-between mb-6 px-2">
                    <span class="text-sm font-bold text-stone-200">Booked Jobs</span>
                    <span class="bg-emerald-600 text-stone-50 text-xs font-bold px-2 py-0.5 rounded">1</span>
                </div>
                
                <!-- Mock Ticket -->
                <div class="glass-card rounded-lg bg-stone-900/90 p-4 mb-4 border-l-4 border-l-emerald-600 cursor-pointer hover:-translate-y-1 transition-transform">
                    <div class="flex justify-between items-start mb-3">
                        <span class="text-[10px] font-bold text-emerald-500 uppercase tracking-widest px-2 py-1 bg-emerald-900/20 rounded">In Progress</span>
                        <span class="text-[10px] text-stone-500 uppercase font-bold tracking-wider">Due Nov 12</span>
                    </div>
                    <h4 class="font-bold text-stone-100 mb-4 text-sm">Walnut Bookshelf Restoration</h4>
                    <div class="w-full bg-stone-800 rounded-full h-1.5 mb-2">
                        <div class="bg-emerald-500 h-1.5 rounded-full shadow-[0_0_8px_rgba(16,185,129,0.5)]" style="width: 45%"></div>
                    </div>
                    <span class="text-[10px] text-stone-400 uppercase tracking-widest font-bold">45% Complete</span>
                </div>
            </div>

        </div>

        <!-- Portfolio Quick Upload -->
        <div class="mt-12 glass-card rounded-xl p-12 border border-dashed border-stone-700 flex flex-col items-center justify-center text-center hover:border-amber-600/50 hover:bg-stone-900/50 transition-colors cursor-pointer group">
            <div class="w-16 h-16 rounded-full bg-stone-800 flex items-center justify-center mb-4 group-hover:bg-amber-900/30 group-hover:scale-110 transition-all duration-300 shadow-lg">
                <svg class="w-8 h-8 text-stone-400 group-hover:text-amber-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"></path></svg>
            </div>
            <h4 class="font-heading text-2xl font-bold text-stone-200 mb-2">Add to Gallery</h4>
            <p class="text-stone-500 text-sm">Drag and drop a new masterpiece photo here to keep your portfolio fresh.</p>
        </div>

    </main>
</body>
</html>
