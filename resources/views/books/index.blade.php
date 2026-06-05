<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books - {{ $bookCategory->name }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --cream:     #F5EFE6;
            --parchment: #EDE3D5;
            --espresso:  #1A0F09;
            --bark:      #3D2314;
            --mocha:     #6B4226;
            --latte:     #C8A882;
            --gold:      #B8965A;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--cream);
            color: var(--bark);
            overflow-x: hidden;
            opacity: 0;
            transition: opacity .7s ease;
        }
        body.loaded { opacity: 1; }

        /* ── CURSOR ── */
        .cursor-dot {
            width: 7px; height: 7px; background: var(--gold); border-radius: 50%;
            position: fixed; pointer-events: none; z-index: 9999;
            transform: translate(-50%,-50%); transition: width .3s, height .3s;
        }
        .cursor-ring {
            width: 34px; height: 34px;
            border: 1.5px solid rgba(184,150,90,.45); border-radius: 50%;
            position: fixed; pointer-events: none; z-index: 9998;
            transform: translate(-50%,-50%);
            transition: width .3s, height .3s, opacity .3s;
        }

        /* ── NAVBAR ── */
        #navbar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 50;
            padding: 1rem 1.5rem;
            transition: background .5s, padding .5s;
        }
        #navbar.scrolled {
            background: rgba(26,15,9,.9);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: .6rem 1.5rem;
        }
        .nav-inner {
            max-width: 1280px; margin: 0 auto;
            display: flex; align-items: center; justify-content: space-between;
            border-radius: 100px;
            border: 1px solid rgba(255,255,255,.1);
            background: rgba(26,15,9,.55);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: .7rem 1.2rem;
        }
        #navbar.scrolled .nav-inner { background: transparent; border-color: transparent; }

        /* ── HERO STRIP ── */
        .hero-strip {
            min-height: 44vh;
            background: var(--espresso);
            position: relative; overflow: hidden;
            display: flex; align-items: flex-end;
            padding: clamp(6rem,12vw,9rem) clamp(1.5rem,5vw,4rem) clamp(2.5rem,5vw,4rem);
        }
        .hero-strip::before {
            content: '';
            position: absolute; inset: 0;
            background: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E") repeat;
            background-size: 180px; opacity: .04;
        }
        .hero-bg-word {
            position: absolute; right: -0.05em; bottom: -.15em;
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(8rem,18vw,18rem); font-weight: 700; font-style: italic;
            color: rgba(255,255,255,.03); line-height: 1;
            user-select: none; pointer-events: none; white-space: nowrap;
        }
        .hero-eyebrow {
            font-size: .65rem; letter-spacing: .4em; text-transform: uppercase;
            color: var(--latte); display: flex; align-items: center; gap: .7rem;
            margin-bottom: 1rem;
        }
        .hero-eyebrow::before { content: ''; width: 28px; height: 1px; background: var(--gold); }
        .hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2.8rem,6vw,5.5rem); font-weight: 400; line-height: 1.05;
            color: var(--cream); letter-spacing: -.01em;
        }
        .hero-title em { font-style: italic; color: var(--latte); }

        /* ── BACK BUTTON ── */
        .back-btn {
            display: inline-flex; align-items: center; gap: .5rem;
            font-size: .7rem; font-weight: 500; letter-spacing: .12em; text-transform: uppercase;
            color: rgba(245,239,230,.55);
            border: 1px solid rgba(245,239,230,.15); border-radius: 100px;
            padding: .55rem 1.1rem;
            transition: border-color .3s, color .3s, background .3s;
        }
        .back-btn:hover { border-color: var(--gold); color: var(--latte); background: rgba(184,150,90,.08); }

        /* ── FILTER BAR ── */
        .filter-bar {
            background: white;
            border-bottom: 1px solid rgba(61,35,20,.08);
            padding: 1rem clamp(1.5rem,5vw,4rem);
            position: sticky; top: 0; z-index: 40;
            /* stays below navbar */
        }
        .filter-inner {
            max-width: 1280px; margin: 0 auto;
            display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap;
        }
        .filter-count {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem; font-weight: 400; color: var(--mocha);
        }
        .filter-count span { color: var(--gold); }
        .sort-select {
            font-family: 'DM Sans', sans-serif;
            font-size: .75rem; color: var(--bark);
            border: 1px solid rgba(61,35,20,.15); border-radius: 100px;
            background: var(--cream); padding: .5rem 1rem;
            outline: none; cursor: pointer;
            transition: border-color .3s;
        }
        .sort-select:focus { border-color: var(--gold); }

        /* ── GRID ── */
        .books-grid {
            max-width: 1280px; margin: 0 auto;
            padding: clamp(2.5rem,5vw,4rem) clamp(1.5rem,5vw,4rem);
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));

            gap: 1.75rem;
        }

        /* ── BOOK CARD ── */
        .book-card {
            background: white;
            border-radius: 1.75rem;
            overflow: hidden;
            border: 1px solid rgba(61,35,20,.08);
            transition: transform .4s cubic-bezier(.22,1,.36,1), box-shadow .4s;
            display: flex; flex-direction: column;
        }
        .book-card:hover { transform: translateY(-8px); box-shadow: 0 36px 80px rgba(26,15,9,.14); }

        .book-card-img {
            position: relative; overflow: hidden;
            height: 300px; background: var(--parchment);
            flex-shrink: 0;
        }
        .book-card-img img {
            width: 100%; height: 100%; object-fit: cover;
            transition: transform .7s cubic-bezier(.22,1,.36,1);
        }
        .book-card:hover .book-card-img img { transform: scale(1.06); }

        /* stock badge on image */
        .stock-badge {
            position: absolute; bottom: .85rem; right: .85rem;
            font-size: .6rem; font-weight: 500; letter-spacing: .2em; text-transform: uppercase;
            border-radius: 100px; padding: .35rem .8rem;
        }
        .stock-badge.available {
            background: rgba(26,15,9,.65); color: var(--latte);
            border: 1px solid rgba(200,168,130,.25);
            backdrop-filter: blur(8px);
        }
        .stock-badge.empty {
            background: rgba(200,60,60,.7); color: #fff;
        }

        .book-card-body {
            padding: 1.4rem 1.5rem 1.6rem;
            flex: 1; display: flex; flex-direction: column;
        }
        .book-card-label {
            font-size: .6rem; letter-spacing: .3em; text-transform: uppercase;
            color: var(--gold); margin-bottom: .6rem;
        }
        .book-card-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.35rem; font-weight: 500; line-height: 1.25;
            color: var(--bark);
        }
        .book-card-author {
            font-size: .78rem; color: var(--mocha); opacity: .65;
            margin-top: .35rem;
        }
        .book-card-footer {
            display: flex; align-items: center; justify-content: space-between;
            margin-top: auto; padding-top: 1.1rem;
            border-top: 1px solid rgba(61,35,20,.07);
        }
        .stock-text {
            font-size: .7rem; color: var(--mocha); opacity: .55;
        }
        .stock-text strong { opacity: 1; color: var(--bark); }

        .btn-detail {
            display: inline-flex; align-items: center; gap: .4rem;
            font-size: .7rem; font-weight: 600; letter-spacing: .1em; text-transform: uppercase;
            background: var(--bark); color: var(--cream);
            padding: .55rem 1.15rem; border-radius: 100px;
            transition: background .3s, transform .25s;
        }
        .btn-detail:hover { background: var(--espresso); transform: translateY(-1px); }

        /* ── EMPTY STATE ── */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center; padding: 5rem 2rem;
        }
        .empty-icon {
            width: 72px; height: 72px; border-radius: 24px;
            background: var(--parchment);
            display: flex; align-items: center; justify-content: center;
            font-size: 2rem; margin: 0 auto 1.5rem;
        }
        .empty-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem; font-weight: 400; color: var(--bark);
        }
        .empty-sub { font-size: .85rem; color: var(--mocha); opacity: .55; margin-top: .5rem; }

        /* ── PAGINATION ── */
        .pagination-wrap {
            max-width: 1280px; margin: 0 auto;
            padding: 0 clamp(1.5rem,5vw,4rem) clamp(3rem,6vw,5rem);
        }
        /* Override default laravel pagination links */
        .pagination-wrap nav {
            display: flex; justify-content: center;
        }
        .pagination-wrap .flex { gap: .35rem; }
        .pagination-wrap span[aria-current],
        .pagination-wrap a {
            display: inline-flex; align-items: center; justify-content: center;
            min-width: 38px; height: 38px; border-radius: 100px;
            font-size: .75rem; font-weight: 500;
            border: 1px solid rgba(61,35,20,.15); color: var(--bark);
            background: white; transition: background .25s, border-color .25s, color .25s;
            text-decoration: none; padding: 0 .9rem;
        }
        .pagination-wrap a:hover { border-color: var(--gold); color: var(--mocha); }
        .pagination-wrap span[aria-current] {
            background: var(--bark); border-color: var(--bark); color: var(--cream);
        }

        /* ── SCROLL PROGRESS ── */
        #scrollProgress {
            position: fixed; top: 0; left: 0; height: 2px; width: 0%;
            background: linear-gradient(90deg, var(--gold), var(--latte));
            z-index: 9999; pointer-events: none; transition: width .1s;
        }

        /* ── CARD SKELETON (loading placeholder effect) ── */
        @keyframes shimmer {
            from { background-position: -400px 0; }
            to   { background-position: 400px 0; }
        }
    </style>
