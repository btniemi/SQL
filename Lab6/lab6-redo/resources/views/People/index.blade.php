<h1>People</h1>

<p>There are: {{ $people->count() }} {{ Str::plural('people', $people->count()) }}</p>

@foreach($people as $p)
    <p>{{$p->name}}, {{$p->birthdate}}</p>
@endforeach
