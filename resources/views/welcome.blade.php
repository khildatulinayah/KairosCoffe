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
                        sans: ['DM Sans', 'sans-serif'],
                        serif: ['Cormorant Garamond', 'serif'],
                        display: ['Cormorant Garamond', 'serif'],
                    },
                    colors: {
                        cream: '#F5EFE6',
                        parchment: '#EDE3D5',
                        espresso: '#1A0F09',
                        bark: '#3D2314',
                        mocha: '#6B4226',
                        latte: '#C8A882',
                        gold: '#B8965A',
                        amber: '#D4A853',
                    },
                    boxShadow: {
                        'luxury': '0 40px 100px rgba(26,15,9,0.18)',
                        'card': '0 8px 40px rgba(26,15,9,0.10)',
                        'glow': '0 0 80px rgba(180,149,90,0.15)',
                    },
                }
            }
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

    <style>
        :root {
            --cream: #F5EFE6;
            --parchment: #EDE3D5;
            --espresso: #1A0F09;
            --bark: #3D2314;
            --mocha: #6B4226;
            --latte: #C8A882;
            --gold: #B8965A;
            --amber: #D4A853;
        }

        html { scroll-behavior: smooth; }

        body {
            opacity: 0;
            transition: opacity .9s cubic-bezier(0.22,1,0.36,1);
            background-color: var(--cream);
            overflow-x: hidden;
        }
        body.loaded { opacity: 1; }

        /* ── LOADER ── */
        #pageLoader {
            position: fixed; inset: 0; z-index: 100;
            display: flex; align-items: center; justify-content: center;
            background: var(--espresso);
        }
        .loader-word {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 300;
            color: var(--latte);
            letter-spacing: 0.3em;
            animation: loaderFade 1.8s ease forwards;
        }
        @keyframes loaderFade {
            0%   { opacity: 0; transform: translateY(24px); }
            40%  { opacity: 1; transform: translateY(0); }
            80%  { opacity: 1; transform: translateY(0); }
            100% { opacity: 0; transform: translateY(-12px); }
        }

        /* ── CURSOR ── */
        .cursor-dot {
            width: 8px; height: 8px;
            background: var(--gold);
            border-radius: 50%;
            position: fixed; pointer-events: none; z-index: 9999;
            transform: translate(-50%,-50%);
            transition: transform .1s, width .3s, height .3s, background .3s;
        }
        .cursor-ring {
            width: 36px; height: 36px;
            border: 1.5px solid rgba(184,150,90,0.5);
            border-radius: 50%;
            position: fixed; pointer-events: none; z-index: 9998;
            transform: translate(-50%,-50%);
            transition: transform .18s cubic-bezier(0.22,1,0.36,1), width .3s, height .3s, opacity .3s;
        }

        /* ── NAVBAR ── */
        #kairosNavbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 50;
            padding: 1.25rem 1.5rem;
            transition: padding .5s cubic-bezier(0.22,1,0.36,1), background .5s;
        }
        #kairosNavbar.scrolled {
            padding: 0.6rem 1.5rem;
            background: rgba(26,15,9,0.88);
            backdrop-filter: blur(24px) saturate(1.5);
            -webkit-backdrop-filter: blur(24px) saturate(1.5);
        }
        .nav-inner {
            max-width: 1280px; margin: 0 auto;
            display: flex; align-items: center; justify-content: space-between; gap: 1rem;
            border-radius: 100px;
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(26,15,9,0.55);
            backdrop-filter: blur(24px) saturate(1.4);
            -webkit-backdrop-filter: blur(24px) saturate(1.4);
            padding: 0.75rem 1.25rem;
            transition: background .5s, border-color .5s;
        }
        #kairosNavbar.scrolled .nav-inner {
            background: transparent;
            border-color: transparent;
        }
        .nav-link {
            font-size: 0.8rem; font-weight: 500; letter-spacing: 0.08em; text-transform: uppercase;
            color: rgba(245,239,230,0.75);
            position: relative; padding-bottom: 2px;
            transition: color .3s;
        }
        .nav-link::after {
            content: ''; position: absolute; bottom: -2px; left: 0; width: 0; height: 1px;
            background: var(--gold); transition: width .35s cubic-bezier(0.22,1,0.36,1);
        }
        .nav-link:hover { color: var(--latte); }
        .nav-link:hover::after { width: 100%; }

        /* ── HERO ── */
        .hero-section { position: relative; min-height: 100svh; display: flex; flex-direction: column; }
        .hero-img-wrap { position: absolute; inset: 0; overflow: hidden; }
        .hero-img-wrap img {
            width: 100%; height: 100%; object-fit: cover;
            transform: scale(1.08);
            transition: transform 12s cubic-bezier(0.22,1,0.36,1);
        }
        body.loaded .hero-img-wrap img { transform: scale(1); }
        .hero-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(160deg, rgba(26,15,9,0.72) 0%, rgba(26,15,9,0.4) 50%, rgba(26,15,9,0.6) 100%);
        }
        .hero-grain {
            position: absolute; inset: 0; opacity: 0.04;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
            background-size: 180px;
        }
        .hero-content {
            position: relative; z-index: 10;
            flex: 1; display: flex; flex-direction: column; justify-content: flex-end;
            padding: clamp(5rem, 12vw, 9rem) clamp(1.5rem, 6vw, 5rem) clamp(3rem, 7vw, 5rem);
            max-width: 1280px; margin: 0 auto; width: 100%;
        }
        .hero-eyebrow {
            display: inline-flex; align-items: center; gap: 0.6rem;
            font-size: 0.7rem; font-weight: 500; letter-spacing: 0.4em; text-transform: uppercase;
            color: var(--latte); margin-bottom: 2rem;
        }
        .hero-eyebrow-line {
            width: 40px; height: 1px; background: var(--gold);
        }
        .hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(3.5rem, 7.5vw, 7.5rem);
            font-weight: 300; line-height: 1.0; color: var(--cream);
            letter-spacing: -0.01em;
        }
        .hero-title em { font-style: italic; color: var(--latte); font-weight: 300; }
        .hero-sub {
            max-width: 520px; margin-top: 1.75rem;
            font-size: 1rem; color: rgba(245,239,230,0.65); line-height: 1.75; font-weight: 300;
        }
        .hero-cta-row { display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 2.5rem; }

        /* ── STATS STRIP ── */
        .stats-strip {
            position: relative; z-index: 10;
            background: rgba(26,15,9,0.88);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-top: 1px solid rgba(255,255,255,0.06);
        }
        .stats-strip-inner {
            max-width: 1280px; margin: 0 auto;
            display: grid; grid-template-columns: repeat(3, 1fr);
            border-left: 1px solid rgba(255,255,255,0.07);
        }
        .stat-cell {
            padding: 1.75rem 2.5rem;
            border-right: 1px solid rgba(255,255,255,0.07);
            border-bottom: 1px solid rgba(255,255,255,0.07);
        }
        .stat-num {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem; font-weight: 300; color: var(--latte); line-height: 1;
        }
        .stat-label { font-size: 0.65rem; letter-spacing: 0.3em; text-transform: uppercase; color: rgba(245,239,230,0.35); margin-top: 0.4rem; }

        /* ── SECTION HEADERS ── */
        .section-eyebrow {
            font-size: 0.65rem; letter-spacing: 0.4em; text-transform: uppercase;
            color: var(--gold); display: flex; align-items: center; gap: 0.8rem; margin-bottom: 1.25rem;
        }
        .section-eyebrow::before { content: ''; width: 28px; height: 1px; background: var(--gold); }
        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 400; line-height: 1.1;
            color: var(--bark);
        }
        .section-title em { font-style: italic; color: var(--mocha); }

        /* ── BUTTONS ── */
        .btn-primary {
            display: inline-flex; align-items: center; gap: 0.6rem;
            background: var(--gold); color: var(--espresso);
            font-size: 0.75rem; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase;
            padding: 0.9rem 2rem; border-radius: 100px;
            transition: background .3s, transform .3s, box-shadow .3s;
        }
        .btn-primary:hover { background: var(--amber); transform: translateY(-2px); box-shadow: 0 12px 32px rgba(184,150,90,0.35); }
        .btn-ghost {
            display: inline-flex; align-items: center; gap: 0.6rem;
            border: 1px solid rgba(245,239,230,0.3); color: rgba(245,239,230,0.85);
            font-size: 0.75rem; font-weight: 500; letter-spacing: 0.12em; text-transform: uppercase;
            padding: 0.9rem 2rem; border-radius: 100px;
            transition: border-color .3s, background .3s, transform .3s;
        }
        .btn-ghost:hover { border-color: var(--latte); background: rgba(245,239,230,0.07); transform: translateY(-2px); }
        .btn-dark {
            display: inline-flex; align-items: center; gap: 0.6rem;
            background: var(--bark); color: var(--cream);
            font-size: 0.75rem; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase;
            padding: 0.85rem 1.75rem; border-radius: 100px;
            transition: background .3s, transform .3s;
        }
        .btn-dark:hover { background: var(--espresso); transform: translateY(-2px); }
        .btn-outline-dark {
            display: inline-flex; align-items: center; gap: 0.5rem;
            border: 1px solid rgba(61,35,20,0.25); color: var(--bark);
            font-size: 0.75rem; font-weight: 500; letter-spacing: 0.1em; text-transform: uppercase;
            padding: 0.85rem 1.75rem; border-radius: 100px;
            transition: border-color .3s, background .3s, transform .3s;
        }
        .btn-outline-dark:hover { border-color: var(--gold); background: var(--parchment); transform: translateY(-2px); }

        /* ── ABOUT ── */
        .about-img-container {
            position: relative; border-radius: 2.5rem; overflow: hidden;
        }
        .about-img-container img { width: 100%; height: 100%; object-fit: cover; }
        .about-img-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(0deg, rgba(26,15,9,0.6) 0%, transparent 50%);
        }
        .about-badge {
            position: absolute; bottom: 2rem; left: 2rem;
            background: rgba(26,15,9,0.72);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(200,168,130,0.3);
            border-radius: 1.5rem; padding: 1.25rem 1.75rem; color: white;
        }
        .about-feature-card {
            border: 1px solid rgba(61,35,20,0.1);
            border-radius: 1.5rem; padding: 1.75rem;
            background: white;
            transition: transform .35s cubic-bezier(0.22,1,0.36,1), box-shadow .35s;
        }
        .about-feature-card:hover { transform: translateY(-4px); box-shadow: 0 20px 60px rgba(26,15,9,0.1); }
        .about-feature-icon {
            width: 44px; height: 44px; border-radius: 12px;
            background: var(--parchment);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem; margin-bottom: 1rem;
        }

        /* ── SPACES ── */
        .space-card {
            position: relative; border-radius: 2rem; overflow: hidden;
            background: white;
            border: 1px solid rgba(61,35,20,0.08);
            transition: transform .4s cubic-bezier(0.22,1,0.36,1), box-shadow .4s;
        }
        .space-card:hover { transform: translateY(-6px); box-shadow: 0 30px 80px rgba(26,15,9,0.13); }
        .space-card-tag {
            font-size: 0.6rem; letter-spacing: 0.35em; text-transform: uppercase;
            color: var(--gold); font-weight: 500;
        }
        .space-card-dot {
            width: 6px; height: 6px; border-radius: 50%; background: var(--gold);
            display: inline-block; margin-right: 0.4rem;
        }
        .space-num {
            font-family: 'Cormorant Garamond', serif;
            font-size: 5rem; font-weight: 300; color: rgba(61,35,20,0.06);
            position: absolute; top: 1rem; right: 1.5rem; line-height: 1;
            user-select: none; pointer-events: none;
        }

        /* ── MENU CARDS ── */
        .menu-card {
            border-radius: 2rem; overflow: hidden;
            background: white; border: 1px solid rgba(61,35,20,0.08);
            transition: transform .4s cubic-bezier(0.22,1,0.36,1), box-shadow .4s;
        }
        .menu-card:hover { transform: translateY(-8px); box-shadow: 0 40px 100px rgba(26,15,9,0.15); }
        .menu-card-img {
            position: relative; overflow: hidden;
        }
        .menu-card-img img {
            width: 100%; height: 280px; object-fit: cover;
            transition: transform .7s cubic-bezier(0.22,1,0.36,1);
        }
        .menu-card:hover .menu-card-img img { transform: scale(1.06); }
        .menu-card-badge {
            position: absolute; top: 1rem; left: 1rem;
            background: rgba(26,15,9,0.65); backdrop-filter: blur(8px);
            color: var(--latte); font-size: 0.6rem; letter-spacing: 0.3em; text-transform: uppercase;
            padding: 0.4rem 0.9rem; border-radius: 100px; border: 1px solid rgba(200,168,130,0.25);
        }
        .menu-price-tag {
            position: absolute; top: 1rem; right: 1rem;
            background: var(--gold); color: var(--espresso);
            font-size: 0.8rem; font-weight: 600; padding: 0.35rem 0.9rem; border-radius: 100px;
        }
        .menu-card-body { padding: 1.5rem; }
        .menu-card-name { font-family: 'Cormorant Garamond', serif; font-size: 1.6rem; font-weight: 500; color: var(--bark); }
        .menu-card-desc { font-size: 0.82rem; color: var(--mocha); opacity: 0.75; line-height: 1.65; margin-top: 0.5rem; }

        /* ── BOOK CARDS ── */
        .book-category-card {
            border-radius: 2rem; padding: 2rem;
            background: white; border: 1px solid rgba(61,35,20,0.08);
            transition: transform .4s cubic-bezier(0.22,1,0.36,1), box-shadow .4s, background .3s;
        }
        .book-category-card:hover { transform: translateY(-6px); box-shadow: 0 30px 80px rgba(26,15,9,0.12); background: var(--espresso); }
        .book-category-card:hover .bcc-name { color: var(--latte); }
        .book-category-card:hover .bcc-sub { color: rgba(200,168,130,0.6); }
        .book-category-card:hover .bcc-icon-wrap { background: rgba(200,168,130,0.15); }
        .bcc-icon-wrap {
            width: 56px; height: 56px; border-radius: 16px;
            background: var(--parchment);
            display: flex; align-items: center; justify-content: center; font-size: 1.6rem;
            margin-bottom: 1.5rem;
            transition: background .3s;
        }
        .bcc-name { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 500; color: var(--bark); transition: color .3s; }
        .bcc-sub { font-size: 0.8rem; color: var(--mocha); opacity: 0.7; margin-top: 0.4rem; transition: color .3s; }
        .bcc-arrow {
            width: 36px; height: 36px; border-radius: 50%;
            border: 1px solid rgba(61,35,20,0.15);
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem; color: var(--mocha); margin-top: 1.5rem;
            transition: background .3s, border-color .3s, color .3s;
        }
        .book-category-card:hover .bcc-arrow { background: var(--gold); border-color: var(--gold); color: var(--espresso); }

        /* ── GALLERY ── */
        .gallery-item {
            overflow: hidden; border-radius: 1.75rem; position: relative;
        }
        .gallery-item img {
            width: 100%; height: 100%; object-fit: cover;
            transition: transform .8s cubic-bezier(0.22,1,0.36,1);
        }
        .gallery-item:hover img { transform: scale(1.07); }
        .gallery-item-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(0deg, rgba(26,15,9,0.5) 0%, transparent 60%);
            opacity: 0; transition: opacity .4s;
        }
        .gallery-item:hover .gallery-item-overlay { opacity: 1; }

        /* ── TOP BOOKS ── */
        .top-book-card {
            background: white; border-radius: 2rem; overflow: hidden;
            border: 1px solid rgba(61,35,20,0.08);
            transition: transform .4s cubic-bezier(0.22,1,0.36,1), box-shadow .4s;
        }
        .top-book-card:hover { transform: translateY(-8px); box-shadow: 0 40px 100px rgba(26,15,9,0.14); }
        .top-book-card img {
            width: 100%; height: 300px; object-fit: cover;
            transition: transform .7s cubic-bezier(0.22,1,0.36,1);
        }
        .top-book-card:hover img { transform: scale(1.05); }
        .top-book-body { padding: 1.5rem; }
        .top-book-badge {
            display: inline-block;
            font-size: 0.6rem; letter-spacing: 0.3em; text-transform: uppercase;
            background: var(--parchment); color: var(--mocha);
            padding: 0.35rem 0.9rem; border-radius: 100px; margin-bottom: 0.9rem;
        }
        .top-book-title { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 500; color: var(--bark); line-height: 1.25; }
        .top-book-author { font-size: 0.8rem; color: var(--mocha); opacity: 0.7; margin-top: 0.4rem; }

        /* ── RESERVATION ── */
        .res-section { background: var(--espresso); }
        .res-card { background: var(--cream); border-radius: 2.5rem; padding: clamp(2.5rem, 5vw, 4rem); }
        .res-input {
            width: 100%; border-radius: 1rem;
            border: 1px solid rgba(61,35,20,0.15);
            background: white;
            padding: 1rem 1.4rem;
            font-size: 0.875rem; color: var(--bark);
            font-family: 'DM Sans', sans-serif;
            outline: none; transition: border-color .3s, box-shadow .3s;
        }
        .res-input:focus { border-color: var(--gold); box-shadow: 0 0 0 3px rgba(184,150,90,0.15); }
        .res-input::placeholder { color: rgba(107,66,38,0.4); }
        .res-submit {
            width: 100%; border-radius: 1rem;
            background: var(--bark); color: var(--cream);
            padding: 1.1rem 2rem;
            font-size: 0.8rem; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase;
            font-family: 'DM Sans', sans-serif;
            border: none; cursor: pointer;
            transition: background .3s, transform .3s, box-shadow .3s;
        }
        .res-submit:hover { background: var(--espresso); transform: translateY(-2px); box-shadow: 0 16px 40px rgba(26,15,9,0.25); }

        /* ── FOOTER ── */
        .footer-logo { font-family: 'Cormorant Garamond', serif; font-size: clamp(3rem,6vw,5rem); font-weight: 300; color: white; letter-spacing: -0.02em; }
        .footer-divider { height: 1px; background: rgba(255,255,255,0.08); }
        .social-btn {
            width: 44px; height: 44px; border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.12);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.7rem; font-weight: 600; letter-spacing: 0.05em; color: rgba(255,255,255,0.5);
            transition: border-color .3s, color .3s, background .3s;
        }
        .social-btn:hover { border-color: var(--gold); color: var(--latte); background: rgba(184,150,90,0.1); }

        /* ── HORIZONTAL SCROLL LINE (decorative) ── */
        .marquee-track {
            overflow: hidden; white-space: nowrap;
            border-top: 1px solid rgba(61,35,20,0.1);
            border-bottom: 1px solid rgba(61,35,20,0.1);
            padding: 1rem 0;
        }
        .marquee-inner {
            display: inline-block;
            animation: marquee 28s linear infinite;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem; font-style: italic; font-weight: 300;
            color: rgba(61,35,20,0.25); letter-spacing: 0.1em;
        }
        @keyframes marquee { from { transform: translateX(0); } to { transform: translateX(-50%); } }

        /* ── MISC ── */
        @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-12px)} }
        .animate-float { animation: float 7s ease-in-out infinite; }

        .line-accent {
            width: 48px; height: 2px; background: var(--gold); display: inline-block; vertical-align: middle; margin-right: 0.75rem;
        }

        /* Mobile nav */
        #mobileMenu {
            background: rgba(26,15,9,0.95);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-radius: 1.75rem;
            border: 1px solid rgba(200,168,130,0.15);
        }
        .mobile-nav-link {
            display: block; padding: 0.875rem 1.25rem;
            color: rgba(245,239,230,0.75);
            font-size: 0.875rem; font-weight: 400; letter-spacing: 0.05em;
            border-radius: 0.875rem;
            transition: background .3s, color .3s;
        }
        .mobile-nav-link:hover { background: rgba(245,239,230,0.06); color: var(--latte); }
    </style>
