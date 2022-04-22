<h2>Edit watched:</h2>

<form method="post" action="{{ route('watch.update', ['watch'=>$watch->id]) }}">
    @csrf
    @method('put')

    Person Name: <select name="people_id" value="{{$watch->getPerson->name}}">
        @foreach($people as $person)
            <option value="{{ $person->id }}">{{ $person->name }}</option>
        @endforeach
    </select>
    Movie Title: <select name="movie_id" value="{{$watch->getMovie->title}}">
        @foreach($movies as $movie)
            <option value="{{ $movie->id }}">{{ $movie->title }}</option>
        @endforeach
    </select>
    Stars: <select name="stars" value="{{$watch->stars}}">
        <option value="none" selected disabled hidden>{{$watch->stars}}</option>
        <option value="1">One Star</option>
        <option value="2">Two Stars</option>
        <option value="3">Three Stars</option>
        <option value="4">Four Stars</option>
        <option value="5">Five Stars</option>
    </select>
    Comments: <input name="comments" value="{{$watch->comments}}" />

    <button type="submit">Save</button>
</form>
