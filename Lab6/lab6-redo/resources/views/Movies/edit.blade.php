<h2>Edit Movie: </h2>

<form method="post" action="{{ route('movies.update', ['movies' => $movies]) }}">
    @csrf
    @method('put')

    title: <input name="title" />
    release year: <input name="release_year" />
    rating: <input name="rating" />

    <button type="submit">Save</button>
</form>
