<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books - {{ $bookCategory->name }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#FBF9F4] text-[#2C1A11]">

    <div class="max-w-6xl mx-auto px-6 py-10">
        <div class="flex items-center justify-between gap-6">
            <h1 class="font-serif text-4xl font-bold text-[#4A3525]">{{ $bookCategory->name }}</h1>
            <a href="/" class="text-sm bg-[#4A3525] text-[#FBF9F4] px-4 py-2 rounded-full">Kembali ke Landing</a>
        </div>

        <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($books as $book)
                <div class="bg-white border border-[#7D6E65]/10 rounded-[24px] overflow-hidden shadow-sm">
                    <div class="h-72 bg-gray-100 overflow-hidden">
                        <img
                            src="{{ $book->cover ? asset('storage/' . $book->cover) : 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=800' }}"
                            alt="{{ $book->title }}"
                            class="w-full h-full object-cover"
                        >

                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl text-[#4A3525]">{{ $book->title }}</h3>
                        @if(!empty($book->author))
                            <p class="mt-2 text-gray-600">{{ $book->author }}</p>
                        @endif
                        @if(isset($book->stock))
                            <p class="mt-4 text-sm text-gray-500">Stok: <span class="font-semibold">{{ $book->stock }}</span></p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="md:col-span-3 text-center text-gray-500 py-10">
                    Buku untuk kategori ini belum tersedia.
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $books->links() }}
        </div>
    </div>

</body>
</html>

