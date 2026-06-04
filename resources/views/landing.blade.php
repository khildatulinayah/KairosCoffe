<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kairos Coffee</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[#FBF9F4] text-[#2C1A11] font-sans">

    <nav class="fixed w-full bg-[#FBF9F4]/80 backdrop-blur-md z-50 border-b border-[#7D6E65]/10">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="font-serif text-2xl font-bold tracking-wide text-[#4A3525]">Kairos Coffee</a>
            <div class="hidden md:flex space-x-6 text-sm font-medium text-[#4A3525]/80 items-center">
                <a href="#about" class="hover:text-[#4A3525] transition">About</a>
                <a href="#menu" class="hover:text-[#4A3525] transition">Coffee</a>
                <a href="#books" class="hover:text-[#4A3525] transition">Books</a>
                <a href="#spaces" class="hover:text-[#4A3525] transition">Spaces</a>
                <a href="#gallery" class="hover:text-[#4A3525] transition">Gallery</a>
                <a href="#reservasi" class="bg-[#4A3525] text-[#FBF9F4] px-4 py-2 rounded-full">Reservasi</a>

                @guest
                    <a href="{{ route('login.show') }}" class="hover:text-[#4A3525] transition">Login</a>
                    <a href="{{ route('register.show') }}" class="hover:text-[#4A3525] transition">Register</a>
                @endguest

                @auth
                    <span class="text-sm">Halo, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm hover:underline">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <section class="relative min-h-screen flex items-center justify-center bg-[#2C1A11] text-white px-6 text-center">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1600&auto=format&fit=crop" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A11] to-transparent"></div>
        </div>
        <div class="z-10 space-y-6">
            <h1 class="font-serif text-5xl md:text-7xl font-bold leading-tight">
                Escape the Noise,<br><span class="italic font-normal text-[#D4B996]">Find Your Story.</span>
            </h1>
            <p class="max-w-xl mx-auto text-white/80">A cozy Kairos Coffee where handcrafted coffee meets carefully curated books.</p>
            <div class="pt-6 flex flex-col sm:flex-row justify-center gap-4 font-semibold">
                <a href="#menu" class="bg-[#D4B996] text-[#2C1A11] px-8 py-3 rounded-full">Explore Menu</a>
                <a href="#books" class="border border-white/40 px-8 py-3 rounded-full">Discover Books</a>
            </div>
        </div>
    </section>

    <section id="about" class="py-24 max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">
        <div class="rounded-3xl overflow-hidden h-[400px] shadow-lg">
            <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?q=80&w=800" class="w-full h-full object-cover">
        </div>
        <div class="space-y-6">
            <h2 class="font-serif text-4xl font-bold text-[#4A3525]">More than just a Coffee Shop.</h2>
            <p class="text-[#4A3525]/80 text-lg">Kami percaya bahwa secangkir kopi terbaik dinikmati bersama cerita yang baik. Kairos Coffee hadir sebagai ruang nyaman untuk membaca, bekerja, dan menemukan inspirasi.</p>
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

    <section id="books" class="py-24 max-w-6xl mx-auto px-6 text-center">
        <h2 class="font-serif text-3xl font-bold text-[#4A3525] mb-12">Featured Collection</h2>
        <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
            <div class="p-4 border rounded-xl hover:bg-[#4A3525] hover:text-white transition">Fiction</div>
            <div class="p-4 border rounded-xl hover:bg-[#4A3525] hover:text-white transition">Self Dev</div>
            <div class="p-4 border rounded-xl hover:bg-[#4A3525] hover:text-white transition">Business</div>
            <div class="p-4 border rounded-xl hover:bg-[#4A3525] hover:text-white transition">Tech</div>
            <div class="p-4 border rounded-xl hover:bg-[#4A3525] hover:text-white transition">History</div>
            <div class="p-4 border rounded-xl hover:bg-[#4A3525] hover:text-white transition">Art</div>
        </div>
    </section>

    <section id="gallery" class="py-24 max-w-6xl mx-auto px-6">
        <h2 class="font-serif text-3xl font-bold text-[#4A3525] text-center mb-12">Kairos Coffee Gallery</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="h-64 rounded-2xl overflow-hidden bg-gray-200"><img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=400" class="w-full h-full object-cover"></div>
            <div class="h-80 rounded-2xl overflow-hidden bg-gray-200 md:row-span-2"><img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=400" class="w-full h-full object-cover"></div>
            <div class="h-48 rounded-2xl overflow-hidden bg-gray-200"><img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=400" class="w-full h-full object-cover"></div>
            <div class="h-64 rounded-2xl overflow-hidden bg-gray-200"><img src="https://images.unsplash.com/photo-1510519138101-570d1dca3d66?q=80&w=400" class="w-full h-full object-cover"></div>
            <div class="h-64 rounded-2xl overflow-hidden bg-gray-200"><img src="https://images.unsplash.com/photo-1463936575829-25148e1db1b8?q=80&w=400" class="w-full h-full object-cover"></div>
        </div>
    </section>


    <section class="py-28 bg-[#F7F2EA]">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">
            <p class="uppercase tracking-[0.3em] text-sm text-[#A78A6D]">
                Featured Collection
            </p>

            <h2 class="text-5xl font-serif font-bold text-[#4A3525] mt-3">
                Top Books Collection
            </h2>

            <p class="mt-4 text-gray-500 max-w-2xl mx-auto">
                Pilihan buku favorit pengunjung Kairos yang paling sering menemani
                secangkir kopi hangat.
            </p>
        </div>

        <div class="grid md:grid-cols-4 gap-8">

            <div class="group">
                <div class="overflow-hidden rounded-3xl shadow-lg">
                    <img
                        src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=700"
                        class="h-80 w-full object-cover group-hover:scale-105 transition duration-500">
                </div>

                <h3 class="font-bold text-lg mt-5 text-[#4A3525]">
                    Atomic Habits
                </h3>

                <p class="text-sm text-gray-500">
                    James Clear
                </p>
            </div>

            <div class="group">
                <div class="overflow-hidden rounded-3xl shadow-lg">
                    <img
                        src="https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=700"
                        class="h-80 w-full object-cover group-hover:scale-105 transition duration-500">
                </div>

                <h3 class="font-bold text-lg mt-5 text-[#4A3525]">
                    The Psychology of Money
                </h3>

                <p class="text-sm text-gray-500">
                    Morgan Housel
                </p>
            </div>

            <div class="group">
                <div class="overflow-hidden rounded-3xl shadow-lg">
                    <img
                        src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?q=80&w=700"
                        class="h-80 w-full object-cover group-hover:scale-105 transition duration-500">
                </div>

                <h3 class="font-bold text-lg mt-5 text-[#4A3525]">
                    Ikigai
                </h3>

                <p class="text-sm text-gray-500">
                    Héctor García
                </p>
            </div>

            <div class="group">
                <div class="overflow-hidden rounded-3xl shadow-lg">
                    <img
                        src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=700"
                        class="h-80 w-full object-cover group-hover:scale-105 transition duration-500">
                </div>

                <h3 class="font-bold text-lg mt-5 text-[#4A3525]">
                    Rich Dad Poor Dad
                </h3>

                <p class="text-sm text-gray-500">
                    Robert T. Kiyosaki
                </p>
            </div>

        </div>
    </div>
</section>

    <section id="reservasi" class="py-24 max-w-3xl mx-auto px-6">
        <div class="bg-white border rounded-3xl p-10 text-center shadow-lg">
            <h2 class="font-serif text-3xl font-bold text-[#4A3525] mb-4">Booking Your Seat</h2>
            <form onsubmit="event.preventDefault(); alert('Ini cuma coba-coba visual dulu!');" class="space-y-4">
                <div class="grid md:grid-cols-2 gap-4">
                    <input type="text" placeholder="Nama" class="w-full p-3 border rounded-xl">
                    <input type="email" placeholder="Email" class="w-full p-3 border rounded-xl">
                </div>
                <button type="submit" class="w-full bg-[#4A3525] text-white py-4 rounded-xl font-bold">Coba Klik Saya</button>
            </form>
        </div>
    </section>

    <footer class="bg-[#2C1A11] text-white/50 py-10 text-center text-sm">
        <p>© 2026 Kairos Coffee Visual Demo. No Database Connected.</p>
    </footer>

</body>
</html>