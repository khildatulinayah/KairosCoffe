<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kairos Coffee — ruang premium untuk pecinta kopi dan pembaca sejati. Kopi artisan, perpustakaan terkurasi, dan suasana tenang.">
    <meta name="theme-color" content="#2C1A11">
    <title>Kairos Coffee — Coffee • Books • Silence</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream: '#FBF9F4',
                        sand: '#F3ECE3',
                        espresso: '#2C1A11',
                        coffee: '#4A3525',
                        gold: '#D4B996',
                        goldsoft: '#E4CAA8',
                        mocha: '#7D6E65',
                        taupe: '#A78A6D',
                        line: '#E8DED4',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    boxShadow: {
                        glow: '0 30px 80px rgba(44,26,17,0.14)',
                        soft: '0 18px 45px rgba(44,26,17,0.08)',
                        card: '0 35px 90px rgba(44,26,17,0.14)',
                    },
                    keyframes: {
                        float: {
                            '0%,100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-14px)' },
                        },
                        shimmer: {
                            '0%': { backgroundPosition: '-200% 0' },
                            '100%': { backgroundPosition: '200% 0' },
                        },
                    },
                    animation: {
                        float: 'float 7s ease-in-out infinite',
                    },
                }
            }
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

    <style>
        html { scroll-behavior: smooth; }

        body {
            opacity: 0;
            transition: opacity .8s ease;
            background-color: #FBF9F4;
        }
        body.loaded { opacity: 1; }

        /* Scroll progress bar */
        #scrollProgress {
            position: fixed;
            top: 0; left: 0;
            height: 3px;
            width: 0%;
            z-index: 70;
            background: linear-gradient(90deg, #D4B996, #4A3525);
            transition: width .1s linear;
        }

        #pageLoader {
            position: fixed;
            inset: 0;
            z-index: 80;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at center, #1c120c 0%, #0f0a07 100%);
        }
        #pageLoader .loader-ring {
            width: 72px; height: 72px;
            border: 6px solid rgba(212, 185, 150, 0.18);
            border-top-color: rgba(212, 185, 150, 0.95);
            border-radius: 50%;
            animation: spin 1.1s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* Nav link underline */
        .nav-link { position: relative; }
        .nav-link::after {
            content: '';
            position: absolute;
            left: 0; bottom: -6px;
            height: 2px; width: 0%;
            background: #D4B996;
            transition: width .35s ease;
        }
        .nav-link:hover::after,
        .nav-link.is-active::after { width: 100%; }
        .nav-link.is-active { color: #4A3525; }

        /* Section eyebrow line */
        .eyebrow { display:inline-flex; align-items:center; gap:.75rem; }
        .eyebrow::before {
            content:''; width: 34px; height: 1px; background: currentColor; opacity:.6;
        }
        .eyebrow.center::after {
            content:''; width: 34px; height: 1px; background: currentColor; opacity:.6;
        }

        /* Marquee */
        .marquee { display:flex; gap:4rem; width:max-content; animation: marquee 26s linear infinite; }
        @keyframes marquee { to { transform: translateX(-50%); } }

        /* Back to top */
        #backToTop {
            opacity: 0;
            visibility: hidden;
            transform: translateY(16px);
            transition: all .35s ease;
        }
        #backToTop.show { opacity: 1; visibility: visible; transform: translateY(0); }

        @media (prefers-reduced-motion: reduce) {
            * { animation: none !important; transition: none !important; scroll-behavior: auto !important; }
        }
    </style>
</head>

<body class="text-espresso font-sans overflow-x-hidden antialiased selection:bg-gold/40">

<div id="scrollProgress"></div>

<div id="pageLoader">
    <div class="text-center text-white">
        <div class="loader-ring mx-auto mb-6"></div>
        <p class="text-sm uppercase tracking-[0.35em] text-white/70">Memuat Kairos...</p>
    </div>
</div>

