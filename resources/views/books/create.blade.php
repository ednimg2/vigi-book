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
            <label class="form-label">Page count:</label>
            <input type="text" name="name" value="{{ old('page_count') }}" class="form-control @error('page_count') is-invalid @enderror" placeholder="Page count">
            @error('page_count')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mt-2">
            <button type="submit" class="btn btn-info">Save</button>
        </div>
    </form>
@endsection
