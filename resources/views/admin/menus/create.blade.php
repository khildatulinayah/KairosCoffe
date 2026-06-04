<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Create Menu</title>
</head>
<body>
    <h1>Create Menu</h1>

    <form method="POST" action="{{ route('admin.menus.store') }}">
        @csrf

        <div>
            <label>Category</label>
            <select name="category_id">
                <option value="">-- none --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Name</label>
            <input name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label>Description</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label>Price</label>
            <input name="price" type="number" step="0.01" min="0" value="{{ old('price') }}" required>
        </div>

        <div>
            <label>Image (filename/url)</label>
            <input name="image" value="{{ old('image') }}">
        </div>

        <div>
            <label>
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                Featured
            </label>
        </div>

        <button type="submit">Save</button>
    </form>

    <p><a href="{{ route('admin.menus.index') }}">Back</a></p>
</body>
</html>