<!-- NAVBAR -->
<nav id="kairosNavbar" class="fixed inset-x-0 top-4 z-50 px-4 sm:px-6 transition-all duration-500">
    <div class="max-w-7xl mx-auto">
        <div id="navShell" class="flex items-center justify-between gap-4 rounded-full border border-white/35 bg-white/15 px-4 sm:px-5 py-3 shadow-glow backdrop-blur-3xl backdrop-saturate-150 ring-1 ring-white/10 transition-all duration-500">
            <a href="#" class="inline-flex items-center gap-3 leading-none">
                <div class="h-11 w-11 rounded-full bg-coffee flex items-center justify-center text-white text-lg font-semibold shadow-lg ring-2 ring-gold/40">K</div>
                <div>
                    <h1 class="font-serif text-xl font-bold text-coffee">Kairos</h1>
                    <p class="text-[10px] uppercase tracking-[0.3em] text-mocha">Coffee • Books • Silence</p>
                </div>
            </a>

            <div class="hidden items-center gap-7 text-sm font-medium lg:flex text-espresso/90">
                <a href="#about" class="nav-link transition hover:text-coffee">About</a>
                <a href="#menu" class="nav-link transition hover:text-coffee">Collection</a>
                <a href="#spaces" class="nav-link transition hover:text-coffee">Spaces</a>
                <a href="#gallery" class="nav-link transition hover:text-coffee">Gallery</a>
                <a href="#reservasi" class="inline-flex items-center gap-2 rounded-full bg-coffee px-5 py-2.5 text-white transition hover:bg-espresso hover:shadow-lg">
                    Reserve
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
                @guest
                    <div class="flex items-center gap-3">
                        <a href="{{ route('login.show') }}" class="rounded-full border border-coffee/20 px-4 py-2 transition hover:bg-white">Login</a>
                        <a href="{{ route('register.show') }}" class="rounded-full bg-gold px-4 py-2 text-espresso font-semibold transition hover:bg-goldsoft">Register</a>
                    </div>
                @endguest
                @auth
                    <div class="flex items-center gap-3">
                        <span class="text-sm">Halo, <span class="font-semibold text-coffee">{{ auth()->user()->name }}</span></span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="rounded-full border border-coffee/20 px-4 py-2 transition hover:bg-white">Logout</button>
                        </form>
                    </div>
                @endauth
            </div>

            <button id="mobileMenuButton" aria-label="Buka menu" aria-expanded="false" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/30 bg-white/70 text-espresso shadow-lg backdrop-blur-xl lg:hidden">
                <svg id="menuIconOpen" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
                <svg id="menuIconClose" class="hidden h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M6 6l12 12M18 6L6 18"/></svg>
            </button>
        </div>

        <div id="mobileMenu" class="mt-3 hidden origin-top rounded-[32px] border border-white/25 bg-white/90 p-5 shadow-glow backdrop-blur-3xl lg:hidden">
            <div class="space-y-2">
                <a href="#about" data-mobile-link class="block rounded-2xl px-4 py-3 text-sm font-medium text-coffee transition hover:bg-sand">About</a>
                <a href="#menu" data-mobile-link class="block rounded-2xl px-4 py-3 text-sm font-medium text-coffee transition hover:bg-sand">Collection</a>
                <a href="#spaces" data-mobile-link class="block rounded-2xl px-4 py-3 text-sm font-medium text-coffee transition hover:bg-sand">Spaces</a>
                <a href="#gallery" data-mobile-link class="block rounded-2xl px-4 py-3 text-sm font-medium text-coffee transition hover:bg-sand">Gallery</a>
                <a href="#reservasi" data-mobile-link class="block rounded-2xl bg-coffee px-4 py-3 text-center text-sm font-semibold text-white transition hover:bg-espresso">Reserve</a>
                @guest
                    <a href="{{ route('login.show') }}" class="block rounded-2xl border border-coffee/20 px-4 py-3 text-center text-sm font-medium transition hover:bg-white">Login</a>
                    <a href="{{ route('register.show') }}" class="block rounded-2xl bg-gold px-4 py-3 text-center text-sm font-semibold text-espresso transition hover:bg-goldsoft">Register</a>
                @endguest
                @auth
                    <div class="rounded-2xl border border-line bg-cream p-4 text-sm text-espresso">Halo, <span class="font-semibold">{{ auth()->user()->name }}</span></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full rounded-2xl border border-coffee/20 bg-white px-4 py-3 text-sm font-medium text-espresso transition hover:bg-cream">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="relative min-h-screen overflow-hidden">
    <div class="absolute inset-0 hero-parallax">
        <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1800&auto=format&fit=crop" alt="Suasana hangat Kairos Coffee" class="h-[115%] w-full object-cover brightness-[0.6]" />
        <div class="absolute inset-0 bg-gradient-to-b from-espresso/70 via-espresso/35 to-cream"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-espresso/40 via-transparent to-transparent"></div>
        <div class="absolute left-1/2 top-12 h-72 w-72 -translate-x-1/2 rounded-full bg-gold/20 blur-3xl"></div>
        <div class="absolute right-20 top-32 h-48 w-48 rounded-full bg-cream/20 blur-3xl"></div>
        <div class="absolute left-10 bottom-24 h-44 w-44 rounded-full bg-coffee/30 blur-3xl animate-float"></div>
    </div>

    <div class="relative z-10 px-6 pt-36 pb-28">
        <div class="max-w-6xl mx-auto">
            <div class="max-w-3xl mx-auto text-center" data-aos="fade-up" data-aos-duration="1100">
                <span class="inline-flex items-center gap-3 rounded-full border border-white/15 bg-white/10 px-5 py-2 text-xs uppercase tracking-[0.35em] text-gold shadow-lg shadow-black/10 backdrop-blur-lg">
                    <span class="h-2 w-2 rounded-full bg-gold animate-float"></span>
                    Sanctuary Since 2026
                </span>

                <h1 class="mt-8 text-4xl sm:text-6xl lg:text-7xl font-serif font-extrabold leading-[1.08] text-white">
                    Luxury coffee. Curated library.
                    <span class="block bg-gradient-to-r from-gold via-goldsoft to-gold bg-clip-text text-transparent">A calm, cinematic experience.</span>
                </h1>

                <p class="mx-auto mt-7 max-w-2xl text-lg sm:text-xl text-white/85 leading-relaxed">
                    Kairos menghadirkan tempat premium bagi pecinta kopi dan pembaca sejati — suasana hangat, koleksi istimewa, dan nilai estetika yang lembut.
                </p>

                <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
                    <a href="#menu" class="group inline-flex items-center gap-2 rounded-full bg-gold px-9 py-4 text-sm font-semibold text-espresso shadow-lg transition hover:bg-white">
                        Explore Collection
                        <svg class="h-4 w-4 transition group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    </a>
                    <a href="#books" class="rounded-full border border-white/25 bg-white/10 px-9 py-4 text-sm text-white backdrop-blur-md transition hover:border-gold hover:bg-white/15">Discover Books</a>
                </div>
            </div>

            <div class="mt-16 rounded-[40px] border border-white/15 bg-white/10 p-5 sm:p-6 shadow-glow backdrop-blur-xl" data-aos="fade-up" data-aos-duration="1100" data-aos-delay="200">
                <div class="grid gap-5 md:grid-cols-3">
                    <div class="flex items-center gap-4 rounded-[28px] bg-white/90 p-6 shadow-soft">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-sand text-coffee">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                        </span>
                        <div class="text-left">
                            <p class="text-3xl font-bold text-coffee" data-count="1200">1200+</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.3em] text-mocha">Books</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 rounded-[28px] bg-white/90 p-6 shadow-soft">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-sand text-coffee">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><path d="M6 1v3M10 1v3M14 1v3"/></svg>
                        </span>
                        <div class="text-left">
                            <p class="text-3xl font-bold text-coffee" data-count="5000">5K+</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.3em] text-mocha">Coffee Served</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 rounded-[28px] bg-white/90 p-6 shadow-soft">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-sand text-coffee">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        </span>
                        <div class="text-left">
                            <p class="text-3xl font-bold text-coffee">4.9★</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.3em] text-mocha">Rating</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="#about" class="absolute bottom-8 left-1/2 z-10 -translate-x-1/2 text-white/70 transition hover:text-white" aria-label="Scroll ke bawah">
        <span class="flex h-11 w-7 items-start justify-center rounded-full border border-white/40 p-1.5">
            <span class="h-2 w-1 animate-bounce rounded-full bg-white/80"></span>
        </span>
    </a>
