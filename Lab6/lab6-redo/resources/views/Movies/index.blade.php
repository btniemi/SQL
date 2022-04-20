<h2>Movies</h2>

<p>There are: {{ $movies->count() }} {{ Str::plural('movies', $movies->count()) }}</p>

<a href="{{ route('movies.create') }}">Add a New Movie</a>

@foreach($movies as $movie)
    <p>
        {{$movie -> title}} , {{$movie -> release_year}} , {{$movie -> rating}}
        <form action="{{ route('movies.destroy', ['movie' => $movie]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Delete Movie</button>
        </form>
    </p>
@endforeach


