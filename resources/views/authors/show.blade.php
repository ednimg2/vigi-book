@extends('components.layout')

@section('title', $author->name)

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $author->name }} {{ $author->surname }}</h5>
            <p class="card-text">
                <span>Birthday: {{ $author->birthday }}</span>
            </p>
        </div>
    </div>
@endsection
