<h1>Categories</h1>

@if ($message = Session::get('success'))
    <div>{{ $message }}</div>
@endif
<a href="{{ url('categories/create') }}">Create new category</a>
<ul>
@foreach($categories as $category)
    <li>{{ $category->name }} : {{ $category->enabled }}
        <a href="{{ route('category.edit', ['id' => $category->id]) }}">Edit</a>

        <form action="{{ route('category.delete', ['id' => $category->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
@endforeach
</ul>
