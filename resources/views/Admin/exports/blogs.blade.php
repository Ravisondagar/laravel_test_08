<table>
    <thead>
    <tr>
        <th>User Name</th>
        <th>Blog Name</th>
        <th>Blog Category Name</th>
        <th>Description</th>
        <th>Create at</th>
        <th>Update at</th>

    </tr>
    </thead>
    <tbody>
    @php $i = 1; @endphp
    @foreach($blogs as $key => $blog)
        <tr>
            <td contenteditable='true' @if($i <= 5) style="background-color: #FFC0CB;" @else style="background-color: #b2b2ff;" @endif>{{ $blog->user->name }}</td>
            <td contenteditable='true' @if($i <= 5) style="background-color: #FFC0CB;" @else style="background-color: #b2b2ff;" @endif>{{ $blog->name }}</td>
            <td contenteditable='true' @if($i <= 5) style="background-color: #FFC0CB;" @else style="background-color: #b2b2ff;" @endif>{{ $blog->blog_category ? $blog->blog_category->name : '' }}</td>
            <td @if($i <= 5) style="background-color: #b2b2ff;" @else style="background-color: #FFC0CB;" @endif>{{ $blog->description }}</td>
            <td @if($i <= 5) style="background-color: #b2b2ff;" @else style="background-color: #FFC0CB;" @endif>{{ $blog->created_at }}</td>
            <td @if($i <= 5) style="background-color: #b2b2ff;" @else style="background-color: #FFC0CB;" @endif>{{ $blog->updated_at }}</td>
            @php 
                $i++; 
                if($i == 10){
                    $i=1;
                }
            @endphp
        </tr>
    @endforeach
    </tbody>
</table>