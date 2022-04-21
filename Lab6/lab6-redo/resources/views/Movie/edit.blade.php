<h2>Edit Movie: </h2>

<form method="post" action="{{route('movie.update', ['movie'=>$movie->id])}}">
    @csrf
    @method('put')

    title: <input name="title" value="{{$movie->title}}" />
    release year: <input name="release_year" value="{{$movie->release_year}}" />
    rating: <select name="rating" value="{{$movie->rating}}" >
        <option value="none" selected disabled hidden>{{$movie->rating}}</option>
        <option value="G">G</option>
        <option value="PG">PG</option>
        <option value="PG-13">PG-13</option>
        <option value="R">R</option>
    </select>

    <button type="submit">Save</button>
</form>
