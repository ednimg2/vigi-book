@extends('components.layout')

@section('content')
    <h3>Create new book</h3>

    <form action="{{ url('books/store') }}" method="post" class="row g-3">
        @csrf
        <div class="col-12">
            <label class="form-label">Book name:</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Book name">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label class="form-label">Author:</label>
            <select name="author_id[]" class="form-control @error('author_id') is-invalid @enderror" multiple>
                @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->full_name }}</option>
                @endforeach
            </select>
            @error('author_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-12">
            <label class="form-label">Category:</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @foreach($category->childrenCategories as $childrenCategory)
                        <option value="{{ $childrenCategory->id }}">--- {{ $childrenCategory->name }}</option>
                    @endforeach
                @endforeach
            </select>
        </div>

        <div class="col-12">
            <label class="form-label">Page count:</label>
            <input type="text" name="page_count" value="{{ old('page_count') }}" class="form-control @error('page_count') is-invalid @enderror" placeholder="Page count">
            @error('page_count')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mt-2">
            <button type="submit" class="btn btn-info">Save</button>
        </div>
    </form>
@endsection
