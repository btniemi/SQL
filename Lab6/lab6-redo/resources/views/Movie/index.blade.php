<h2>Movies</h2>

<p>There are: {{ $movies->count() }} {{ Str::plural('movies', $movies->count()) }}</p>

<a href="{{ route('movies.create') }}"> <button type="button">Make New Movie</button></a>

@foreach($movies as $movie)
    <p>
        {{$movie -> title}} , {{$movie -> release_year}} , {{$movie -> rating}}
        <form action="{{ route('movies.destroy', ['movie' => $movie]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Delete Movie</button>
        </form>
        <a href="{{ route('movies.edit', ['movie'=>$movie]) }}"> <button type="button">Edit Movie</button></a>
    </p>
@endforeach