</section>

<!-- MARQUEE -->
<div class="border-y border-line bg-coffee py-4 overflow-hidden">
    <div class="marquee text-cream/80 text-sm uppercase tracking-[0.3em]">
        @php $marquee = ['Artisan Roast','Curated Library','Quiet Atmosphere','Single Origin','Slow Reading','Warm Hospitality']; @endphp
        @for ($i = 0; $i < 2; $i++)
            @foreach ($marquee as $m)
                <span class="inline-flex items-center gap-4">{{ $m }} <span class="text-gold">✦</span></span>
            @endforeach
        @endfor
    </div>
</div>

<!-- ABOUT -->
<section id="about" class="py-24 sm:py-28 scroll-mt-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid gap-16 lg:gap-20 lg:grid-cols-[1.03fr_.97fr] items-center">
            <div class="relative" data-aos="fade-right">
                <div class="relative overflow-hidden rounded-[48px] shadow-glow">
                    <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?q=80&w=1200" alt="Interior Kairos Coffee" class="h-full w-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-espresso/80 via-transparent to-gold/15"></div>
                </div>
                <div class="absolute -bottom-6 -right-2 sm:right-6 rounded-[28px] border border-line bg-white px-7 py-5 shadow-glow">
                    <p class="font-serif text-4xl font-bold text-coffee">8+</p>
                    <p class="text-xs uppercase tracking-[0.25em] text-mocha">Tahun Pengalaman</p>
                </div>
                <div class="absolute -top-5 -left-3 hidden h-24 w-24 rounded-full border border-gold/40 sm:block"></div>
            </div>

            <div data-aos="fade-left">
                <p class="eyebrow uppercase tracking-[0.3em] text-sm text-taupe">About Kairos</p>
                <h2 class="font-serif text-4xl sm:text-5xl font-bold text-coffee mt-4 leading-tight">More Than Just <span class="text-gold">A Coffee Shop.</span></h2>
                <p class="mt-7 text-lg text-coffee/80 leading-relaxed">Kami percaya bahwa secangkir kopi terbaik dinikmati bersama sebuah cerita. Kairos hadir sebagai ruang nyaman untuk membaca, bekerja, dan menemukan inspirasi dalam nuansa hangat yang elegan.</p>

                <div class="mt-10 grid gap-5 sm:grid-cols-3">
                    <div class="group rounded-[28px] border border-line bg-cream p-6 shadow-soft transition hover:-translate-y-1 hover:shadow-glow">
                        <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-coffee text-white transition group-hover:bg-gold group-hover:text-espresso">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><path d="M6 1v3M10 1v3M14 1v3"/></svg>
                        </span>
                        <p class="mt-4 text-lg font-semibold text-coffee">Artisan Blend</p>
                        <p class="mt-2 text-sm text-mocha">Kopi pilihan dengan karakter hangat dan halus.</p>
                    </div>
                    <div class="group rounded-[28px] border border-line bg-cream p-6 shadow-soft transition hover:-translate-y-1 hover:shadow-glow">
                        <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-coffee text-white transition group-hover:bg-gold group-hover:text-espresso">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                        </span>
                        <p class="mt-4 text-lg font-semibold text-coffee">Curated Library</p>
                        <p class="mt-2 text-sm text-mocha">Koleksi buku terbaik untuk setiap mood dan suasana.</p>
                    </div>
                    <div class="group rounded-[28px] border border-line bg-cream p-6 shadow-soft transition hover:-translate-y-1 hover:shadow-glow">
                        <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-coffee text-white transition group-hover:bg-gold group-hover:text-espresso">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a7 7 0 0 0-7 7c0 3 2 5 2 8h10c0-3 2-5 2-8a7 7 0 0 0-7-7z"/><path d="M9 21h6"/></svg>
                        </span>
                        <p class="mt-4 text-lg font-semibold text-coffee">Quiet Atmosphere</p>
                        <p class="mt-2 text-sm text-mocha">Ruang yang tenang untuk berkarya dan bersantai.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SPACES -->