</head>

<body>
<!-- CURSOR -->
<div class="cursor-dot" id="cursorDot"></div>
<div class="cursor-ring" id="cursorRing"></div>

<!-- SCROLL PROGRESS -->
<div id="scrollProgress"></div>

<!-- ════════ NAVBAR ════════ -->
<nav id="navbar">
    <div class="nav-inner">
        <a href="/" class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full flex items-center justify-center" style="background:rgba(200,168,130,.18);border:1px solid rgba(200,168,130,.3)">
                <span style="font-family:'Cormorant Garamond',serif;color:var(--latte);font-size:.9rem">K</span>
            </div>
            <div>
                <p style="font-family:'Cormorant Garamond',serif;font-size:1.1rem;color:var(--cream);line-height:1">Kairos</p>
                <p style="font-size:9px;letter-spacing:.28em;text-transform:uppercase;color:rgba(200,168,130,.45);line-height:1;margin-top:2px">Coffee · Books · Silence</p>
            </div>
        </a>

        <a href="/" class="back-btn">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                <path d="M8 1L3 6L8 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Back to Home
        </a>
    </div>
</nav>

<!-- ════════ HERO STRIP ════════ -->
<header class="hero-strip">
    <span class="hero-bg-word">Books</span>
    <div style="position:relative;z-index:2;max-width:1280px;width:100%;margin:0 auto;">
        <div class="hero-eyebrow">Kairos Library</div>
        <h1 class="hero-title">{{ $bookCategory->name }}<br><em>Collection</em></h1>
    </div>
