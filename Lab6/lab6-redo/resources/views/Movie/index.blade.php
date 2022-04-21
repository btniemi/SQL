<h2>Movies</h2>

<p>There are: {{ $movie->count() }} {{ Str::plural('movies', $movie->count()) }}</p>

<a href="{{ route('movie.create') }}"> <button type="button">Make New Movie</button></a>

@foreach($movie as $movie)
    <p>
        {{$movie -> title}} , {{$movie -> release_year}} , {{$movie -> rating}}
        <form action="{{ route('movie.destroy', ['movie' => $movie]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Delete Movie</button>
        </form>
        <a href="{{ route('movie.edit', ['movie'=>$movie]) }}"> <button type="button">Edit Movie</button></a>
    </p>
@endforeach


