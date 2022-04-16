<h1>Watched</h1>

<p>These are the people and which movies they watched</p>

@foreach($watched as $watch)
    <p>{{$watch->getPerson->name}} , {{$watch->getMovie->title}} , {{$watch->stars}} , {{$watch->comments}}</p>
@endforeach
