<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book Category | Kairos Admin</title>

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

<body class="bg-[#FBF9F4] text-[#2C1A11] min-h-screen">

<header class="sticky top-0 z-50 bg-[#FBF9F4]/90 backdrop-blur border-b border-[#E8DED1]">

    <div class="max-w-5xl mx-auto px-6 py-5 flex justify-between items-center">

        <div>
            <h1 class="font-serif text-3xl font-bold text-[#4A3525]">
                Add Book Category
            </h1>

            <p class="text-sm text-[#7D6E65]">
                Create a new category for your library
            </p>
        </div>

        <a href="{{ route('admin.book_categories.index') }}"
           class="px-5 py-3 rounded-full border border-[#DCCDBA] hover:bg-white transition">
            ← Back
        </a>

    </div>

</header>

<main class="max-w-3xl mx-auto px-6 py-12">

    @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-2xl p-5">
            <ul class="list-disc ml-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-[32px] shadow-sm overflow-hidden">

        <!-- Hero -->
        <div class="bg-gradient-to-r from-[#4A3525] to-[#6E5341] p-8 text-white">

            <div class="flex items-center gap-4">

                <div class="w-16 h-16 rounded-2xl bg-white/10 flex items-center justify-center text-3xl">
                    📚
                </div>

                <div>
                    <h2 class="font-serif text-3xl">
                        New Category
                    </h2>

                    <p class="text-white/70 mt-1">
                        Organize your book collections more effectively.
                    </p>
                </div>

            </div>

        </div>

        <!-- Form -->
        <div class="p-8">

            <form method="POST"
                  action="{{ route('admin.book_categories.store') }}"
                  class="space-y-6">

                @csrf

                <div>

                    <label class="block mb-2 font-medium">
                        Category Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        maxlength="100"
                        required
                        value="{{ old('name') }}"
                        placeholder="e.g. Fiction, Business, Self Development"
                        class="w-full rounded-2xl border border-[#E6DDD1] px-5 py-4 focus:outline-none focus:ring-2 focus:ring-[#D4B996]">

                    <p class="text-sm text-[#7D6E65] mt-2">
                        Maximum 100 characters.
                    </p>

                </div>

                <div class="flex gap-4 pt-2">

                    <button
                        type="submit"
                        class="bg-[#4A3525] text-white px-8 py-4 rounded-2xl hover:bg-[#2C1A11] transition shadow-md">

                        Save Category

                    </button>

                    <a href="{{ route('admin.book_categories.index') }}"
                       class="px-8 py-4 rounded-2xl border border-[#DCCDBA] hover:bg-[#F7F2EA] transition">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</main>

</body>
</html>