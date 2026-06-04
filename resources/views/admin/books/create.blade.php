<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book | Kairos Admin</title>

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

    <!-- Header -->
    <header class="sticky top-0 z-50 bg-[#FBF9F4]/90 backdrop-blur border-b border-[#E8DED1]">

        <div class="max-w-6xl mx-auto px-6 py-5 flex justify-between items-center">

            <div>
                <h1 class="font-serif text-3xl font-bold text-[#4A3525]">
                    Add New Book
                </h1>

                <p class="text-sm text-[#7D6E65]">
                    Create a new collection entry
                </p>
            </div>

            <a href="{{ route('admin.books.index') }}"
               class="px-5 py-3 rounded-full border border-[#DCCDBA] hover:bg-white transition">
                ← Back
            </a>

        </div>

    </header>

    <main class="max-w-6xl mx-auto px-6 py-10">

        @if ($errors->any())
            <div class="mb-8 bg-red-50 border border-red-200 text-red-700 rounded-2xl p-5">
                <ul class="list-disc ml-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid lg:grid-cols-3 gap-8">

            <!-- Preview Card -->
            <div class="bg-white rounded-[32px] shadow-sm p-6">

                <h3 class="font-serif text-2xl mb-6">
                    Cover Preview
                </h3>

                <div class="aspect-[3/4] rounded-3xl bg-[#F5EFE6] flex items-center justify-center">

                    <div class="text-center">

                        <div class="text-6xl mb-4">
                            📚
                        </div>

                        <p class="text-[#7D6E65]">
                            Book Cover Preview
                        </p>

                        <img id="cover-preview"
                             class="hidden mx-auto mt-4 w-full h-full object-cover"
                             style="max-height: 320px; width: auto; border-radius: 16px;" />

                    </div>

                </div>

                <div class="mt-6">

                    <h4 class="font-semibold text-lg">
                        New Book
                    </h4>

                    <p class="text-[#7D6E65]">
                        Author Name
                    </p>

                </div>

            </div>

            <!-- Form -->
            <div class="lg:col-span-2 bg-white rounded-[32px] shadow-sm p-8">

                <h2 class="font-serif text-4xl mb-8">
                    Book Information
                </h2>

<form method="POST"
                      action="{{ route('admin.books.store') }}"
                      enctype="multipart/form-data"
                      class="space-y-6" id="book-form">

                    @csrf

                    <div>
                        <label class="block mb-2 font-medium">
                            Category
                        </label>

                        <select
                            name="category_id"
                            class="w-full rounded-2xl border border-[#E6DDD1] px-5 py-4 focus:outline-none focus:ring-2 focus:ring-[#D4B996]">

                            <option value="">
                                Select Category
                            </option>

                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">
                                    {{ $cat->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">
                            Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            required
                            placeholder="Atomic Habits"
                            class="w-full rounded-2xl border border-[#E6DDD1] px-5 py-4">
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">
                            Author
                        </label>

                        <input
                            type="text"
                            name="author"
                            value="{{ old('author') }}"
                            placeholder="James Clear"
                            class="w-full rounded-2xl border border-[#E6DDD1] px-5 py-4">
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">
                            Cover Image
                        </label>

                        <input
                            type="file"
                            name="cover"
                            accept="image/*"
                            class="w-full rounded-2xl border border-[#E6DDD1] px-5 py-4">

                        @error('cover')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>


                    <div>
                        <label class="block mb-2 font-medium">
                            Stock
                        </label>

                        <input
                            type="number"
                            name="stock"
                            min="0"
                            value="{{ old('stock', 0) }}"
                            required
                            class="w-full rounded-2xl border border-[#E6DDD1] px-5 py-4">
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="6"
                            placeholder="Write a short description..."
                            class="w-full rounded-2xl border border-[#E6DDD1] px-5 py-4">{{ old('description') }}</textarea>
                    </div>

                    <div class="flex gap-4 pt-4">

                        <button
                            type="submit"
                            class="bg-[#4A3525] text-white px-8 py-4 rounded-2xl hover:bg-[#2C1A11] transition shadow-md">

                            Save Book
                        </button>

                        <a href="{{ route('admin.books.index') }}"
                           class="px-8 py-4 rounded-2xl border border-[#DCCDBA] hover:bg-[#F7F2EA] transition">

                            Cancel
                        </a>

                    </div>

                </form>

                <script>
                    (function () {
                        const fileInput = document.querySelector('input[name="cover"]');
                        const previewImg = document.getElementById('cover-preview');
                        if (!fileInput || !previewImg) return;

                        fileInput.addEventListener('change', function () {
                            const file = this.files && this.files[0];
                            if (!file) {
                                previewImg.classList.add('hidden');
                                previewImg.removeAttribute('src');
                                return;
                            }

                            const reader = new FileReader();
                            reader.onload = function (e) {
                                previewImg.src = e.target.result;
                                previewImg.classList.remove('hidden');
                            };
                            reader.readAsDataURL(file);
                        });
                    })();
                </script>

            </div>

        </div>

    </main>

</body>
</html>