</head>

<body class="font-sans text-bark overflow-x-hidden">

<!-- CURSOR -->
<div class="cursor-dot" id="cursorDot"></div>
<div class="cursor-ring" id="cursorRing"></div>

<!-- LOADER -->
<div id="pageLoader">
    <div class="text-center">
        <p class="loader-word">Kairos</p>
    </div>
</div>

<!-- ════════════════════════════════ NAVBAR ════════════════════════════════ -->
<nav id="kairosNavbar">
    <div class="nav-inner">
        <!-- Logo -->
        <a href="#" class="flex items-center gap-3 shrink-0">
            <div class="w-9 h-9 rounded-full bg-latte/20 border border-latte/30 flex items-center justify-center">
                <span class="font-serif text-latte text-sm font-medium">K</span>
            </div>
            <div>
                <p class="font-serif text-lg text-cream leading-none tracking-wide">Kairos</p>
                <p class="text-[9px] uppercase tracking-[0.3em] text-latte/50 leading-none mt-0.5">Coffee · Books · Silence</p>
            </div>
        </a>

        <!-- Desktop links -->
        <div class="hidden md:flex items-center gap-7">
            <a href="#about" class="nav-link">About</a>
            <a href="#menu" class="nav-link">Collection</a>
            <a href="#spaces" class="nav-link">Spaces</a>
            <a href="#gallery" class="nav-link">Gallery</a>
        </div>

        <!-- Desktop actions -->
        <div class="hidden md:flex items-center gap-3">
            <a href="#reservasi" class="btn-primary text-xs py-2.5 px-5">Reserve</a>
            @guest
                <a href="{{ route('login.show') }}" class="btn-ghost text-xs py-2.5 px-5">Login</a>
                <a href="{{ route('register.show') }}" class="btn-primary text-xs py-2.5 px-5" style="background: var(--latte)">Register</a>
            @endguest
            @auth
                <span class="text-cream/60 text-xs">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-ghost text-xs py-2.5 px-5">Logout</button>
                </form>
            @endauth
        </div>

        <!-- Mobile toggle -->
        <button id="mobileMenuButton" class="md:hidden w-10 h-10 flex items-center justify-center rounded-full border border-white/15 text-cream/80 transition hover:border-latte/40">
            <svg width="18" height="12" viewBox="0 0 18 12" fill="none">
                <line x1="0" y1="1" x2="18" y2="1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="4" y1="6" x2="18" y2="6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="8" y1="11" x2="18" y2="11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
        </button>
    </div>

    <!-- Mobile menu -->
    <div id="mobileMenu" class="hidden mt-3 mx-0 p-4 space-y-1">
        <a href="#about" class="mobile-nav-link">About</a>
        <a href="#menu" class="mobile-nav-link">Collection</a>
        <a href="#spaces" class="mobile-nav-link">Spaces</a>
        <a href="#gallery" class="mobile-nav-link">Gallery</a>
        <div class="pt-3 border-t border-white/8 space-y-2">
            <a href="#reservasi" class="block text-center btn-primary text-xs py-3">Reserve a Spot</a>
            @guest
                <a href="{{ route('login.show') }}" class="mobile-nav-link text-center">Login</a>
                <a href="{{ route('register.show') }}" class="block text-center text-xs font-medium py-3 rounded-xl" style="background:rgba(200,168,130,0.15);color:var(--latte)">Register</a>
            @endguest
            @auth
                <p class="px-4 py-3 text-xs text-cream/40">Halo, <span class="text-cream/70">{{ auth()->user()->name }}</span></p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="mobile-nav-link w-full text-left">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<!-- ════════════════════════════════ HERO ════════════════════════════════ -->
