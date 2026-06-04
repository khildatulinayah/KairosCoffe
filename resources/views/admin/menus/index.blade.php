<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Menus</title>
</head>
<body>
    <h1>Menus</h1>

    <p><a href="{{ route('admin.menus.create') }}">+ Add Menu</a></p>

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
                <th>Category</th>
                <th>Price</th>
                <th>Featured</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->id }}</td>
                <td>{{ $menu->name }}</td>
                <td>{{ optional($menu->category)->name }}</td>
                <td>{{ $menu->price }}</td>
                <td>{{ $menu->is_featured ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('admin.menus.edit', $menu) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.menus.destroy', $menu) }}" style="display:inline-block;" onsubmit="return confirm('Delete this menu?')">
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
        {{ $menus->links() }}
    </div>
</body>
</html>

