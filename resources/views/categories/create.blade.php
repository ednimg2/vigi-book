<h3>Create new category</h3>

<form action="{{ url('categories/create') }}" method="post">

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
    <input type="text" name="name" placeholder="Category name"><br>

    @error('name')
        <div style="color:red">{{ $message }}</div><br>
    @enderror

    Enabled? <input type="checkbox" name="enabled" value="1"><br>
    <button type="submit">Save</button>
</form>