<section class="hero-section">
    <div class="hero-img-wrap">
        <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=2000&auto=format&fit=crop" alt="Kairos interior" />
        <div class="hero-overlay"></div>
        <div class="hero-grain"></div>
    </div>

    <div class="hero-content" data-aos="fade-up" data-aos-duration="1400">
        <div class="max-w-3xl">
            <div class="hero-eyebrow">
                <span class="hero-eyebrow-line"></span>
                Sanctuary Since 2026
            </div>

            <h1 class="hero-title">
                Luxury coffee.<br>
                Curated library.<br>
                <em>A cinematic calm.</em>
            </h1>

            <p class="hero-sub">
                Kairos menghadirkan tempat premium bagi pecinta kopi dan pembaca sejati — suasana hangat, koleksi istimewa, dan estetika yang lembut.
            </p>

            <div class="hero-cta-row">
                <a href="#menu" class="btn-primary">Explore Collection <span>↗</span></a>
                <a href="#books" class="btn-ghost">Discover Books</a>
            </div>
        </div>
    </div>

    <!-- Stats strip at bottom of hero -->
    <div class="stats-strip">
        <div class="stats-strip-inner">
            <div class="stat-cell">
                <p class="stat-num" data-count="1200">1200+</p>
                <p class="stat-label">Books in Library</p>
            </div>
            <div class="stat-cell">
                <p class="stat-num" data-count="5000">5K+</p>
                <p class="stat-label">Cups Served</p>
            </div>
            <div class="stat-cell">
                <p class="stat-num">4.9<span style="font-size:1.5rem;opacity:.6">★</span></p>
                <p class="stat-label">Guest Rating</p>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════ MARQUEE ════════════════════════════════ -->
