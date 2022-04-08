<!DOCTYPE html>

<html>
    <head>
        <Title>People,Movies,Watched Tables</Title>
    </head>

    <body>
        <h2>People</h2>
{{--you can do this as table as well try that if you want to make it look nicer look that up--}}
        <p>this is the people data</p>
{{--        @json($people)--}}
        @foreach($people as $person)
            <p>{{ $person -> name }} , {{ $person->birthdate }}</p>
        @endforeach

        <br>

        <h2>Movies</h2>
        <p>this is the movies data</p>
        @foreach($movies as $movie)
            <p>{{$movie -> title}} , {{$movie -> release_year}} , {{$movie -> rating}}</p>
        @endforeach

        <br>

        <h2>Watched</h2>
        <p>this is the watched data</p>
        @foreach($watched as $watch)
            <p>{{$watch->getPerson->name}} , {{$watch->getMovie->title}} , {{$watch->stars}} , {{$watch->comments}}</p>
        @endforeach
    </body>
</html>
