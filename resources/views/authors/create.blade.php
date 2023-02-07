@extends('components.layout')


@section('content')
<h3>Create new author</h3>

<form action="{{ url('authors/create') }}" method="post" class="row g-3">

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
    <div class="col-12">
        <label class="form-label">Author name:</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Author name">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label">Author last name:</label>
        <input type="text" name="surname" value="{{ old('surname') }}" class="form-control @error('surname') is-invalid @enderror" placeholder="Author last name:">
        @error('surname')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label">Birthday:</label>
        <input type="text" name="birthday" value="{{ old('birthday') }}" class="form-control @error('birthday') is-invalid @enderror" placeholder="Birthday">
        @error('birthday')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label">Country:</label>
        <input type="text" name="name" value="{{ old('country') }}" class="form-control @error('country') is-invalid @enderror" placeholder="Country">
        @error('country')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-info">Save</button>
    </div>
</form>
@endsection