<div class="marquee-track">
    <span class="marquee-inner">
        Coffee &amp; Books &nbsp;·&nbsp; Curated Silence &nbsp;·&nbsp; Artisan Blends &nbsp;·&nbsp; A Moment of Calm &nbsp;·&nbsp; Premium Library &nbsp;·&nbsp; Sanctuary Since 2026 &nbsp;·&nbsp; Coffee &amp; Books &nbsp;·&nbsp; Curated Silence &nbsp;·&nbsp; Artisan Blends &nbsp;·&nbsp; A Moment of Calm &nbsp;·&nbsp; Premium Library &nbsp;·&nbsp; Sanctuary Since 2026 &nbsp;·&nbsp;
    </span>
</div>

<!-- ════════════════════════════════ ABOUT ════════════════════════════════ -->
<section id="about" class="py-28 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Image -->
            <div class="about-img-container h-[580px]" data-aos="fade-right" data-aos-duration="1100">
                <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?q=80&w=1200" alt="Kairos ambiance" />
                <div class="about-img-overlay"></div>
                <div class="about-badge">
                    <p class="text-xs uppercase tracking-widest text-latte/70 mb-1">Est. 2026</p>
                    <p class="font-serif text-2xl text-white font-light">Where stories brew.</p>
                </div>
            </div>

            <!-- Text -->
            <div data-aos="fade-left" data-aos-duration="1100" data-aos-delay="100">
                <div class="section-eyebrow">About Kairos</div>
                <h2 class="section-title">More than just<br><em>a coffee shop.</em></h2>
                <p class="mt-6 text-base text-mocha/80 leading-relaxed font-light max-w-md">
                    Kami percaya bahwa secangkir kopi terbaik dinikmati bersama sebuah cerita. Kairos hadir sebagai ruang nyaman untuk membaca, bekerja, dan menemukan inspirasi dalam nuansa hangat yang elegan.
                </p>

                <div class="mt-10 grid sm:grid-cols-3 gap-4">
                    <div class="about-feature-card">
                        <div class="about-feature-icon">☕</div>
                        <p class="font-semibold text-bark text-sm">Artisan Blend</p>
                        <p class="text-xs text-mocha/65 mt-1 leading-relaxed">Kopi pilihan dengan karakter hangat dan halus.</p>
                    </div>
                    <div class="about-feature-card">
                        <div class="about-feature-icon">📚</div>
                        <p class="font-semibold text-bark text-sm">Curated Library</p>
                        <p class="text-xs text-mocha/65 mt-1 leading-relaxed">Koleksi buku terbaik untuk setiap mood.</p>
                    </div>
                    <div class="about-feature-card">
                        <div class="about-feature-icon">🕯️</div>
                        <p class="font-semibold text-bark text-sm">Quiet Atmosphere</p>
                        <p class="text-xs text-mocha/65 mt-1 leading-relaxed">Ruang tenang untuk berkarya dan bersantai.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════ SPACES ════════════════════════════════ -->