</header>

<!-- ════════ FILTER BAR ════════ -->
<div class="filter-bar">
    <div class="filter-inner">
        <p class="filter-count">
            Menampilkan <span>{{ $books->total() }}</span> buku
        </p>
        <select class="sort-select" onchange="">
            <option value="">Urutkan: Default</option>
            <option value="title">Judul A–Z</option>
            <option value="author">Penulis</option>
            <option value="stock">Stok Tersedia</option>
        </select>
    </div>
</div>

<!-- ════════ BOOKS GRID ════════ -->
<main>
    
    <!-- Buku Detail Modal -->
    @include('partials.book-detail-modal')

    <div class="books-grid">
        @forelse($books as $book)
            <div class="book-card" style="animation: fadeUp .6s ease both; animation-delay: {{ $loop->index * 60 }}ms">

                <div class="book-card-img">
                    <img
                        src="{{ $book->cover ? asset('storage/' . $book->cover) : 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=800' }}"
                        alt="{{ $book->title }}"
                        loading="lazy"
                    >
                    @if(isset($book->stock))
                        @if($book->stock > 0)
                            <span class="stock-badge available">{{ $book->stock }} tersedia</span>
                        @else
                            <span class="stock-badge empty">Habis</span>
                        @endif
                    @endif
                </div>

                <div class="book-card-body">
                    <p class="book-card-label">{{ $bookCategory->name }}</p>
                    <h3 class="book-card-title">{{ $book->title }}</h3>
                    @if(!empty($book->author))
                        <p class="book-card-author">{{ $book->author }}</p>
                    @endif

                    <div class="book-card-footer">
                        @if(isset($book->stock))
                            <p class="stock-text">Stok: <strong>{{ $book->stock }}</strong></p>
                        @else
                            <span></span>
                        @endif
                        <a
                            href="#"
                            class="btn-detail"
                            data-book-detail
                            data-book-title="{{ $book->title }}"
                            data-book-author="{{ $book->author ?? '' }}"
                            data-book-category="{{ $bookCategory->name }}"
                            data-book-stock="{{ $book->stock ?? 0 }}"
                            data-book-description="{{ $book->description ?? '' }}"
                            data-book-image="{{ $book->cover ? asset('storage/' . $book->cover) : '' }}"
                            data-book-action-url="#"
                        >Detail →</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <div class="empty-icon">📚</div>
                <h3 class="empty-title">Belum ada buku</h3>
                <p class="empty-sub">Buku untuk kategori <strong>{{ $bookCategory->name }}</strong> belum tersedia.</p>
                <a href="/" class="btn-detail" style="margin-top:1.5rem;display:inline-flex">← Kembali ke Home</a>
            </div>
        @endforelse
    </div>

    <!-- ════════ PAGINATION ════════ -->
    <div class="pagination-wrap">
        {{ $books->links() }}
    </div>
