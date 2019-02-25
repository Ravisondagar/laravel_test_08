<table>
    <thead>
    <tr>
        <th>User</th>
        <th>Blog Category</th>
        <th>Name</th>
        <th>Description</th>

    </tr>
    </thead>
    <tbody>
    @foreach($blogs as $blog)
        <tr>
            <td>{{ $blog->user->name }}</td>
            <td>{{ $blog->blog_category ? $blog->blog_category->name : '' }}</td>
            <td>{{ $blog->name }}</td>
            <td>{{ $blog->description }}</td>
        </tr>
    @endforeach
    </tbody>
</table>