<section id="spaces" class="py-28 px-6" style="background: var(--parchment);">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-8 mb-16" data-aos="fade-up">
            <div>
                <div class="section-eyebrow">Spaces</div>
                <h2 class="section-title">Ruang Santai<br><em>&amp; Produktif</em></h2>
            </div>
            <p class="text-sm text-mocha/70 max-w-xs font-light leading-relaxed">
                Dirancang untuk produktivitas dan ketenangan, lengkap dengan sudut baca serta meja private.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="space-card p-8" data-aos="fade-up" data-aos-delay="0">
                <span class="space-num">01</span>
                <div class="space-card-tag"><span class="space-card-dot"></span>Private Lounge</div>
                <h3 class="font-serif text-2xl text-bark mt-4 font-medium">Luxury Corner</h3>
                <p class="text-sm text-mocha/65 mt-3 leading-relaxed font-light">Ruang eksklusif dengan kursi empuk dan pencahayaan lembut.</p>
                <div class="mt-6 h-px bg-bark/8"></div>
                <p class="mt-4 text-xs text-gold uppercase tracking-widest">Available Daily</p>
            </div>
            <div class="space-card p-8" data-aos="fade-up" data-aos-delay="80">
                <span class="space-num">02</span>
                <div class="space-card-tag"><span class="space-card-dot"></span>Community Table</div>
                <h3 class="font-serif text-2xl text-bark mt-4 font-medium">Creative Space</h3>
                <p class="text-sm text-mocha/65 mt-3 leading-relaxed font-light">Meja bersama untuk diskusi dan kolaborasi ringan.</p>
                <div class="mt-6 h-px bg-bark/8"></div>
                <p class="mt-4 text-xs text-gold uppercase tracking-widest">Open Seating</p>
            </div>
            <div class="space-card p-8" data-aos="fade-up" data-aos-delay="160">
                <span class="space-num">03</span>
                <div class="space-card-tag"><span class="space-card-dot"></span>Quiet Nook</div>
                <h3 class="font-serif text-2xl text-bark mt-4 font-medium">Reading Corner</h3>
                <p class="text-sm text-mocha/65 mt-3 leading-relaxed font-light">Sudut tenang dengan rak buku dan aroma kopi lembut.</p>
                <div class="mt-6 h-px bg-bark/8"></div>
                <p class="mt-4 text-xs text-gold uppercase tracking-widest">Reservation Required</p>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════ COFFEE COLLECTION ════════════════════════════════ -->
