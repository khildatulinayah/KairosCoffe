<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Book Categories</title>
</head>
<body>
    <h1>Book Categories</h1>

    <p><a href="{{ route('admin.book_categories.create') }}">+ Add Category</a></p>

    @if(session('success'))
        <div style="background:#e6ffed;padding:8px;margin:8px 0;border:1px solid #b7f5c5;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td>
                    <a href="{{ route('admin.book_categories.edit', $cat) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.book_categories.destroy', $cat) }}" style="display:inline-block;" onsubmit="return confirm('Delete this category?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div style="margin-top:16px;">
        {{ $categories->links() }}
    </div>
</body>
</html>

