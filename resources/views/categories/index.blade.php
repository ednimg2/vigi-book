<h1>Categories</h1>

@if ($message = Session::get('success'))
    <div>{{ $message }}</div>
@endif
<a href="{{ url('categories/create') }}">Create new category</a>
<ul>
@foreach($categories as $category)
    <li>{{ $category->name }} : {{ $category->enabled }}</li>
@endforeach
</ul>
