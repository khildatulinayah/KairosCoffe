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
                    },
                    boxShadow: {
                        glow: '0 30px 80px rgba(44,26,17,0.14)',
                    },
                }
            }
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            opacity: 0;
            transition: opacity .8s ease;
            background-color: #FBF9F4;
        }

        body.loaded {
            opacity: 1;
        }

        #pageLoader {
            position: fixed;
            inset: 0;
            z-index: 60;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(15, 10, 7, 0.9);
        }

        #pageLoader .loader-ring {
            width: 72px;
            height: 72px;
            border: 6px solid rgba(212, 185, 150, 0.18);
            border-top-color: rgba(212, 185, 150, 0.95);
            border-radius: 50%;
            animation: spin 1.1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-14px); }
        }

        .animate-float {
            animation: float 7s ease-in-out infinite;
        }
    </style>
</head>

<body class="text-[#2C1A11] font-sans overflow-x-hidden">

<div id="pageLoader">
    <div class="text-center text-white">
        <div class="loader-ring mx-auto mb-6"></div>
        <p class="text-sm uppercase tracking-[0.35em] text-white/70">Memuat Kairos...</p>
    </div>
</div>

<!-- NAVBAR -->
<nav class="fixed inset-x-0 top-6 z-50 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between gap-4 rounded-full border border-white/30 bg-white/20 px-5 py-4 shadow-glow backdrop-blur-3xl backdrop-saturate-150">
            <a href="#" class="inline-flex items-center gap-3 leading-none">
                <div class="h-12 w-12 rounded-full bg-[#4A3525] flex items-center justify-center text-white text-lg font-semibold shadow-lg">K</div>
                <div>
                    <h1 class="font-serif text-xl font-bold text-[#4A3525]">Kairos</h1>
                    <p class="text-[10px] uppercase tracking-[0.3em] text-[#7D6E65]">Coffee • Books • Silence</p>
                </div>
            </a>

            <div class="hidden items-center gap-8 text-sm font-medium md:flex text-[#2C1A11]/90">
                <a href="#about" class="transition hover:text-[#D4B996]">About</a>
                <a href="#menu" class="transition hover:text-[#D4B996]">Collection</a>
                <a href="#spaces" class="transition hover:text-[#D4B996]">Spaces</a>
                <a href="#gallery" class="transition hover:text-[#D4B996]">Gallery</a>
                <a href="#reservasi" class="rounded-full bg-[#4A3525] px-5 py-3 text-white transition hover:bg-[#2C1A11]">Reserve</a>
                @guest
                    <div class="flex items-center gap-3">
                        <a href="{{ route('login.show') }}" class="rounded-full border border-[#4A3525]/20 px-4 py-2 transition hover:bg-white">Login</a>
                        <a href="{{ route('register.show') }}" class="rounded-full bg-[#D4B996] px-4 py-2 text-[#2C1A11] transition hover:bg-[#e4caa8]">Register</a>
                    </div>
                @endguest
                @auth
                    <div class="flex items-center gap-4">
                        <span>Halo, {{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="rounded-full border border-[#4A3525]/20 px-4 py-2 transition">Logout</button>
                        </form>
                    </div>
                @endauth
            </div>

            <button id="mobileMenuButton" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/30 bg-white/70 text-[#2C1A11] shadow-lg backdrop-blur-xl md:hidden">
                <span class="text-xl">☰</span>
            </button>
        </div>

        <div id="mobileMenu" class="mt-4 hidden rounded-[32px] border border-white/25 bg-white/85 p-5 shadow-glow backdrop-blur-3xl md:hidden">
            <div class="space-y-4">
                <a href="#about" class="block rounded-2xl px-4 py-3 text-sm font-medium text-[#4A3525] transition hover:bg-[#F3ECE3]">About</a>
                <a href="#menu" class="block rounded-2xl px-4 py-3 text-sm font-medium text-[#4A3525] transition hover:bg-[#F3ECE3]">Collection</a>
                <a href="#spaces" class="block rounded-2xl px-4 py-3 text-sm font-medium text-[#4A3525] transition hover:bg-[#F3ECE3]">Spaces</a>
                <a href="#gallery" class="block rounded-2xl px-4 py-3 text-sm font-medium text-[#4A3525] transition hover:bg-[#F3ECE3]">Gallery</a>
                <a href="#reservasi" class="block rounded-2xl bg-[#4A3525] px-4 py-3 text-center text-sm font-semibold text-white transition hover:bg-[#2C1A11]">Reserve</a>
                @guest
                    <a href="{{ route('login.show') }}" class="block rounded-2xl border border-[#4A3525]/20 px-4 py-3 text-center text-sm font-medium transition hover:bg-white">Login</a>
                    <a href="{{ route('register.show') }}" class="block rounded-2xl bg-[#D4B996] px-4 py-3 text-center text-sm font-semibold text-[#2C1A11] transition hover:bg-[#e4caa8]">Register</a>
                @endguest
                @auth
                    <div class="rounded-2xl border border-[#E5D8C3] bg-[#FBF9F4] p-4 text-sm text-[#2C1A11]">Halo, <span class="font-semibold">{{ auth()->user()->name }}</span></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full rounded-2xl border border-[#4A3525]/20 bg-white px-4 py-3 text-sm font-medium text-[#2C1A11] transition hover:bg-[#FBF9F4]">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="relative min-h-screen overflow-hidden">
    <div class="absolute inset-0 hero-parallax">
        <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1800&auto=format&fit=crop" class="h-full w-full object-cover brightness-[0.65]" />
        <div class="absolute inset-0 bg-gradient-to-b from-[#2C1A11]/60 via-black/20 to-[#FBF9F4]/0"></div>
        <div class="absolute left-1/2 top-12 h-72 w-72 -translate-x-1/2 rounded-full bg-[#D4B996]/20 blur-3xl"></div>
        <div class="absolute right-20 top-32 h-48 w-48 rounded-full bg-[#FBF9F4]/30 blur-3xl"></div>
        <div class="absolute left-10 bottom-24 h-44 w-44 rounded-full bg-[#4A3525]/20 blur-3xl animate-float"></div>
    </div>

    <div class="relative z-10 px-6 pt-28 pb-24">
        <div class="max-w-6xl mx-auto">
            <div class="max-w-3xl mx-auto text-center" data-aos="fade-up" data-aos-duration="1200">
                <span class="inline-flex items-center gap-3 rounded-full bg-white/10 px-5 py-2 text-xs uppercase tracking-[0.35em] text-[#D4B996] shadow-lg shadow-black/10 backdrop-blur-lg">
                    <span class="h-2 w-2 rounded-full bg-[#D4B996]"></span>
                    Sanctuary Since 2026
                </span>

                <h1 class="mt-10 text-5xl sm:text-6xl lg:text-7xl font-serif font-black leading-tight text-white">
                    Luxury coffee. Curated library. <span class="text-[#D4B996]">A calm, cinematic experience.</span>
                </h1>

                <p class="mx-auto mt-8 max-w-2xl text-lg sm:text-xl text-white/80 leading-relaxed">
                    Kairos menghadirkan tempat premium bagi pecinta kopi dan pembaca sejati — suasana hangat, koleksi istimewa, dan nilai estetika yang lembut.
                </p>

                <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
                    <a href="#menu" class="rounded-full bg-[#D4B996] px-10 py-4 text-sm font-semibold text-[#2C1A11] transition hover:bg-white hover:text-[#2C1A11]">Explore Collection</a>
                    <a href="#books" class="rounded-full border border-white/25 bg-white/10 px-10 py-4 text-sm text-white transition hover:border-[#D4B996] hover:bg-white/15">Discover Books</a>
                </div>
            </div>

            <div class="mt-16 rounded-[40px] border border-white/15 bg-white/10 p-6 shadow-glow backdrop-blur-xl" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                <div class="grid gap-6 md:grid-cols-3">
                    <div class="rounded-[32px] bg-white/90 p-6 text-center shadow-lg">
                        <p class="text-3xl font-bold text-[#4A3525]" data-count="1200">1200+</p>
                        <p class="mt-2 text-sm uppercase tracking-[0.3em] text-[#7D6E65]">Books</p>
                    </div>
                    <div class="rounded-[32px] bg-white/90 p-6 text-center shadow-lg">
                        <p class="text-3xl font-bold text-[#4A3525]" data-count="5000">5K+</p>
                        <p class="mt-2 text-sm uppercase tracking-[0.3em] text-[#7D6E65]">Coffee Served</p>
                    </div>
                    <div class="rounded-[32px] bg-white/90 p-6 text-center shadow-lg">
                        <p class="text-3xl font-bold text-[#4A3525]">4.9★</p>
                        <p class="mt-2 text-sm uppercase tracking-[0.3em] text-[#7D6E65]">Rating</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section id="about" class="py-28">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid gap-20 lg:grid-cols-[1.03fr_.97fr] items-center">
            <div class="relative overflow-hidden rounded-[48px] shadow-glow">
                <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?q=80&w=1200" class="h-full w-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A11]/80 via-transparent to-[#D4B996]/15"></div>
            </div>

            <div>
                <p class="uppercase tracking-[0.3em] text-sm text-[#D4B996]">About Kairos</p>
                <h2 class="font-serif text-5xl font-bold text-[#4A3525] mt-4 leading-tight">More Than Just A Coffee Shop.</h2>
                <p class="mt-8 text-lg text-[#4A3525]/80 leading-relaxed">Kami percaya bahwa secangkir kopi terbaik dinikmati bersama sebuah cerita. Kairos hadir sebagai ruang nyaman untuk membaca, bekerja, dan menemukan inspirasi dalam nuansa hangat yang elegan.</p>

                <div class="mt-12 grid gap-5 sm:grid-cols-3">
                    <div class="rounded-[30px] border border-[#E8DED4] bg-[#FBF9F4] p-6 shadow-lg">
                        <p class="text-xl font-semibold text-[#4A3525]">Artisan Blend</p>
                        <p class="mt-2 text-sm text-[#7D6E65]">Kopi pilihan dengan karakter hangat dan halus.</p>
                    </div>
                    <div class="rounded-[30px] border border-[#E8DED4] bg-[#FBF9F4] p-6 shadow-lg">
                        <p class="text-xl font-semibold text-[#4A3525]">Curated Library</p>
                        <p class="mt-2 text-sm text-[#7D6E65]">Koleksi buku terbaik untuk setiap mood dan suasana.</p>
                    </div>
                    <div class="rounded-[30px] border border-[#E8DED4] bg-[#FBF9F4] p-6 shadow-lg">
                        <p class="text-xl font-semibold text-[#4A3525]">Quiet Atmosphere</p>
                        <p class="mt-2 text-sm text-[#7D6E65]">Ruang yang tenang untuk berkarya dan bersantai.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SPACES -->
<section id="spaces" class="py-28 bg-[#FBF9F4]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <p class="uppercase tracking-[0.3em] text-sm text-[#A78A6D]">Spaces</p>
            <h2 class="font-serif text-5xl font-bold text-[#4A3525] mt-3">Ruang Santai & Produktif</h2>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Nikmati suasana yang dirancang untuk produktivitas dan ketenangan, lengkap dengan sudut baca serta meja private.</p>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            <div class="rounded-[32px] border border-[#E8DED4] bg-white p-8 shadow-lg transition hover:-translate-y-2 hover:shadow-2xl">
                <p class="text-sm uppercase tracking-[0.3em] text-[#D4B996]">Private Lounge</p>
                <h3 class="mt-4 text-2xl font-semibold text-[#4A3525]">Luxury Corner</h3>
                <p class="mt-3 text-sm text-[#7D6E65]">Ruang eksklusif dengan kursi empuk dan pencahayaan lembut.</p>
            </div>
            <div class="rounded-[32px] border border-[#E8DED4] bg-white p-8 shadow-lg transition hover:-translate-y-2 hover:shadow-2xl">
                <p class="text-sm uppercase tracking-[0.3em] text-[#D4B996]">Community Table</p>
                <h3 class="mt-4 text-2xl font-semibold text-[#4A3525]">Creative Space</h3>
                <p class="mt-3 text-sm text-[#7D6E65]">Meja bersama untuk diskusi dan kolaborasi ringan.</p>
            </div>
            <div class="rounded-[32px] border border-[#E8DED4] bg-white p-8 shadow-lg transition hover:-translate-y-2 hover:shadow-2xl">
                <p class="text-sm uppercase tracking-[0.3em] text-[#D4B996]">Quiet Nook</p>
                <h3 class="mt-4 text-2xl font-semibold text-[#4A3525]">Reading Corner</h3>
                <p class="mt-3 text-sm text-[#7D6E65]">Sudut tenang dengan rak buku dan aroma kopi lembut.</p>
            </div>
        </div>
    </div>
</section>

<!-- COFFEE COLLECTION -->
<section id="menu" class="py-28">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <p class="uppercase tracking-[0.3em] text-sm text-[#A78A6D]">Coffee Collection</p>
            <h2 class="font-serif text-5xl font-bold text-[#4A3525] mt-3">Premium Menu Highlights</h2>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Pilih dari koleksi menu premium kami, mulai dari espresso klasik hingga signature brew untuk pengalaman istimewa.</p>
        </div>

        <div class="grid gap-8 md:grid-cols-3">
            @forelse(($menus ?? collect()) as $menu)
                <article class="group overflow-hidden rounded-[40px] border border-[#E8DED4] bg-[#FBF9F4] shadow-lg transition duration-500 hover:-translate-y-2 hover:shadow-[0_35px_90px_rgba(44,26,17,0.14)]">
                    <div class="relative overflow-hidden">
                        <img src="{{ $menu->image ? asset('storage/' . $menu->image) : 'https://images.unsplash.com/photo-1511920170033-f8396924c348?q=80&w=900' }}" alt="{{ $menu->name }}" class="h-72 w-full object-cover transition duration-700 group-hover:scale-105" />
                        <span class="absolute left-5 top-5 rounded-full bg-[#FBF9F4]/80 px-4 py-2 text-xs uppercase tracking-[0.3em] text-[#4A3525] shadow-xl">{{ $menu->category->name ?? 'Menu' }}</span>
                    </div>
                    <div class="space-y-4 p-7">
                        <div class="flex items-center justify-between gap-4">
                            <h3 class="text-2xl font-semibold text-[#4A3525]">{{ $menu->name }}</h3>
                            <span class="rounded-full bg-[#D4B996]/15 px-4 py-2 text-sm font-semibold text-[#4A3525]">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                        </div>
                        <p class="text-sm leading-7 text-[#7D6E65]">{{ Str::limit($menu->description, 100) }}</p>
                        <div class="flex items-center justify-between gap-3">
                            <span class="inline-flex items-center rounded-full bg-[#4A3525] px-4 py-2 text-xs font-semibold text-white">Bestseller</span>
                            <button class="rounded-full bg-[#D4B996] px-5 py-3 text-sm font-semibold text-[#2C1A11] transition hover:bg-white">Order Now</button>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full text-center text-gray-500 py-10">Menu unggulan belum tersedia.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- BOOK CATEGORIES -->
<section id="books" class="py-28 bg-[#FBF9F4]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <p class="uppercase tracking-[0.3em] text-sm text-[#A78A6D]">Explore Books</p>
            <h2 class="font-serif text-5xl font-bold text-[#4A3525] mt-3">Featured Collection</h2>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Temukan berbagai kategori buku pilihan yang dirancang untuk menemani waktu santai dan produktifmu.</p>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            @forelse(($bookCategories ?? collect()) as $category)
                <a href="{{ route('book-categories.show', $category) }}" class="group overflow-hidden rounded-[40px] border border-[#E8DED4] bg-white p-8 shadow-lg transition duration-500 hover:-translate-y-2 hover:shadow-[0_35px_90px_rgba(44,26,17,0.14)]">
                    <div class="flex h-16 w-16 items-center justify-center rounded-3xl bg-[#F3ECE3] text-3xl transition group-hover:scale-105">📚</div>
                    <h3 class="mt-6 text-2xl font-semibold text-[#4A3525]">{{ $category->name }}</h3>
                    <p class="mt-3 text-sm text-[#7D6E65]">Temukan pilihan buku terbaik di kategori ini.</p>
                </a>
            @empty
                <div class="col-span-full text-center text-gray-500 py-10">Kategori buku belum tersedia.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- GALLERY -->
<section id="gallery" class="py-28">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <p class="uppercase tracking-[0.3em] text-sm text-[#A78A6D]">Atmosphere</p>
            <h2 class="font-serif text-5xl font-bold text-[#4A3525] mt-3">Kairos Gallery</h2>
        </div>

        <div class="grid gap-6 md:grid-cols-5">
            <div class="group relative overflow-hidden rounded-[36px] md:col-span-2 md:row-span-2 shadow-lg">
                <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=900" class="h-full w-full object-cover transition duration-700 group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A11]/40 via-transparent to-transparent"></div>
            </div>
            <div class="group overflow-hidden rounded-[36px] shadow-lg">
                <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=900" class="h-[340px] w-full object-cover transition duration-700 group-hover:scale-105" />
            </div>
            <div class="group overflow-hidden rounded-[36px] shadow-lg">
                <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=900" class="h-[340px] w-full object-cover transition duration-700 group-hover:scale-105" />
            </div>
            <div class="group overflow-hidden rounded-[36px] shadow-lg">
                <img src="https://images.unsplash.com/photo-1510519138101-570d1dca3d66?q=80&w=900" class="h-[340px] w-full object-cover transition duration-700 group-hover:scale-105" />
            </div>
        </div>
    </div>
</section>

<!-- TOP BOOKS -->
<section class="py-28 bg-[#F7F2EA]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <p class="uppercase tracking-[0.3em] text-sm text-[#A78A6D]">Featured Collection</p>
            <h2 class="font-serif text-5xl font-bold text-[#4A3525] mt-3">Top Books Collection</h2>
            <p class="mt-4 text-gray-500 max-w-2xl mx-auto">Pilihan buku favorit pengunjung Kairos yang paling sering menemani secangkir kopi hangat.</p>
        </div>

        <div class="grid gap-8 md:grid-cols-4">
            @forelse(($topBooks ?? collect()) as $book)
                <div class="group overflow-hidden rounded-[40px] bg-white p-5 shadow-lg transition duration-500 hover:-translate-y-2 hover:shadow-[0_35px_90px_rgba(44,26,17,0.14)]">
                    <div class="overflow-hidden rounded-[28px] border border-[#E8DED4]">
                        <img src="{{ $book->cover ? asset('storage/' . $book->cover) : 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=700' }}" class="h-80 w-full object-cover transition duration-700 group-hover:scale-105" />
                    </div>
                    <div class="mt-6">
                        <span class="inline-flex items-center rounded-full bg-[#F3ECE3] px-4 py-2 text-xs font-semibold text-[#4A3525]">Top Choice</span>
                    </div>
                    <h3 class="mt-5 font-serif text-2xl text-[#4A3525]">{{ $book->title }}</h3>
                    <p class="mt-3 text-sm text-[#7D6E65]">{{ $book->author }}</p>
                    <button type="button" data-book-detail class="mt-6 w-full rounded-full bg-[#4A3525] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#2C1A11]"
                        data-book-title="{{ $book->title }}"
                        data-book-author="{{ $book->author }}"
                        data-book-category="{{ $book->category->name ?? '' }}"
                        data-book-stock="{{ $book->stock ?? 0 }}"
                        data-book-description="{{ $book->description }}"
                        data-book-image="{{ $book->cover ? asset('storage/' . $book->cover) : '' }}"
                        data-book-action-url="/book-categories/{{ $book->category_id }}">Lihat Detail</button>
                </div>
            @empty
                <div class="md:col-span-4 text-center text-gray-500 py-10">Buku unggulan belum tersedia.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- RESERVATION -->
<section id="reservasi" class="py-28 bg-[#1D120C]">
    <div class="max-w-4xl mx-auto px-6">
        <div class="rounded-[40px] bg-white p-10 md:p-14 shadow-glow">
            <div class="text-center mb-10">
                <p class="uppercase tracking-[0.3em] text-sm text-[#A78A6D]">Reservation</p>
                <h2 class="font-serif text-5xl font-bold text-[#4A3525] mt-3">Reserve Your Corner</h2>
                <p class="text-gray-500 mt-4">Temukan sudut favoritmu untuk membaca, bekerja, atau menikmati kopi hangat.</p>
            </div>

            <form class="space-y-6">
                <div class="grid gap-5 md:grid-cols-2">
                    <input type="text" placeholder="Nama Lengkap" class="w-full rounded-[28px] border border-[#E6DCCB] bg-[#FBF9F4] px-6 py-4 text-sm text-[#2C1A11] outline-none transition focus:border-[#D4B996] focus:ring-2 focus:ring-[#D4B996]/30" />
                    <input type="email" placeholder="Email" class="w-full rounded-[28px] border border-[#E6DCCB] bg-[#FBF9F4] px-6 py-4 text-sm text-[#2C1A11] outline-none transition focus:border-[#D4B996] focus:ring-2 focus:ring-[#D4B996]/30" />
                </div>
                <div class="grid gap-5 md:grid-cols-2">
                    <input type="date" class="w-full rounded-[28px] border border-[#E6DCCB] bg-[#FBF9F4] px-6 py-4 text-sm text-[#2C1A11] outline-none transition focus:border-[#D4B996] focus:ring-2 focus:ring-[#D4B996]/30" />
                    <input type="number" placeholder="Jumlah Orang" class="w-full rounded-[28px] border border-[#E6DCCB] bg-[#FBF9F4] px-6 py-4 text-sm text-[#2C1A11] outline-none transition focus:border-[#D4B996] focus:ring-2 focus:ring-[#D4B996]/30" />
                </div>
                <button class="w-full rounded-[28px] bg-[#4A3525] py-5 text-sm font-bold uppercase tracking-[0.15em] text-white transition hover:bg-[#2C1A11]">Check Availability</button>
            </form>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-[#120B07]">
    <div class="max-w-6xl mx-auto py-24 px-6">
        <div class="grid gap-12 lg:grid-cols-3">
            <div>
                <h2 class="font-serif text-5xl text-white">Kairos</h2>
                <p class="text-white/50 mt-4 tracking-[0.25em] uppercase text-xs">Coffee • Books • Silence</p>
            </div>
            <div>
                <p class="text-white font-semibold mb-4">Contact</p>
                <p class="text-white/50 text-sm">hello@kairoscoffee.id</p>
                <p class="text-white/50 text-sm mt-2">+62 21 1234 5678</p>
            </div>
            <div>
                <p class="text-white font-semibold mb-4">Follow Us</p>
                <div class="flex flex-wrap gap-4">
                    <span class="inline-flex h-10 min-w-[3rem] items-center justify-center rounded-full border border-white/15 bg-white/5 text-white/70">IG</span>
                    <span class="inline-flex h-10 min-w-[3rem] items-center justify-center rounded-full border border-white/15 bg-white/5 text-white/70">FB</span>
                    <span class="inline-flex h-10 min-w-[3rem] items-center justify-center rounded-full border border-white/15 bg-white/5 text-white/70">TW</span>
                </div>
            </div>
        </div>
        <div class="mt-14 border-t border-white/10 pt-10 text-center text-xs text-white/30">© 2026 Kairos Coffee. All Rights Reserved.</div>
    </div>
</footer>

@include('partials.book-detail-modal')

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    window.addEventListener('load', function () {
        document.body.classList.add('loaded');
        const loader = document.getElementById('pageLoader');
        if (loader) {
            loader.style.opacity = '0';
            setTimeout(() => loader.remove(), 600);
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        AOS.init({
            duration: 900,
            once: true,
            easing: 'ease-out-cubic',
            offset: 120,
        });

        const mobileToggle = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileToggle && mobileMenu) {
            mobileToggle.addEventListener('click', function () {
                mobileMenu.classList.toggle('hidden');
            });
        }

        const heroParallax = document.querySelector('.hero-parallax');
        if (heroParallax) {
            window.addEventListener('scroll', function () {
                const offset = window.scrollY * 0.18;
                heroParallax.style.transform = `translate3d(0, ${offset}px, 0)`;
            });
        }

        const counters = document.querySelectorAll('[data-count]');
        counters.forEach((counter) => {
            const target = parseInt(counter.getAttribute('data-count'), 10);
            let current = 0;
            const step = Math.ceil(target / 80);
            const update = () => {
                current += step;
                if (current > target) current = target;
                counter.textContent = current.toLocaleString();
                if (current < target) requestAnimationFrame(update);
            };
            update();
        });
    });
</script>
</body>
</html>
