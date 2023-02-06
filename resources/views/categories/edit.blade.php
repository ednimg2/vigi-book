@extends('components.layout')

@section('title', 'Edit '. $category->name)

@section('content')
<h1>Category {{ $category->name }} edit form</h1>

<form action="{{ route('category.edit', ['id' => $category->id]) }}" method="post">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @csrf
    <input type="text" name="name" placeholder="Category name" value="{{ old("name", $category->name) }}"><br>
    Enabled? <input type="checkbox" name="enabled" value="1" @if ($category->enabled === 1) checked="checked" @endif><br>
    <button type="submit">Save</button>
</form>
@endsection
