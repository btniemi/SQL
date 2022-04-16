<h2>Movies</h2>

<p>There are: {{ $movies->count() }} {{ Str::plural('movies', $movies->count()) }}</p>

<a href="{{ route('people.create') }}">Add a New Person</a>

@foreach($movies as $movie)
    <p>{{$movie -> title}} , {{$movie -> release_year}} , {{$movie -> rating}}</p>
@endforeach


