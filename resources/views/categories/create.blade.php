<h3>Create new category</h3>

<form action="{{ url('categories/create') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Category name"><br>
    Enabled? <input type="checkbox" name="enabled" value="1"><br>
    <button type="submit">Save</button>
</form>
