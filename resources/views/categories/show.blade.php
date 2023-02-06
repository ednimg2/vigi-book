Category name: {{ $category->name }}<br>
Enabled: {{ $category->enabled }}

<h5>BOOKS:</h5>
@foreach($category->books as $book)
    <div>
        Name: {{ $book->name }} |
        Puslapiai {{ $book->page_count }}
    </div>
@endforeach

<select name="category_id">
    <option></option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}">{{$category->name}}</option>
    @endforeach
</select>
