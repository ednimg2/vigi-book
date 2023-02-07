@extends('components.layout')

@section('title', 'Books')

@section('content')
    <h1>Books</h1>

    @include('components.alert.success_message')

    <div class="row">
        <div class="col">
            <a href="{{ url('books/create') }}" class="btn btn-primary">Create</a>
        </div>
    </div>

    <table class="table">
        <tr>
            <th scope="col" width="100">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col">Page count</th>
            <th scope="col" width="100">Edit</th>
            <th scope="col" width="100">Delete</th>
        </tr>
        @foreach($books as $book)
            <tr>
                <th scope="row">{{ $book->id }}</th>
                <td>
                    <a href="{{ url('books', ['id' => $book->id]) }}">{{ $book->name }}</a>
                </td>
                <td>
                    @if ($book->author)
                        {{ $book->author->name }}
                    @endif
                </td>
                <td>
                    @if($book->category)
                        {{ $book->category->name }}
                    @endif
                </td>
                <td>{{ $book->page_count }}</td>
                <td>
                    <a href="{{ route('books.edit', ['id' => $book->id]) }}" class="btn btn-info">Edit</a>
                </td>
                <td>
                    <form action="{{ route('books.delete', ['id' => $book->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="row">
        <div class="col">
            {{ $books->links() }}
        </div>
    </div>
@endsection

