<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kairos | Coffee & Books</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-paper text-coffee-dark">

    <!-- NAVBAR -->
    <nav class="fixed top-0 left-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-6 pt-6">

            <div class="bg-white/70 backdrop-blur-xl border border-white/30 rounded-full px-8 py-4 shadow-xl">

                <div class="flex items-center justify-between">

                    <a href="#" class="leading-none">
                        <h1 class="font-serif text-2xl font-bold text-coffee-warm">
                            Kairos
                        </h1>

                        <p class="text-[10px] uppercase tracking-[0.35em] text-coffee-light mt-1">
                            Coffee • Books • Silence
                        </p>
                    </a>

                    <div class="hidden md:flex items-center gap-10 text-sm font-medium">

                        <a href="#about" class="hover:text-[#D4B996] transition">
                            About
                        </a>

                        <a href="#menu" class="hover:text-[#D4B996] transition">
                            Collection
                        </a>

                        <a href="#gallery" class="hover:text-[#D4B996] transition">
                            Atmosphere
                        </a>

                        <a href="#reservasi"
                           class="bg-coffee-warm text-white px-6 py-3 rounded-full hover:bg-coffee-dark transition">
                            Reserve
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">

        <img
            src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1800"
            alt=""
            class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0 bg-black/55"></div>

        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-black/40"></div>

        <div class="relative z-10 text-center px-6 max-w-5xl">

            <div class="inline-flex items-center gap-3 border border-white/20 bg-white/10 backdrop-blur-md rounded-full px-5 py-2 text-white mb-8">

                <span class="w-2 h-2 rounded-full bg-[#D4B996]"></span>

                <span class="uppercase tracking-[0.3em] text-xs">
                    Sanctuary Since 2026
                </span>

            </div>

            <h1 class="text-5xl md:text-7xl lg:text-8xl font-serif text-white leading-tight">

                Where Silence
                <br>
                Brews Inspiration

            </h1>

            <p class="max-w-2xl mx-auto mt-8 text-white/75 text-lg leading-relaxed">

                Kairos adalah ruang tenang untuk menikmati kopi,
                membaca buku, dan menemukan ide-ide baru tanpa gangguan.

            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-5 mt-10">

                <a href="#menu"
                   class="bg-[#D4B996] text-coffee-dark px-8 py-4 rounded-full font-semibold hover:bg-white transition">
                    Explore Collection
                </a>

                <a href="#about"
                   class="border border-white/30 text-white px-8 py-4 rounded-full hover:bg-white/10 transition">
                    Discover Kairos
                </a>

            </div>

        </div>

    </section>

    <!-- ABOUT -->
    <section id="about" class="py-32 bg-paper">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <div>

                    <p class="uppercase tracking-[0.3em] text-sm text-[#D4B996]">
                        About Kairos
                    </p>

                    <h2 class="font-serif text-5xl mt-4 text-coffee-warm">
                        A Quiet Place For Curious Minds.
                    </h2>

                    <p class="mt-8 text-coffee-light leading-relaxed text-lg">
                        Kami percaya bahwa inspirasi lahir dari ketenangan.
                        Karena itu Kairos menghadirkan perpaduan antara kopi,
                        buku, dan suasana yang membuat siapa pun ingin
                        tinggal lebih lama.
                    </p>

                    <div class="grid grid-cols-3 gap-8 mt-12">

                        <div>
                            <h3 class="text-3xl font-bold text-coffee-warm">1200+</h3>
                            <p class="text-sm text-coffee-light">Books</p>
                        </div>

                        <div>
                            <h3 class="text-3xl font-bold text-coffee-warm">5K+</h3>
                            <p class="text-sm text-coffee-light">Coffee Served</p>
                        </div>

                        <div>
                            <h3 class="text-3xl font-bold text-coffee-warm">4.9</h3>
                            <p class="text-sm text-coffee-light">Rating</p>
                        </div>

                    </div>

                </div>

                <div>

                    <img
                        src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?q=80&w=1200"
                        class="rounded-[32px] shadow-2xl"
                        alt="">

                </div>

            </div>

        </div>

    </section>

    <!-- MENU -->
    <section id="menu" class="py-32 bg-paper-soft">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-20">

                <p class="uppercase tracking-[0.3em] text-sm text-[#D4B996]">
                    Featured Collection
                </p>

                <h2 class="font-serif text-5xl mt-4 text-coffee-warm">
                    Crafted With Intention
                </h2>

            </div>

            <div class="grid lg:grid-cols-3 gap-8">

                <div class="bg-white rounded-[32px] overflow-hidden border border-paper-dark hover:-translate-y-2 hover:shadow-2xl transition duration-500">
                    <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1200" class="h-72 w-full object-cover">
                    <div class="p-8">
                        <h3 class="text-2xl font-semibold">Midnight Mocha</h3>
                        <p class="mt-3 text-coffee-light">
                            Dark chocolate espresso dengan karakter yang dalam.
                        </p>
                        <p class="mt-6 font-bold text-[#D4B996]">IDR 35K</p>
                    </div>
                </div>

                <div class="bg-white rounded-[32px] overflow-hidden border border-paper-dark hover:-translate-y-2 hover:shadow-2xl transition duration-500">
                    <img src="https://images.unsplash.com/photo-1517701604599-bb29b565090c?q=80&w=1200" class="h-72 w-full object-cover">
                    <div class="p-8">
                        <span class="inline-block px-4 py-1 bg-coffee-warm text-white rounded-full text-xs mb-4">
                            BEST SELLER
                        </span>
                        <h3 class="text-2xl font-semibold">The Librarian's Pick</h3>
                        <p class="mt-3 text-coffee-light">
                            Signature kopi susu gula aren favorit pengunjung.
                        </p>
                        <p class="mt-6 font-bold text-[#D4B996]">IDR 28K</p>
                    </div>
                </div>

                <div class="bg-white rounded-[32px] overflow-hidden border border-paper-dark hover:-translate-y-2 hover:shadow-2xl transition duration-500">
                    <img src="https://images.unsplash.com/photo-1572286258217-215f1f4e2f0f?q=80&w=1200" class="h-72 w-full object-cover">
                    <div class="p-8">
                        <h3 class="text-2xl font-semibold">Silent Jasmine</h3>
                        <p class="mt-3 text-coffee-light">
                            Teh melati premium untuk sesi membaca yang tenang.
                        </p>
                        <p class="mt-6 font-bold text-[#D4B996]">IDR 22K</p>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- GALLERY -->
    <section id="gallery" class="py-32 bg-paper">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-16">

                <p class="uppercase tracking-[0.3em] text-sm text-[#D4B996]">
                    Atmosphere
                </p>

                <h2 class="font-serif text-5xl mt-4 text-coffee-warm">
                    Every Corner Tells A Story
                </h2>

            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

                <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?q=80&w=1000" class="h-80 w-full object-cover rounded-[28px] hover:scale-[1.03] transition duration-500">

                <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1000" class="h-80 w-full object-cover rounded-[28px] hover:scale-[1.03] transition duration-500">

                <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=1000" class="h-80 w-full object-cover rounded-[28px] hover:scale-[1.03] transition duration-500">

                <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1000" class="h-80 w-full object-cover rounded-[28px] hover:scale-[1.03] transition duration-500">

            </div>

        </div>

    </section>

    <!-- RESERVATION -->
    <section id="reservasi" class="py-32 bg-coffee-dark text-white">

        <div class="max-w-3xl mx-auto px-6 text-center">

            <p class="uppercase tracking-[0.3em] text-[#D4B996] text-sm">
                Reservation
            </p>

            <h2 class="font-serif text-5xl mt-4">
                Reserve Your Quiet Corner
            </h2>

            <p class="mt-6 text-white/60">
                Karena momen terbaik layak dipersiapkan.
            </p>

            <form class="mt-12 space-y-5">

                <div class="grid md:grid-cols-2 gap-5">

                    <input
                        type="text"
                        placeholder="Nama Lengkap"
                        class="w-full bg-white/10 border border-white/10 rounded-2xl px-6 py-4 text-white placeholder:text-white/40 outline-none focus:border-[#D4B996]">

                    <input
                        type="email"
                        placeholder="Email"
                        class="w-full bg-white/10 border border-white/10 rounded-2xl px-6 py-4 text-white placeholder:text-white/40 outline-none focus:border-[#D4B996]">

                </div>

                <button
                    type="submit"
                    class="w-full bg-[#D4B996] text-coffee-dark py-4 rounded-2xl font-semibold hover:bg-white transition">
                    Check Availability
                </button>

            </form>

        </div>

    </section>

    <!-- FOOTER -->
    <footer class="bg-[#1D120C] text-white">

        <div class="max-w-6xl mx-auto px-6 py-20 text-center">

            <h2 class="font-serif text-4xl">
                Kairos
            </h2>

            <p class="mt-4 text-white/50">
                Coffee • Books • Silence
            </p>

            <div class="w-20 h-px bg-white/20 mx-auto my-8"></div>

            <p class="text-white/40 text-sm">
                © 2026 Kairos Space. Crafted with intention.
            </p>

        </div>

    </footer>

</body>
</html>