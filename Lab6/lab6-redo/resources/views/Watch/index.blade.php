<h1>Watched</h1>

<p>There are: {{ $watch->count() }} {{ Str::plural('watch', $watch->count()) }}</p>

<p>These are the people and which movies they watched</p>

<a href="{{ route('watch.create') }}"> <button type="button">Who Watched What? connect a person who watched a movie</button></a>

@foreach($watch as $watch)
    <p>
        {{$watch->getPerson->name}} , {{$watch->getMovie->title}} , {{$watch->stars}} , {{$watch->comments}}

        <form action=" {{ route('watch.destroy', ['watch' => $watch]) }}" method="post" >
            @csrf
            @method('delete')
            <button type="submit">Delete Watch</button>
        </form>
        <a href="{{ route('watch.edit', ['watch' => $watch]) }}"> <button type="button">Edit Watch</button></a>
    </p>
@endforeach