<section id="menu" class="py-28 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="section-eyebrow justify-center">Coffee Collection</div>
            <h2 class="section-title">Premium Menu<br><em>Highlights</em></h2>
            <p class="text-sm text-mocha/60 mt-4 max-w-md mx-auto font-light leading-relaxed">Pilih dari koleksi menu premium kami, mulai dari espresso klasik hingga signature brew.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @forelse(($menus ?? collect()) as $menu)
                <article class="menu-card" data-aos="fade-up">
                    <div class="menu-card-img">
                        <img src="{{ $menu->image ? asset('storage/' . $menu->image) : 'https://images.unsplash.com/photo-1511920170033-f8396924c348?q=80&w=900' }}" alt="{{ $menu->name }}" />
                        <span class="menu-card-badge">{{ $menu->category->name ?? 'Menu' }}</span>
                        <span class="menu-price-tag">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                    </div>
                    <div class="menu-card-body">
                        <h3 class="menu-card-name">{{ $menu->name }}</h3>
                        <p class="menu-card-desc">{{ Str::limit($menu->description, 100) }}</p>
                        <div class="flex items-center justify-between mt-5">
                            <span class="text-xs uppercase tracking-widest text-gold font-medium">Bestseller</span>
                            <button class="btn-dark text-xs py-2.5 px-5">Order Now</button>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full text-center text-mocha/50 py-16">
                    <p class="font-serif text-2xl font-light">Menu unggulan belum tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ════════════════════════════════ BOOK CATEGORIES ════════════════════════════════ -->
