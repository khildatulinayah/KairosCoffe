```html
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu | Kairos Admin</title>

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

<body class="bg-[#FBF9F4] text-[#2C1A11]">

<header class="sticky top-0 z-50 bg-[#FBF9F4]/90 backdrop-blur border-b border-[#E8DED1]">

    <div class="max-w-6xl mx-auto px-6 py-5 flex justify-between items-center">

        <div>
            <h1 class="font-serif text-3xl font-bold text-[#4A3525]">
                Edit Menu
            </h1>

            <p class="text-sm text-[#7D6E65]">
                Update coffee & food information
            </p>
        </div>

        <a href="{{ route('admin.menus.index') }}"
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

        <!-- Preview -->
        <div class="bg-white rounded-[32px] shadow-sm p-6">

            <h3 class="font-serif text-2xl mb-6">
                Menu Preview
            </h3>

            <div class="aspect-square rounded-3xl overflow-hidden bg-[#F5EFE6]">

                @if($menu->image)

                    <img
                        src="{{ $menu->image }}"
                        alt="{{ $menu->name }}"
                        class="w-full h-full object-cover">

                @else

                    <div class="w-full h-full flex items-center justify-center">
                        <div class="text-center">
                            <div class="text-6xl mb-4">☕</div>
                            <p class="text-[#7D6E65]">
                                No Image
                            </p>
                        </div>
                    </div>

                @endif

            </div>

            <div class="mt-6">

                <div class="flex items-center gap-2">

                    <h4 class="font-semibold text-xl">
                        {{ $menu->name }}
                    </h4>

                    @if($menu->is_featured)
                        <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">
                            Featured
                        </span>
                    @endif

                </div>

                <p class="text-[#7D6E65] mt-1">
                    {{ optional($menu->category)->name }}
                </p>

                <p class="mt-4 font-bold text-[#4A3525] text-2xl">
                    Rp {{ number_format($menu->price, 0, ',', '.') }}
                </p>

            </div>

        </div>

        <!-- Form -->
        <div class="lg:col-span-2 bg-white rounded-[32px] shadow-sm p-8">

            <h2 class="font-serif text-4xl mb-8">
                Menu Information
            </h2>

            <form method="POST"
                  action="{{ route('admin.menus.update', $menu) }}"
                  class="space-y-6">

                @csrf
                @method('PUT')

                <div>

                    <label class="block mb-2 font-medium">
                        Category
                    </label>

                    <select
                        name="category_id"
                        class="w-full rounded-2xl border border-[#E6DDD1] px-5 py-4">

                        <option value="">
                            Select Category
                        </option>

                        @foreach($categories as $cat)

                            <option
                                value="{{ $cat->id }}"
                                @selected($menu->category_id == $cat->id)>

                                {{ $cat->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-medium">
                        Menu Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $menu->name) }}"
                        required
                        class="w-full rounded-2xl border border-[#E6DDD1] px-5 py-4">

                </div>

                <div>

                    <label class="block mb-2 font-medium">
                        Price
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        min="0"
                        name="price"
                        value="{{ old('price', $menu->price) }}"
                        required
                        class="w-full rounded-2xl border border-[#E6DDD1] px-5 py-4">

                </div>

                <div>

                    <label class="block mb-2 font-medium">
                        Image URL
                    </label>

                    <input
                        type="text"
                        name="image"
                        value="{{ old('image', $menu->image) }}"
                        class="w-full rounded-2xl border border-[#E6DDD1] px-5 py-4">

                </div>

                <div>

                    <label class="block mb-2 font-medium">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="w-full rounded-2xl border border-[#E6DDD1] px-5 py-4">{{ old('description', $menu->description) }}</textarea>

                </div>

                <div class="bg-[#F7F2EA] rounded-2xl p-5">

                    <label class="flex items-center gap-3 cursor-pointer">

                        <input
                            type="checkbox"
                            name="is_featured"
                            value="1"
                            {{ old('is_featured', $menu->is_featured) ? 'checked' : '' }}
                            class="w-5 h-5">

                        <div>

                            <div class="font-medium">
                                Featured Menu
                            </div>

                            <div class="text-sm text-[#7D6E65]">
                                Tampilkan menu ini pada bagian menu unggulan.
                            </div>

                        </div>

                    </label>

                </div>

                <div class="flex gap-4 pt-4">

                    <button
                        type="submit"
                        class="bg-[#4A3525] text-white px-8 py-4 rounded-2xl hover:bg-[#2C1A11] transition shadow-md">

                        Update Menu

                    </button>

                    <a href="{{ route('admin.menus.index') }}"
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
```
