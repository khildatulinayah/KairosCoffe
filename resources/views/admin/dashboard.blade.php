<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Kairos</title>

    @vite(['resources/css/app.css'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .font-serif {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<body class="bg-[#FBF9F4] text-[#2C1A11]">

    <!-- Navbar -->
    <header class="sticky top-0 z-50 bg-[#FBF9F4]/90 backdrop-blur-md border-b border-[#E9DED0]">
        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">

            <div>
                <h1 class="font-serif text-3xl font-bold text-[#4A3525]">
                    Kairos Admin
                </h1>
                <p class="text-sm text-[#7D6E65]">
                    Coffee & Books Management
                </p>
            </div>

            <div class="flex items-center gap-4">

                <span class="bg-white px-5 py-2 rounded-full shadow-sm text-sm">
                    Admin
                </span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        class="bg-[#4A3525] text-white px-5 py-2 rounded-full hover:bg-[#2C1A11] transition">
                        Logout
                    </button>
                </form>

            </div>

        </div>
    </header>

    <!-- Hero Dashboard -->
    <section class="max-w-7xl mx-auto px-6 pt-14">

        <div class="bg-gradient-to-r from-[#4A3525] to-[#6A4F3D] rounded-[32px] p-10 md:p-14 text-white shadow-xl">

            <p class="uppercase tracking-[0.3em] text-sm text-white/70">
                Dashboard
            </p>

            <h2 class="font-serif text-5xl mt-3">
                Welcome Back ☕
            </h2>

            <p class="mt-4 max-w-xl text-white/70">
                Kelola koleksi buku, menu kopi, dan pengalaman terbaik
                untuk pengunjung Kairos.
            </p>

        </div>

    </section>

    <!-- Stats -->
    <section class="max-w-7xl mx-auto px-6 py-12">

        <div class="grid md:grid-cols-4 gap-6">

            <div class="bg-white rounded-3xl p-8 shadow-sm">
                <p class="text-[#7D6E65] text-sm">Books Collection</p>

                <h3 class="text-4xl font-bold mt-3">
                    {{ $totalBooks ?? '245' }}
                </h3>
            </div>

            <div class="bg-white rounded-3xl p-8 shadow-sm">
                <p class="text-[#7D6E65] text-sm">Coffee Menu</p>

                <h3 class="text-4xl font-bold mt-3">
                    {{ $totalMenus ?? '34' }}
                </h3>
            </div>

            <div class="bg-white rounded-3xl p-8 shadow-sm">
                <p class="text-[#7D6E65] text-sm">Reservations</p>

                <h3 class="text-4xl font-bold mt-3">
                    87
                </h3>
            </div>

            <div class="bg-[#D4B996] rounded-3xl p-8">
                <p class="text-[#4A3525] text-sm">
                    Today's Visitors
                </p>

                <h3 class="text-4xl font-bold mt-3 text-[#4A3525]">
                    156
                </h3>
            </div>

        </div>

    </section>

    <!-- Management -->
    <section class="max-w-7xl mx-auto px-6 pb-16">

        <div class="grid md:grid-cols-2 gap-8">

            <a href="{{ route('admin.books.index') }}"
                class="group bg-white rounded-[30px] overflow-hidden shadow-sm hover:shadow-xl transition">

                <img
                    src="https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=1200"
                    class="h-64 w-full object-cover group-hover:scale-105 transition duration-700">

                <div class="p-8">

                    <p class="text-[#A78A6D] uppercase text-xs tracking-widest">
                        Collection
                    </p>

                    <h3 class="font-serif text-3xl mt-3">
                        Manage Books
                    </h3>

                    <p class="text-[#7D6E65] mt-3">
                        Tambah, edit, dan atur koleksi buku yang tersedia.
                    </p>

                </div>

            </a>

            <a href="{{ route('admin.book_categories.index') }}"
                class="group bg-white rounded-[30px] overflow-hidden shadow-sm hover:shadow-xl transition">

                <img
                    src="https://images.unsplash.com/photo-1453928582365-b6adbf5a2c89?q=80&w=1200"
                    class="h-64 w-full object-cover group-hover:scale-105 transition duration-700">

                <div class="p-8">

                    <p class="text-[#A78A6D] uppercase text-xs tracking-widest">
                        Books
                    </p>

                    <h3 class="font-serif text-3xl mt-3">
                        Manage Book Categories
                    </h3>

                    <p class="text-[#7D6E65] mt-3">
                        Tambah dan atur kategori buku.
                    </p>

                </div>

            </a>

            <a href="{{ route('admin.menus.index') }}"
                class="group bg-white rounded-[30px] overflow-hidden shadow-sm hover:shadow-xl transition">

                <img
                    src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1200"
                    class="h-64 w-full object-cover group-hover:scale-105 transition duration-700">

                <div class="p-8">

                    <p class="text-[#A78A6D] uppercase text-xs tracking-widest">
                        Coffee
                    </p>

                    <h3 class="font-serif text-3xl mt-3">
                        Manage Menu
                    </h3>

                    <p class="text-[#7D6E65] mt-3">
                        Kelola menu kopi, makanan, dan harga produk.
                    </p>

                </div>

            </a>

        </div>

    </section>

</body>
</html>