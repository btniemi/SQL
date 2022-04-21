<h2>Create a new Movie</h2>

<form method="post" action="{{ route('movies.store') }}">
    @csrf
    @method('post')

    title: <input name="title" />
    release year: <input name="release_year" />
    rating: <select name="rating">
        <option value="none" selected disabled hidden>Select an Option</option>
        <option value="G">G</option>
        <option value="PG">PG</option>
        <option value="PG-13">PG-13</option>
        <option value="R">R</option>
    </select>

    <button type="submit">Save</button>
</form>
