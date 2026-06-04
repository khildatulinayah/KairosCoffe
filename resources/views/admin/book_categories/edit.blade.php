<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Edit Book Category</title>
</head>
<body>
    <h1>Edit Book Category</h1>

    <form method="POST" action="{{ route('admin.book_categories.update', $bookCategory) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Name</label>
            <input name="name" value="{{ $bookCategory->name }}" required maxlength="100">
        </div>

        <button type="submit">Update</button>
    </form>

    <p><a href="{{ route('admin.book_categories.index') }}">Back</a></p>
</body>
</html>