<section id="books" class="py-28 px-6" style="background: var(--espresso);">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-8 mb-16" data-aos="fade-up">
            <div>
                <div class="section-eyebrow" style="color: var(--latte);">Explore Books</div>
                <h2 class="font-serif text-4xl md:text-5xl font-light text-cream leading-tight">Featured<br><em class="text-latte">Collection</em></h2>
            </div>
            <p class="text-sm text-cream/40 max-w-xs font-light leading-relaxed">
                Temukan berbagai kategori buku pilihan yang dirancang untuk menemani waktu santaimu.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-5">
            @forelse(($bookCategories ?? collect()) as $category)
                <a href="{{ auth()->check() ? route('book-categories.show', $category) : route('login.show') }}" class="book-category-card" data-aos="fade-up">

                    <div class="bcc-icon-wrap">📚</div>
                    <h3 class="bcc-name">{{ $category->name }}</h3>
                    <p class="bcc-sub">Temukan pilihan buku terbaik di kategori ini.</p>
                    <div class="bcc-arrow">→</div>
                </a>
            @empty
                <div class="col-span-full text-center py-16">
                    <p class="font-serif text-2xl font-light text-cream/40">Kategori buku belum tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ════════════════════════════════ GALLERY ════════════════════════════════ -->
<section id="gallery" class="py-28 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-14" data-aos="fade-up">
            <div class="section-eyebrow justify-center">Atmosphere</div>
            <h2 class="section-title">Kairos <em>Gallery</em></h2>
        </div>

        <div class="grid grid-cols-12 gap-4 auto-rows-[220px]" data-aos="fade-up" data-aos-delay="100">
            <div class="gallery-item col-span-12 md:col-span-5 row-span-2">
                <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=900" alt="Gallery 1" />
                <div class="gallery-item-overlay"></div>
            </div>
            <div class="gallery-item col-span-12 md:col-span-4">
                <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=900" alt="Gallery 2" />
                <div class="gallery-item-overlay"></div>
            </div>
            <div class="gallery-item col-span-12 md:col-span-3">
                <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=900" alt="Gallery 3" />
                <div class="gallery-item-overlay"></div>
            </div>
            <div class="gallery-item col-span-12 md:col-span-7">
                <img src="https://images.unsplash.com/photo-1510519138101-570d1dca3d66?q=80&w=900" alt="Gallery 4" />
                <div class="gallery-item-overlay"></div>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════ TOP BOOKS ════════════════════════════════ -->
<section class="py-28 px-6" style="background: var(--parchment);">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-8 mb-16" data-aos="fade-up">
            <div>
                <div class="section-eyebrow">Featured Collection</div>
                <h2 class="section-title">Top Books<br><em>Collection</em></h2>
            </div>
            <p class="text-sm text-mocha/60 max-w-xs font-light leading-relaxed">
                Pilihan buku favorit pengunjung Kairos yang paling sering menemani secangkir kopi hangat.
            </p>
        </div>

        <div class="grid md:grid-cols-4 gap-6">
            @forelse(($topBooks ?? collect()) as $book)
                <div class="top-book-card" data-aos="fade-up">
                    <div class="overflow-hidden">
                        <img src="{{ $book->cover ? asset('storage/' . $book->cover) : 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=700' }}" alt="{{ $book->title }}" />
                    </div>
                    <div class="top-book-body">
                        <span class="top-book-badge">Top Choice</span>
                        <h3 class="top-book-title">{{ $book->title }}</h3>
                        <p class="top-book-author">{{ $book->author }}</p>
                        <button type="button" class="btn-dark mt-5 w-full text-xs py-3 justify-center"
                            data-book-detail
                            data-book-title="{{ $book->title }}"
                            data-book-author="{{ $book->author }}"
                            data-book-category="{{ $book->category->name ?? '' }}"
                            data-book-stock="{{ $book->stock ?? 0 }}"
                            data-book-description="{{ $book->description }}"
                            data-book-image="{{ $book->cover ? asset('storage/' . $book->cover) : '' }}"
                            data-book-action-url="{{ auth()->check() ? '/book-categories/' . $book->category_id : '' }}"
                            data-book-login-url="{{ route('login.show') }}"
                            data-book-is-logged-in="{{ auth()->check() ? '1' : '0' }}">

                            Lihat Detail
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center py-16">
                    <p class="font-serif text-2xl font-light text-mocha/40">Buku unggulan belum tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ════════════════════════════════ RESERVATION ════════════════════════════════ -->
<section id="reservasi" class="res-section py-28 px-6">
    <div class="max-w-4xl mx-auto" data-aos="fade-up">
        <div class="res-card">
            <!-- Header -->
            <div class="text-center mb-10">
                <div class="section-eyebrow justify-center">Reservation</div>
                <h2 class="section-title">Reserve Your<br><em>Corner</em></h2>
                <p class="text-sm text-mocha/60 mt-4 font-light">Temukan sudut favoritmu untuk membaca, bekerja, atau menikmati kopi hangat.</p>
            </div>

            <form class="space-y-4">
                <div class="grid md:grid-cols-2 gap-4">
                    <input type="text" placeholder="Nama Lengkap" class="res-input" />
                    <input type="email" placeholder="Email" class="res-input" />
                </div>
                <div class="grid md:grid-cols-2 gap-4">
                    <input type="date" class="res-input" />
                    <input type="number" placeholder="Jumlah Orang" min="1" class="res-input" />
                </div>
                <button type="submit" class="res-submit">Check Availability →</button>
            </form>
        </div>
    </div>
</section>

