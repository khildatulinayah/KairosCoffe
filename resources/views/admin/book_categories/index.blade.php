<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Categories | Kairos Admin</title>

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
                Book Categories
            </h1>

            <p class="text-sm text-[#7D6E65]">
                Organize your library collections
            </p>
        </div>

        <div class="flex gap-3">

            <a href="{{ route('admin.dashboard') }}"
               class="px-5 py-3 rounded-full border border-[#DCCDBA] hover:bg-white transition">
                Dashboard
            </a>

            <a href="{{ route('admin.book_categories.create') }}"
               class="bg-[#4A3525] text-white px-6 py-3 rounded-full hover:bg-[#2C1A11] transition shadow-md">
                + Add Category
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
            Library
        </p>

        <h2 class="font-serif text-5xl mt-3">
            Categories
        </h2>

        <p class="mt-4 text-white/70 max-w-xl">
            Kelola kategori buku untuk mempermudah pencarian dan pengelompokan koleksi.
        </p>

    </div>

    <!-- Stats -->

    <div class="grid md:grid-cols-3 gap-6 mb-10">

        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <p class="text-[#7D6E65] text-sm">
                Total Categories
            </p>

            <h3 class="text-4xl font-bold mt-3">
                {{ $categories->total() }}
            </h3>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <p class="text-[#7D6E65] text-sm">
                Library Sections
            </p>

            <h3 class="text-4xl font-bold mt-3">
                📚
            </h3>

        </div>

        <div class="bg-[#D4B996] rounded-3xl p-6">

            <p class="text-[#4A3525] text-sm">
                Collection Status
            </p>

            <h3 class="text-xl font-bold mt-3 text-[#4A3525]">
                Organized
            </h3>

        </div>

    </div>

    <!-- Categories Grid -->

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($categories as $cat)

            <div class="bg-white rounded-[28px] shadow-sm p-6 hover:shadow-lg transition">

                <div class="flex justify-between items-start">

                    <div>

                        <div class="w-14 h-14 rounded-2xl bg-[#F7F2EA] flex items-center justify-center text-2xl mb-4">
                            📖
                        </div>

                        <h3 class="font-semibold text-xl">
                            {{ $cat->name }}
                        </h3>

                        <p class="text-sm text-[#7D6E65] mt-2">
                            Category ID #{{ $cat->id }}
                        </p>

                    </div>

                </div>

                <div class="flex gap-3 mt-6">

                    <a href="{{ route('admin.book_categories.edit', $cat) }}"
                       class="flex-1 text-center px-4 py-3 rounded-xl bg-amber-100 text-amber-700 hover:bg-amber-200 transition">

                        Edit

                    </a>

                    <form method="POST"
                          action="{{ route('admin.book_categories.destroy', $cat) }}"
                          class="flex-1"
                          onsubmit="return confirm('Delete this category?')">

                        @csrf
                        @method('DELETE')

                        <button
                            class="w-full px-4 py-3 rounded-xl bg-red-100 text-red-700 hover:bg-red-200 transition">

                            Delete

                        </button>

                    </form>

                </div>

            </div>

        @empty

            <div class="col-span-full bg-white rounded-[32px] p-16 text-center">

                <div class="text-6xl mb-4">
                    📚
                </div>

                <h3 class="text-2xl font-semibold">
                    No Categories Yet
                </h3>

                <p class="text-gray-500 mt-2">
                    Create your first book category.
                </p>

            </div>

        @endforelse

    </div>

    <div class="mt-10">
        {{ $categories->links() }}
    </div>

</main>

</body>
</html>