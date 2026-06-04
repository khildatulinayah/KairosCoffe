<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Collection | Kairos Admin</title>

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

    <!-- Header -->
    <header class="border-b border-[#E8DED1] bg-[#FBF9F4]/90 backdrop-blur sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">

            <div>
                <h1 class="font-serif text-3xl font-bold text-[#4A3525]">
                    Kairos Library
                </h1>

                <p class="text-sm text-[#7D6E65]">
                    Manage Book Collection
                </p>
            </div>

            <div class="flex gap-3">

                <a href="{{ route('admin.dashboard') }}"
                    class="px-5 py-3 rounded-full border border-[#DCCDBA] hover:bg-white transition">
                    Dashboard
                </a>

                <a href="{{ route('admin.books.create') }}"
                    class="bg-[#4A3525] text-white px-6 py-3 rounded-full hover:bg-[#2C1A11] transition shadow-md">
                    + Add Book
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
                Collection
            </p>

            <h2 class="font-serif text-5xl mt-3">
                Books Catalog
            </h2>

            <p class="mt-4 text-white/70 max-w-xl">
                Kelola seluruh koleksi buku yang tersedia di Kairos Coffee & Books.
            </p>

        </div>

        <!-- Stats -->
        <div class="grid md:grid-cols-3 gap-6 mb-10">

            <div class="bg-white rounded-3xl p-6 shadow-sm">
                <p class="text-[#7D6E65] text-sm">
                    Total Books
                </p>

                <h3 class="text-4xl font-bold mt-3">
                    {{ $books->total() }}
                </h3>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-sm">
                <p class="text-[#7D6E65] text-sm">
                    Categories
                </p>

                <h3 class="text-4xl font-bold mt-3">
                    {{ \App\Models\BookCategory::count() }}
                </h3>
            </div>

            <div class="bg-[#D4B996] rounded-3xl p-6">
                <p class="text-[#4A3525] text-sm">
                    Total Stock
                </p>

                <h3 class="text-4xl font-bold mt-3 text-[#4A3525]">
                    {{ $books->sum('stock') }}
                </h3>
            </div>

        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-[32px] shadow-sm overflow-hidden">

            <div class="p-8 border-b border-gray-100">

                <h3 class="font-serif text-3xl">
                    Book Collection
                </h3>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-[#F7F2EA]">

                        <tr>

                            <th class="px-6 py-4 text-left text-sm font-semibold">
                                ID
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold">
                                Title
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold">
                                Category
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold">
                                Stock
                            </th>

                            <th class="px-6 py-4 text-center text-sm font-semibold">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($books as $book)

                        <tr class="border-t border-gray-100 hover:bg-[#FCFAF7] transition">

                            <td class="px-6 py-5">
                                #{{ $book->id }}
                            </td>

                            <td class="px-6 py-5 font-medium">
                                {{ $book->title }}
                            </td>

                            <td class="px-6 py-5 text-[#7D6E65]">
                                {{ optional($book->category)->name }}
                            </td>

                            <td class="px-6 py-5">
                                {{ $book->stock }}
                            </td>

                            <td class="px-6 py-5">

                                <div class="flex justify-center gap-3">

                                    <a href="{{ route('admin.books.edit', $book) }}"
                                        class="px-4 py-2 rounded-xl bg-amber-100 text-amber-700 hover:bg-amber-200 transition">
                                        Edit
                                    </a>

                                    <form method="POST"
                                        action="{{ route('admin.books.destroy', $book) }}"
                                        onsubmit="return confirm('Delete this book?')">

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

                            <td colspan="5" class="text-center py-16 text-gray-400">
                                No books found.
                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $books->links() }}
        </div>

    </main>

</body>
</html>