<!-- ════════════════════════════════ FOOTER ════════════════════════════════ -->
<footer style="background: #0D0806;">
    <div class="max-w-6xl mx-auto px-6 pt-20 pb-12">
        <div class="grid lg:grid-cols-3 gap-12 pb-16">
            <div>
                <h2 class="footer-logo">Kairos</h2>
                <p class="text-white/30 mt-3 text-xs uppercase tracking-[0.3em]">Coffee · Books · Silence</p>
                <p class="text-white/25 mt-5 text-sm font-light leading-relaxed max-w-xs">
                    A sanctuary for those who seek warmth, stories, and the perfect cup.
                </p>
            </div>
            <div>
                <p class="text-white/50 text-xs uppercase tracking-widest mb-5">Contact</p>
                <p class="text-white/40 text-sm font-light">hello@kairoscoffee.id</p>
                <p class="text-white/40 text-sm font-light mt-2">+62 21 1234 5678</p>
                <p class="text-white/25 text-sm font-light mt-4">Jl. Kairos No. 1, Jakarta</p>
            </div>
            <div>
                <p class="text-white/50 text-xs uppercase tracking-widest mb-5">Follow Us</p>
                <div class="flex gap-3">
                    <span class="social-btn">IG</span>
                    <span class="social-btn">FB</span>
                    <span class="social-btn">TW</span>
                </div>
                <p class="text-white/20 text-xs mt-6 font-light leading-relaxed">
                    Mon–Fri: 8am – 10pm<br>
                    Sat–Sun: 9am – 11pm
                </p>
            </div>
        </div>
        <div class="footer-divider"></div>
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-white/20 text-xs">© 2026 Kairos Coffee. All Rights Reserved.</p>
            <p class="text-white/15 text-xs font-light italic font-serif">Where every moment has meaning.</p>
        </div>
    </div>
</footer>

@include('partials.book-detail-modal')

<!-- ════════════ SCRIPTS ════════════ -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
(function () {
    /* ── PAGE LOAD ── */
    window.addEventListener('load', function () {
        setTimeout(function () {
            document.body.classList.add('loaded');
            const loader = document.getElementById('pageLoader');
            if (loader) {
                loader.style.transition = 'opacity .8s ease';
                loader.style.opacity = '0';
                setTimeout(() => loader.remove(), 900);
            }
        }, 1900);
    });

    document.addEventListener('DOMContentLoaded', function () {
        /* AOS */
        AOS.init({ duration: 900, once: true, easing: 'ease-out-cubic', offset: 80 });

        /* ── CUSTOM CURSOR ── */
        const dot  = document.getElementById('cursorDot');
        const ring = document.getElementById('cursorRing');
        let mx = 0, my = 0, rx = 0, ry = 0;
        document.addEventListener('mousemove', (e) => { mx = e.clientX; my = e.clientY; });
        (function animCursor() {
            if (dot)  { dot.style.left  = mx + 'px'; dot.style.top  = my + 'px'; }
            rx += (mx - rx) * 0.14;
            ry += (my - ry) * 0.14;
            if (ring) { ring.style.left = rx + 'px'; ring.style.top = ry + 'px'; }
            requestAnimationFrame(animCursor);
        })();
        document.querySelectorAll('a,button').forEach(el => {
            el.addEventListener('mouseenter', () => { if (ring) { ring.style.width='56px'; ring.style.height='56px'; ring.style.opacity='.6'; } });
            el.addEventListener('mouseleave', () => { if (ring) { ring.style.width='36px'; ring.style.height='36px'; ring.style.opacity='1'; } });
        });

        /* ── NAVBAR SCROLL ── */
        const navbar = document.getElementById('kairosNavbar');
        const onScroll = () => navbar && navbar.classList.toggle('scrolled', window.scrollY > 60);
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();

        /* ── MOBILE MENU ── */
        const mobileToggle = document.getElementById('mobileMenuButton');
        const mobileMenu   = document.getElementById('mobileMenu');
        if (mobileToggle && mobileMenu) {
            mobileToggle.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
        }

        /* ── HERO PARALLAX ── */
        const heroImg = document.querySelector('.hero-img-wrap img');
        let heroTarget = 0, heroCurrent = 0;
        if (heroImg) {
            window.addEventListener('scroll', () => { heroTarget = window.scrollY * 0.2; }, { passive: true });
            (function animHero() {
                heroCurrent += (heroTarget - heroCurrent) * 0.07;
                heroImg.style.transform = `scale(1) translateY(${heroCurrent}px)`;
                requestAnimationFrame(animHero);
            })();
        }

        /* ── COUNTER ANIMATION ── */
        const counters = document.querySelectorAll('[data-count]');
        counters.forEach(el => {
            const target = parseInt(el.getAttribute('data-count'), 10);
            let current = 0;
            const step = Math.ceil(target / 70);
            const update = () => {
                current = Math.min(current + step, target);
                el.childNodes[0].textContent = current.toLocaleString();
                if (current < target) requestAnimationFrame(update);
            };
            setTimeout(update, 2000);
        });

        /* ── SCROLL INDICATOR ── */
        const progressBar = document.createElement('div');
        progressBar.style.cssText = `position:fixed;top:0;left:0;height:2px;background:linear-gradient(90deg,var(--gold),var(--latte));z-index:9999;width:0%;transition:width .1s;pointer-events:none;`;
        document.body.appendChild(progressBar);
        window.addEventListener('scroll', () => {
            const pct = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
            progressBar.style.width = pct + '%';
        }, { passive: true });
    });
})();
</script>
</body>
</html>