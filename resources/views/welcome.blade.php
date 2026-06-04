<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kairos - Coffee & Books</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Tambahan font fallback jika vite belum tercompile sempurna */
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        h1, h2, h3, .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#FBF9F4] text-[#2C1A11] antialiased">

    <nav class="fixed w-full bg-[#FBF9F4]/80 backdrop-blur-md z-50 border-b border-[#7D6E65]/10">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="font-serif text-2xl font-bold tracking-wide text-[#4A3525]">Kairos Coffee</a>
            <div class="hidden md:flex space-x-8 text-sm font-medium text-[#4A3525]/80 items-center uppercase tracking-widest">
                <a href="#about" class="hover:text-[#4A3525] transition">About</a>
                <a href="#menu" class="hover:text-[#4A3525] transition">Menu</a>
                <a href="#gallery" class="hover:text-[#4A3525] transition">Gallery</a>
                <a href="#reservasi" class="bg-[#4A3525] text-[#FBF9F4] px-6 py-2 rounded-full hover:bg-[#2C1A11] transition shadow-md">Reservasi</a>
            </div>
        </div>
    </nav>

    <section class="relative min-h-screen flex items-center justify-center bg-[#2C1A11] text-white px-6">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1600" alt="Hero" class="w-full h-full object-cover opacity-40 brightness-75">
            <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A11] via-transparent to-transparent"></div>
        </div>

        <div class="max-w-4xl text-center z-10 space-y-8">
            <h1 class="text-5xl md:text-8xl font-bold leading-tight">
                Escape the Noise,<br><span class="italic font-normal text-[#D4B996]">Find Your Story.</span>
            </h1>
            <p class="max-w-xl mx-auto text-lg text-white/70 leading-relaxed font-light">
                Sudut tenang di tengah kota. Nikmati racikan kopi artisan sambil tenggelam dalam ribuan lembar cerita.
            </p>
            <div class="pt-4 flex flex-col sm:flex-row justify-center gap-5">
                <a href="#menu" class="bg-[#D4B996] text-[#2C1A11] px-10 py-4 rounded-full font-bold shadow-xl hover:bg-white transition-all transform hover:-translate-y-1">Lihat Menu</a>
                <a href="#about" class="border border-white/30 backdrop-blur-sm text-white px-10 py-4 rounded-full font-bold hover:bg-white/10 transition-all">Tentang Kami</a>
            </div>
        </div>
    </section>

    <section id="menu" class="py-28 bg-[#F3ECE3]">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">
            <p class="uppercase tracking-[0.3em] text-sm text-[#A78A6D]">
                Our Signature
            </p>
            <h2 class="text-5xl font-serif font-bold text-[#4A3525] mt-3">
                Coffee Collection
            </h2>
            <div class="w-20 h-1 bg-[#D4B996] mx-auto mt-5"></div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <!-- Coffee 1 -->
            <div class="group overflow-hidden rounded-[30px] bg-white shadow-lg">
                <div class="overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1000"
                        class="w-full h-72 object-cover group-hover:scale-110 transition duration-700"
                        alt="">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-[#4A3525]">
                        Midnight Mocha
                    </h3>

                    <p class="mt-3 text-gray-500">
                        Dark chocolate espresso dengan sentuhan mint yang lembut.
                    </p>

                    <div class="mt-5 flex justify-between items-center">
                        <span class="font-bold text-[#D4B996]">
                            IDR 35K
                        </span>
                    </div>
                </div>
            </div>

            <!-- Coffee 2 -->
            <div class="group overflow-hidden rounded-[30px] bg-white shadow-xl md:-translate-y-6">
                <div class="overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1517701604599-bb29b565090c?q=80&w=1000"
                        class="w-full h-80 object-cover group-hover:scale-110 transition duration-700"
                        alt="">
                </div>

                <div class="p-6">
                    <span class="inline-block bg-[#4A3525] text-white px-4 py-1 rounded-full text-xs mb-4">
                        BEST SELLER
                    </span>

                    <h3 class="text-2xl font-bold text-[#4A3525]">
                        The Librarian's Pick
                    </h3>

                    <p class="mt-3 text-gray-500">
                        Signature kopi susu gula aren dengan resep eksklusif Kairos.
                    </p>

                    <div class="mt-5 flex justify-between items-center">
                        <span class="font-bold text-[#D4B996]">
                            IDR 28K
                        </span>
                    </div>
                </div>
            </div>

            <!-- Coffee 3 -->
            <div class="group overflow-hidden rounded-[30px] bg-white shadow-lg">
                <div class="overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1572286258217-215f1f4e2f0f?q=80&w=1000"
                        class="w-full h-72 object-cover group-hover:scale-110 transition duration-700"
                        alt="">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-[#4A3525]">
                        Silent Jasmine
                    </h3>

                    <p class="mt-3 text-gray-500">
                        Teh melati premium untuk menemani waktu membaca yang tenang.
                    </p>

                    <div class="mt-5 flex justify-between items-center">
                        <span class="font-bold text-[#D4B996]">
                            IDR 22K
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

    <section id="gallery" class="py-24 max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Sudut Kairos</h2>
        <div class="columns-1 md:columns-3 gap-4 space-y-4">
            <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?q=80&w=600" class="rounded-2xl shadow-md w-full" alt="1">
            <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=600" class="rounded-2xl shadow-md w-full" alt="2">
            <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=600" class="rounded-2xl shadow-md w-full" alt="3">
            <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=600" class="rounded-2xl shadow-md w-full" alt="4">
        </div>
    </section>

    <section id="reservasi" class="py-24 bg-[#2C1A11] text-white">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6">Pesan Tempatmu</h2>
            <p class="text-white/60 mb-10 italic text-sm italic">"Karena ketenangan butuh persiapan."</p>
            
            <form onsubmit="event.preventDefault(); alert('Visual Test Berhasil!');" class="space-y-4 text-black">
                <div class="grid md:grid-cols-2 gap-4">
                    <input type="text" placeholder="Nama Lengkap" class="w-full px-6 py-4 rounded-xl bg-white/90 focus:bg-white outline-none">
                    <input type="email" placeholder="Email" class="w-full px-6 py-4 rounded-xl bg-white/90 focus:bg-white outline-none">
                </div>
                <button type="submit" class="w-full bg-[#D4B996] text-[#2C1A11] py-4 rounded-xl font-bold hover:bg-white transition duration-300">Cek Ketersediaan</button>
            </form>
        </div>
    </section>

    <footer class="py-12 text-center text-gray-400 text-xs tracking-widest uppercase">
        &copy; 2026 Kairos Space. Designed for Peace.
    </footer>

</body>
</html>