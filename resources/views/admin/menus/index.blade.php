<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Collection | Kairos Admin</title>

    @vite(['resources/css/app.css'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body{
            font-family:'Plus Jakarta Sans',sans-serif;
        }

        .font-serif{
            font-family:'Playfair Display',serif;
        }
    </style>
</head>

<body class="bg-[#FBF9F4] text-[#2C1A11]">

<header class="sticky top-0 z-50 bg-[#FBF9F4]/90 backdrop-blur border-b border-[#E8DED1]">
    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">

        <div>
            <h1 class="font-serif text-3xl font-bold text-[#4A3525]">
                Kairos Menu
            </h1>

            <p class="text-sm text-[#7D6E65]">
                Coffee & Food Collection
            </p>
        </div>

        <div class="flex gap-3">

            <a href="{{ route('admin.dashboard') }}"
               class="px-5 py-3 rounded-full border border-[#DCCDBA] hover:bg-white transition">
                Dashboard
            </a>

            <a href="{{ route('admin.menus.create') }}"
               class="bg-[#4A3525] text-white px-6 py-3 rounded-full hover:bg-[#2C1A11] transition shadow-md">
                + Add Menu
            </a>

        </div>

    </div>
</header>

<main class="max-w-7xl mx-auto px-6 py-10">

    @if(session('success'))
        <div class="mb-8 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl">
            {{ session('success') }}
        </div>
    @endif

    <!-- Hero -->
    <div class="bg-gradient-to-r from-[#4A3525] to-[#6E5341] rounded-[32px] p-10 text-white mb-10">

        <p class="uppercase tracking-[0.3em] text-sm text-white/60">
            Coffee Collection
        </p>

        <h2 class="font-serif text-5xl mt-3">
            Menu Catalog
        </h2>

        <p class="mt-4 text-white/70 max-w-xl">
            Kelola seluruh menu kopi, minuman, dan makanan yang tersedia di Kairos.
        </p>

    </div>

    <!-- Stats -->
    <div class="grid md:grid-cols-3 gap-6 mb-10">

        <div class="bg-white rounded-3xl p-6 shadow-sm">
            <p class="text-[#7D6E65] text-sm">
                Total Menu
            </p>

            <h3 class="text-4xl font-bold mt-3">
                {{ $menus->total() }}
            </h3>
        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm">
            <p class="text-[#7D6E65] text-sm">
                Featured Menu
            </p>

            <h3 class="text-4xl font-bold mt-3">
                {{ $menus->where('is_featured', true)->count() }}
            </h3>
        </div>

        <div class="bg-[#D4B996] rounded-3xl p-6">
            <p class="text-[#4A3525] text-sm">
                Categories
            </p>

            <h3 class="text-4xl font-bold mt-3 text-[#4A3525]">
                {{ \App\Models\MenuCategory::count() }}
            </h3>
        </div>

    </div>

    <!-- Table -->
    <div class="bg-white rounded-[32px] shadow-sm overflow-hidden">

        <div class="p-8 border-b border-gray-100">

            <h3 class="font-serif text-3xl">
                Menu Collection
            </h3>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-[#F7F2EA]">

                    <tr>
                        <th class="px-6 py-4 text-left">ID</th>
                        <th class="px-6 py-4 text-left">Menu</th>
                        <th class="px-6 py-4 text-left">Category</th>
                        <th class="px-6 py-4 text-left">Price</th>
                        <th class="px-6 py-4 text-left">Featured</th>
                        <th class="px-6 py-4 text-center">Actions</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($menus as $menu)

                    <tr class="border-t border-gray-100 hover:bg-[#FCFAF7] transition">

                        <td class="px-6 py-5">
                            #{{ $menu->id }}
                        </td>

                        <td class="px-6 py-5">

                            <div class="flex items-center gap-4">

                                <div class="w-12 h-12 rounded-xl bg-[#F7F2EA] flex items-center justify-center">
                                    ☕
                                </div>

                                <div>
                                    <div class="font-semibold">
                                        {{ $menu->name }}
                                    </div>

                                    @if($menu->description)
                                        <div class="text-sm text-gray-500">
                                            {{ Str::limit($menu->description, 40) }}
                                        </div>
                                    @endif
                                </div>

                            </div>

                        </td>

                        <td class="px-6 py-5 text-[#7D6E65]">
                            {{ optional($menu->category)->name }}
                        </td>

                        <td class="px-6 py-5 font-semibold">
                            Rp {{ number_format($menu->price, 0, ',', '.') }}
                        </td>

                        <td class="px-6 py-5">

                            @if($menu->is_featured)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">
                                    Featured
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-medium">
                                    Regular
                                </span>
                            @endif

                        </td>

                        <td class="px-6 py-5">

                            <div class="flex justify-center gap-3">

                                <a href="{{ route('admin.menus.edit', $menu) }}"
                                   class="px-4 py-2 rounded-xl bg-amber-100 text-amber-700 hover:bg-amber-200 transition">
                                    Edit
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.menus.destroy', $menu) }}"
                                      onsubmit="return confirm('Delete this menu?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="px-4 py-2 rounded-xl bg-red-100 text-red-700 hover:bg-red-200 transition">
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center py-16 text-gray-400">
                            No menu found.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-8">
        {{ $menus->links() }}
    </div>

</main>

</body>
</html>