<h2>People</h2>

<nav>
    <a href="{{ route('watch.index') }}">Watch Page</a>
    <a href="{{ route('movie.index') }}">Movie Page</a>
</nav>

<p>There are: {{ $person->count() }} {{ Str::plural('people', $person->count()) }}</p>

<a href="{{ route('person.create') }}"> <button type="button">Add New Person</button></a>

@foreach($person as $person)
    <p>
        {{$person -> name}} , {{$person -> birthdate}}
    <form action="{{ route('person.destroy', ['person' => $person]) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Delete Person</button>
    </form>
    <a href="{{ route('person.edit', ['person'=>$person]) }}"> <button type="button">Edit Person</button></a>
    </p>
@endforeach