</main>

<!-- ════════ FOOTER MINI ════════ -->
<footer style="background:var(--espresso);padding:2.5rem clamp(1.5rem,5vw,4rem);">
    <div style="max-width:1280px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;">
        <p style="font-family:'Cormorant Garamond',serif;font-size:1.3rem;color:var(--latte);font-weight:300">Kairos</p>
        <p style="font-size:.7rem;color:rgba(245,239,230,.25);letter-spacing:.1em">© 2026 Kairos Coffee. All Rights Reserved.</p>
    </div>
</footer>

<style>
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(24px); }
    to   { opacity: 1; transform: translateY(0); }
}
</style>

<script>
(function () {
    /* ── LOAD ── */
    window.addEventListener('load', () => {
        document.body.classList.add('loaded');
    });

    document.addEventListener('DOMContentLoaded', () => {
        /* ── CURSOR ── */
        const dot  = document.getElementById('cursorDot');
        const ring = document.getElementById('cursorRing');
        let mx = 0, my = 0, rx = 0, ry = 0;
        document.addEventListener('mousemove', e => { mx = e.clientX; my = e.clientY; });
        (function animC() {
            if (dot)  { dot.style.left  = mx + 'px'; dot.style.top  = my + 'px'; }
            rx += (mx - rx) * 0.13; ry += (my - ry) * 0.13;
            if (ring) { ring.style.left = rx + 'px'; ring.style.top = ry + 'px'; }
            requestAnimationFrame(animC);
        })();
        document.querySelectorAll('a, button, select').forEach(el => {
            el.addEventListener('mouseenter', () => { if (ring) { ring.style.width = '52px'; ring.style.height = '52px'; ring.style.opacity = '.5'; }});
            el.addEventListener('mouseleave', () => { if (ring) { ring.style.width = '34px'; ring.style.height = '34px'; ring.style.opacity = '1'; }});
        });

        /* ── NAVBAR SCROLL ── */
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (navbar) navbar.classList.toggle('scrolled', window.scrollY > 50);
        }, { passive: true });

        /* ── SCROLL PROGRESS ── */
        const bar = document.getElementById('scrollProgress');
        window.addEventListener('scroll', () => {
            const pct = window.scrollY / (document.body.scrollHeight - window.innerHeight) * 100;
            if (bar) bar.style.width = pct + '%';
        }, { passive: true });
    });
})();
</script>
</body>
</html>