<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Create Book Category</title>
</head>
<body>
    <h1>Create Book Category</h1>

    <form method="POST" action="{{ route('admin.book_categories.store') }}">
        @csrf

        <div>
            <label>Name</label>
            <input name="name" value="{{ old('name') }}" required maxlength="100">
        </div>

        <button type="submit">Save</button>
    </form>

    <p><a href="{{ route('admin.book_categories.index') }}">Back</a></p>
</body>
</html>

