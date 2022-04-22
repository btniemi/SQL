<h2>Who watched what movie add it here</h2>

<form method="post" action="{{ route('watch.store') }}">
    @csrf

    Person Name: <select name="people_id">
        @foreach($people as $person)
            <option value="{{ $person->id }}">{{ $person->name }}</option>
        @endforeach
    </select>
    Movie Title: <select name="movie_id">
        @foreach($movies as $movie)
            <option value="{{ $movie->id }}">{{ $movie->title }}</option>
        @endforeach
    </select>
    Stars: <select name="stars">
        <option value="none" selected disabled hidden>Select an Option</option>
        <option value="1">One Star</option>
        <option value="2">Two Stars</option>
        <option value="3">Three Stars</option>
        <option value="4">Four Stars</option>
        <option value="5">Five Stars</option>
    </select>
    Comments: <input name="comments" />

    <button type="submit">Save</button>
</form>
