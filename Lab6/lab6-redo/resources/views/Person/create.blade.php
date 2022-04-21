<h2>Add a New Person to Db</h2>

<form method="post" action="{{ route('person.store') }}">
    @csrf

    name: <input name="name" />
    birthdate: <input type="date" name="birthdate" />

    <button type="submit">Save</button>
</form>
