<h2>Edit Movie: </h2>

<form method="post" action="/movies/{{$movies->id}}">
    @csrf
    @method('put')

    title: <input name="title" value="{{$movies->title}}" />
    release year: <input name="release_year" value="{{$movies->release_year}}" />
    rating: <select name="rating" value={{$movies->rating}}/>
        <option value="none" selected disabled hidden>Select an Option</option>
        <option value="G">G</option>
        <option value="PG">PG</option>
        <option value="PG-13">PG-13</option>
        <option value="R">R</option>
    </select>

    <button type="submit">Save</button>
</form>