<section id="spaces" class="py-24 sm:py-28 bg-sand/60 scroll-mt-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14 sm:mb-16" data-aos="fade-up">
            <p class="eyebrow center uppercase tracking-[0.3em] text-sm text-taupe">Spaces</p>
            <h2 class="font-serif text-4xl sm:text-5xl font-bold text-coffee mt-3">Ruang Santai & Produktif</h2>
            <p class="text-mocha mt-4 max-w-2xl mx-auto">Nikmati suasana yang dirancang untuk produktivitas dan ketenangan, lengkap dengan sudut baca serta meja private.</p>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            @php
                $spaces = [
                    ['Private Lounge', 'Luxury Corner', 'Ruang eksklusif dengan kursi empuk dan pencahayaan lembut.', 'M3 21h18M5 21V8l7-4 7 4v13M9 21v-6h6v6'],
                    ['Community Table', 'Creative Space', 'Meja bersama untuk diskusi dan kolaborasi ringan.', 'M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2M9 7a4 4 0 1 0 0 .01M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75'],
                    ['Quiet Nook', 'Reading Corner', 'Sudut tenang dengan rak buku dan aroma kopi lembut.', 'M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2zM22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z'],
                ];
            @endphp
            @foreach ($spaces as $space)
                <div class="group relative overflow-hidden rounded-[32px] border border-line bg-white p-8 shadow-soft transition duration-500 hover:-translate-y-2 hover:shadow-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="absolute -right-10 -top-10 h-28 w-28 rounded-full bg-gold/10 transition group-hover:scale-150"></div>
                    <span class="relative flex h-14 w-14 items-center justify-center rounded-2xl bg-sand text-coffee transition group-hover:bg-coffee group-hover:text-white">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="{{ $space[3] }}"/></svg>
                    </span>
                    <p class="relative mt-6 text-sm uppercase tracking-[0.3em] text-gold">{{ $space[0] }}</p>
                    <h3 class="relative mt-3 text-2xl font-semibold text-coffee">{{ $space[1] }}</h3>
                    <p class="relative mt-3 text-sm text-mocha leading-relaxed">{{ $space[2] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- COFFEE COLLECTION -->
<section id="menu" class="py-24 sm:py-28 scroll-mt-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14 sm:mb-16" data-aos="fade-up">
            <p class="eyebrow center uppercase tracking-[0.3em] text-sm text-taupe">Coffee Collection</p>
            <h2 class="font-serif text-4xl sm:text-5xl font-bold text-coffee mt-3">Premium Menu Highlights</h2>
            <p class="text-mocha mt-4 max-w-2xl mx-auto">Pilih dari koleksi menu premium kami, mulai dari espresso klasik hingga signature brew untuk pengalaman istimewa.</p>
        </div>

        <div class="grid gap-8 md:grid-cols-3">
            @forelse(($menus ?? collect()) as $menu)
                <article class="group flex flex-col overflow-hidden rounded-[40px] border border-line bg-cream shadow-soft transition duration-500 hover:-translate-y-2 hover:shadow-card" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                    <div class="relative overflow-hidden">
                        <img src="{{ $menu->image ? asset('storage/' . $menu->image) : 'https://images.unsplash.com/photo-1511920170033-f8396924c348?q=80&w=900' }}" alt="{{ $menu->name }}" class="h-72 w-full object-cover transition duration-700 group-hover:scale-105" />
                        <div class="absolute inset-0 bg-gradient-to-t from-espresso/30 to-transparent opacity-0 transition group-hover:opacity-100"></div>
                        <span class="absolute left-5 top-5 rounded-full bg-cream/85 px-4 py-2 text-xs uppercase tracking-[0.3em] text-coffee shadow-xl backdrop-blur">{{ $menu->category->name ?? 'Menu' }}</span>
                    </div>
                    <div class="flex flex-1 flex-col space-y-4 p-7">
                        <div class="flex items-start justify-between gap-4">
                            <h3 class="text-2xl font-semibold text-coffee">{{ $menu->name }}</h3>
                            <span class="shrink-0 rounded-full bg-gold/15 px-4 py-2 text-sm font-semibold text-coffee">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                        </div>
                        <p class="flex-1 text-sm leading-7 text-mocha">{{ Str::limit($menu->description, 100) }}</p>
                        <div class="flex items-center justify-between gap-3 pt-1">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-coffee px-4 py-2 text-xs font-semibold text-white">
                                <svg class="h-3.5 w-3.5 text-gold" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                Bestseller
                            </span>
                            <button class="group/btn inline-flex items-center gap-2 rounded-full bg-gold px-5 py-3 text-sm font-semibold text-espresso transition hover:bg-coffee hover:text-white">
                                Order Now
                                <svg class="h-4 w-4 transition group-hover/btn:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            </button>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-[32px] border border-dashed border-line bg-cream py-16 text-center text-mocha">Menu unggulan belum tersedia.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- BOOK CATEGORIES -->
<section id="books" class="py-24 sm:py-28 bg-sand/60 scroll-mt-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14 sm:mb-16" data-aos="fade-up">
            <p class="eyebrow center uppercase tracking-[0.3em] text-sm text-taupe">Explore Books</p>
            <h2 class="font-serif text-4xl sm:text-5xl font-bold text-coffee mt-3">Featured Collection</h2>
            <p class="text-mocha mt-4 max-w-2xl mx-auto">Temukan berbagai kategori buku pilihan yang dirancang untuk menemani waktu santai dan produktifmu.</p>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3">
            @forelse(($bookCategories ?? collect()) as $category)
                <a href="{{ route('book-categories.show', $category) }}" class="group relative overflow-hidden rounded-[36px] border border-line bg-white p-8 shadow-soft transition duration-500 hover:-translate-y-2 hover:shadow-card" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                    <div class="flex items-center justify-between">
                        <span class="flex h-16 w-16 items-center justify-center rounded-3xl bg-sand text-coffee transition group-hover:bg-coffee group-hover:text-white">
                            <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                        </span>
                        <span class="flex h-9 w-9 items-center justify-center rounded-full border border-line text-coffee transition group-hover:border-gold group-hover:bg-gold">
                            <svg class="h-4 w-4 transition group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                        </span>
                    </div>
                    <h3 class="mt-6 text-2xl font-semibold text-coffee">{{ $category->name }}</h3>
                    <p class="mt-3 text-sm text-mocha">Temukan pilihan buku terbaik di kategori ini.</p>
                </a>
            @empty
                <div class="col-span-full rounded-[32px] border border-dashed border-line bg-white py-16 text-center text-mocha">Kategori buku belum tersedia.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- GALLERY -->
<section id="gallery" class="py-24 sm:py-28 scroll-mt-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14 sm:mb-16" data-aos="fade-up">
            <p class="eyebrow center uppercase tracking-[0.3em] text-sm text-taupe">Atmosphere</p>
            <h2 class="font-serif text-4xl sm:text-5xl font-bold text-coffee mt-3">Kairos Gallery</h2>
            <p class="text-mocha mt-4 max-w-2xl mx-auto">Sekilas momen hangat yang tercipta di setiap sudut Kairos.</p>
        </div>

        <div class="grid gap-5 md:grid-cols-5" data-aos="fade-up">
            @php
                $gallery = [
                    ['https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=900', 'Slow Mornings', 'md:col-span-2 md:row-span-2'],
                    ['https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=900', 'Signature Brew', ''],
                    ['https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=900', 'Reading Hours', ''],
                    ['https://images.unsplash.com/photo-1510519138101-570d1dca3d66?q=80&w=900', 'Warm Corners', 'md:col-span-2'],
                ];
            @endphp
            @foreach ($gallery as $g)
                <div class="group relative overflow-hidden rounded-[32px] shadow-soft {{ $g[2] }}">
                    <img src="{{ $g[0] }}" alt="{{ $g[1] }}" class="h-full min-h-[260px] w-full object-cover transition duration-700 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-espresso/80 via-espresso/10 to-transparent opacity-70 transition group-hover:opacity-100"></div>
                    <div class="absolute bottom-5 left-5 translate-y-2 opacity-0 transition duration-500 group-hover:translate-y-0 group-hover:opacity-100">
                        <p class="text-xs uppercase tracking-[0.3em] text-gold">Kairos</p>
                        <p class="text-lg font-semibold text-white">{{ $g[1] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- TOP BOOKS -->
<section class="py-24 sm:py-28 bg-sand/60">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14 sm:mb-16" data-aos="fade-up">
            <p class="eyebrow center uppercase tracking-[0.3em] text-sm text-taupe">Featured Collection</p>
            <h2 class="font-serif text-4xl sm:text-5xl font-bold text-coffee mt-3">Top Books Collection</h2>
            <p class="mt-4 text-mocha max-w-2xl mx-auto">Pilihan buku favorit pengunjung Kairos yang paling sering menemani secangkir kopi hangat.</p>
        </div>

        <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-4">
            @forelse(($topBooks ?? collect()) as $book)
                <div class="group flex flex-col overflow-hidden rounded-[36px] bg-white p-5 shadow-soft transition duration-500 hover:-translate-y-2 hover:shadow-card" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 80 }}">
                    <div class="overflow-hidden rounded-[26px] border border-line">
                        <img src="{{ $book->cover ? asset('storage/' . $book->cover) : 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=700' }}" alt="{{ $book->title }}" class="h-72 w-full object-cover transition duration-700 group-hover:scale-105" />
                    </div>
                    <div class="mt-5">
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-sand px-4 py-2 text-xs font-semibold text-coffee">
                            <svg class="h-3.5 w-3.5 text-gold" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            Top Choice
                        </span>
                    </div>
                    <h3 class="mt-4 font-serif text-xl text-coffee leading-snug">{{ $book->title }}</h3>
                    <p class="mt-2 flex-1 text-sm text-mocha">{{ $book->author }}</p>
                    <button type="button" data-book-detail class="mt-5 inline-flex w-full items-center justify-center gap-2 rounded-full bg-coffee px-5 py-3 text-sm font-semibold text-white transition hover:bg-espresso"
                        data-book-title="{{ $book->title }}"
                        data-book-author="{{ $book->author }}"
                        data-book-category="{{ $book->category->name ?? '' }}"
                        data-book-stock="{{ $book->stock ?? 0 }}"
                        data-book-description="{{ $book->description }}"
                        data-book-image="{{ $book->cover ? asset('storage/' . $book->cover) : '' }}"
                        data-book-action-url="/book-categories/{{ $book->category_id }}">
                        Lihat Detail
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    </button>
                </div>
            @empty
                <div class="md:col-span-4 rounded-[32px] border border-dashed border-line bg-white py-16 text-center text-mocha">Buku unggulan belum tersedia.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- RESERVATION -->
<section id="reservasi" class="relative overflow-hidden py-24 sm:py-28 bg-espresso scroll-mt-24">
    <div class="absolute -left-20 top-10 h-72 w-72 rounded-full bg-gold/10 blur-3xl"></div>
    <div class="absolute -right-20 bottom-10 h-72 w-72 rounded-full bg-coffee/40 blur-3xl"></div>

    <div class="relative max-w-6xl mx-auto px-6">
        <div class="grid items-stretch gap-8 lg:grid-cols-[0.85fr_1.15fr]">
            <div class="flex flex-col justify-center text-white" data-aos="fade-right">
                <p class="eyebrow uppercase tracking-[0.3em] text-sm text-gold">Reservation</p>
                <h2 class="font-serif text-4xl sm:text-5xl font-bold mt-3 leading-tight">Reserve Your Corner</h2>
                <p class="text-white/70 mt-5 leading-relaxed max-w-md">Temukan sudut favoritmu untuk membaca, bekerja, atau menikmati kopi hangat. Kami siapkan tempat terbaik untukmu.</p>

                <div class="mt-8 space-y-4">
                    <div class="flex items-center gap-4 text-white/80">
                        <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white/10 text-gold">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 12-9 12s-9-5-9-12a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </span>
                        <span class="text-sm">Jl. Senja No. 12, Jakarta Selatan</span>
                    </div>
                    <div class="flex items-center gap-4 text-white/80">
                        <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white/10 text-gold">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                        </span>
                        <span class="text-sm">Setiap hari • 08.00 — 22.00 WIB</span>
                    </div>
                </div>
            </div>

            <div class="rounded-[40px] bg-white p-8 md:p-10 shadow-glow" data-aos="fade-left">
                <form class="space-y-5">
                    <div class="grid gap-5 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.18em] text-mocha">Nama Lengkap</label>
                            <input type="text" placeholder="Nama kamu" class="w-full rounded-2xl border border-line bg-cream px-5 py-3.5 text-sm text-espresso outline-none transition focus:border-gold focus:ring-2 focus:ring-gold/30" />
                        </div>
                        <div>
                            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.18em] text-mocha">Email</label>
                            <input type="email" placeholder="email@kamu.com" class="w-full rounded-2xl border border-line bg-cream px-5 py-3.5 text-sm text-espresso outline-none transition focus:border-gold focus:ring-2 focus:ring-gold/30" />
                        </div>
                    </div>
                    <div class="grid gap-5 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.18em] text-mocha">Tanggal</label>
                            <input type="date" class="w-full rounded-2xl border border-line bg-cream px-5 py-3.5 text-sm text-espresso outline-none transition focus:border-gold focus:ring-2 focus:ring-gold/30" />
                        </div>
                        <div>
                            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.18em] text-mocha">Jumlah Orang</label>
                            <input type="number" min="1" placeholder="2" class="w-full rounded-2xl border border-line bg-cream px-5 py-3.5 text-sm text-espresso outline-none transition focus:border-gold focus:ring-2 focus:ring-gold/30" />
                        </div>
                    </div>
                    <button class="w-full rounded-2xl bg-coffee py-4 text-sm font-bold uppercase tracking-[0.15em] text-white transition hover:bg-espresso hover:shadow-lg">Check Availability</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-[#120B07] text-white">
    <div class="max-w-7xl mx-auto py-20 px-6">
        <div class="grid gap-12 lg:grid-cols-4">
            <div class="lg:col-span-1">
                <div class="flex items-center gap-3">
                    <div class="h-11 w-11 rounded-full bg-coffee flex items-center justify-center text-white text-lg font-semibold ring-2 ring-gold/40">K</div>
                    <h2 class="font-serif text-3xl">Kairos</h2>
                </div>
                <p class="text-white/50 mt-4 tracking-[0.25em] uppercase text-xs">Coffee • Books • Silence</p>
                <p class="text-white/40 mt-4 text-sm leading-relaxed max-w-xs">Ruang premium bagi pecinta kopi dan pembaca sejati.</p>
            </div>

            <div>
                <p class="text-white font-semibold mb-4">Explore</p>
                <ul class="space-y-3 text-sm text-white/50">
                    <li><a href="#about" class="transition hover:text-gold">About</a></li>
                    <li><a href="#menu" class="transition hover:text-gold">Collection</a></li>
                    <li><a href="#spaces" class="transition hover:text-gold">Spaces</a></li>
                    <li><a href="#gallery" class="transition hover:text-gold">Gallery</a></li>
                </ul>
            </div>

            <div>
                <p class="text-white font-semibold mb-4">Contact</p>
                <ul class="space-y-3 text-sm text-white/50">
                    <li>hello@kairoscoffee.id</li>
                    <li>+62 21 1234 5678</li>
                    <li>Jl. Senja No. 12, Jakarta</li>
                </ul>
            </div>

            <div>
                <p class="text-white font-semibold mb-4">Newsletter</p>
                <p class="text-white/40 text-sm mb-4">Dapatkan kabar menu & event terbaru.</p>
                <form class="flex items-center gap-2">
                    <input type="email" placeholder="Email kamu" class="w-full rounded-full border border-white/15 bg-white/5 px-4 py-2.5 text-sm text-white placeholder-white/40 outline-none transition focus:border-gold" />
                    <button type="submit" aria-label="Berlangganan" class="flex h-10 w-12 shrink-0 items-center justify-center rounded-full bg-gold text-espresso transition hover:bg-goldsoft">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    </button>
                </form>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="#" aria-label="Instagram" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-white/15 bg-white/5 text-white/70 transition hover:border-gold hover:text-gold">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
                    </a>
                    <a href="#" aria-label="Facebook" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-white/15 bg-white/5 text-white/70 transition hover:border-gold hover:text-gold">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M14 9h3V6h-3c-1.7 0-3 1.3-3 3v2H9v3h2v7h3v-7h2.5l.5-3H14V9z"/></svg>
                    </a>
                    <a href="#" aria-label="Twitter" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-white/15 bg-white/5 text-white/70 transition hover:border-gold hover:text-gold">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M22 5.9c-.7.3-1.5.5-2.3.6.8-.5 1.5-1.3 1.8-2.3-.8.5-1.7.8-2.6 1a4 4 0 0 0-6.8 3.6A11.3 11.3 0 0 1 3.9 4.6a4 4 0 0 0 1.2 5.3c-.6 0-1.2-.2-1.8-.5a4 4 0 0 0 3.2 3.9c-.6.1-1.2.2-1.8.1a4 4 0 0 0 3.7 2.8A8 8 0 0 1 2 18.6 11.3 11.3 0 0 0 8.1 20c7.3 0 11.4-6.1 11.4-11.4v-.5c.8-.6 1.5-1.3 2-2.2z"/></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-14 flex flex-col items-center justify-between gap-4 border-t border-white/10 pt-8 text-center text-xs text-white/30 sm:flex-row">
            <span>© 2026 Kairos Coffee. All Rights Reserved.</span>
            <span>Crafted with warmth ☕</span>
        </div>
    </div>
</footer>

<!-- BACK TO TOP -->
<button id="backToTop" aria-label="Kembali ke atas" class="fixed bottom-6 right-6 z-50 flex h-12 w-12 items-center justify-center rounded-full bg-coffee text-white shadow-glow transition hover:bg-espresso">
    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M6 11l6-6 6 6"/></svg>
</button>

@include('partials.book-detail-modal')

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    window.addEventListener('load', function () {
        document.body.classList.add('loaded');
        const loader = document.getElementById('pageLoader');
        if (loader) {
            loader.style.opacity = '0';
            loader.style.transition = 'opacity .6s ease';
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

        // Mobile menu toggle
        const mobileToggle = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        const iconOpen = document.getElementById('menuIconOpen');
        const iconClose = document.getElementById('menuIconClose');

        const setMenu = (open) => {
            if (!mobileMenu) return;
            mobileMenu.classList.toggle('hidden', !open);
            if (iconOpen) iconOpen.classList.toggle('hidden', open);
            if (iconClose) iconClose.classList.toggle('hidden', !open);
            if (mobileToggle) mobileToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        };

        if (mobileToggle && mobileMenu) {
            mobileToggle.addEventListener('click', () => {
                setMenu(mobileMenu.classList.contains('hidden'));
            });
            document.querySelectorAll('[data-mobile-link]').forEach((link) => {
                link.addEventListener('click', () => setMenu(false));
            });
        }

        // Navbar scrolled state (shrink + solid background)
        const navbar = document.getElementById('kairosNavbar');
        const navShell = document.getElementById('navShell');
        const updateNavbar = () => {
            const scrolled = window.scrollY > 40;
            if (navShell) {
                navShell.classList.toggle('bg-white/80', scrolled);
                navShell.classList.toggle('bg-white/15', !scrolled);
                navShell.classList.toggle('py-2', scrolled);
                navShell.classList.toggle('py-3', !scrolled);
                navShell.classList.toggle('shadow-glow', scrolled);
            }
            if (navbar) navbar.classList.toggle('top-2', scrolled);
        };
        window.addEventListener('scroll', updateNavbar, { passive: true });
        updateNavbar();

        // Scroll progress bar
        const progress = document.getElementById('scrollProgress');
        const updateProgress = () => {
            if (!progress) return;
            const h = document.documentElement;
            const scrolled = (h.scrollTop) / (h.scrollHeight - h.clientHeight) * 100;
            progress.style.width = scrolled + '%';
        };
        window.addEventListener('scroll', updateProgress, { passive: true });
        updateProgress();

        // Back to top
        const backToTop = document.getElementById('backToTop');
        const updateBackToTop = () => {
            if (backToTop) backToTop.classList.toggle('show', window.scrollY > 500);
        };
        window.addEventListener('scroll', updateBackToTop, { passive: true });
        if (backToTop) {
            backToTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
        }
        updateBackToTop();

        // Active nav link highlight (scrollspy)
        const navLinks = document.querySelectorAll('.nav-link');
        const sections = ['about', 'menu', 'spaces', 'gallery'].map((id) => document.getElementById(id)).filter(Boolean);
        const spy = () => {
            let currentId = '';
            const y = window.scrollY + 140;
            sections.forEach((sec) => { if (sec.offsetTop <= y) currentId = sec.id; });
            navLinks.forEach((link) => {
                link.classList.toggle('is-active', link.getAttribute('href') === '#' + currentId);
            });
        };
        window.addEventListener('scroll', spy, { passive: true });
        spy();

        // Smooth parallax for hero
        const heroParallax = document.querySelector('.hero-parallax');
        const target = { y: 0 };
        const current = { y: 0 };
        const animate = () => {
            current.y += (target.y - current.y) * 0.08;
            if (heroParallax) heroParallax.style.transform = `translate3d(0, ${current.y}px, 0)`;
            requestAnimationFrame(animate);
        };
        if (heroParallax) {
            target.y = window.scrollY * 0.18;
            requestAnimationFrame(animate);
            window.addEventListener('scroll', () => { target.y = window.scrollY * 0.18; }, { passive: true });
        }

        // Animated counters
        const counters = document.querySelectorAll('[data-count]');
        const runCounter = (counter) => {
            const goal = parseInt(counter.getAttribute('data-count'), 10);
            let value = 0;
            const step = Math.ceil(goal / 80);
            const update = () => {
                value += step;
                if (value > goal) value = goal;
                counter.textContent = value.toLocaleString() + '+';
                if (value < goal) requestAnimationFrame(update);
            };
            update();
        };
        if ('IntersectionObserver' in window) {
            const io = new IntersectionObserver((entries, obs) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) { runCounter(entry.target); obs.unobserve(entry.target); }
                });
            }, { threshold: 0.4 });
            counters.forEach((c) => io.observe(c));
        } else {
            counters.forEach(runCounter);
        }
    });
</script>
</body>
</html>
