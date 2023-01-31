<h1>BookController</h1>

<div>
    @foreach($books as $book)
        ID: {{ $book->id }}
        Knyga: {{ $book->name }}<br>
        puslapiai: {{ $book->page_count }}<br>
    @endforeach
</div>

