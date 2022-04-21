<h2>Edit Person: </h2>

<form method="post" action="{{route('person.update', ['person'=>$person->id])}}">
    @csrf
    @method('put')

    Name: <input name="name" value="{{$person->name}}" />
    Birthdate: <input type="date" name="birthdate" value="{{$person->birthdate}}" />

    <button type="submit">Save</button>
</form>
