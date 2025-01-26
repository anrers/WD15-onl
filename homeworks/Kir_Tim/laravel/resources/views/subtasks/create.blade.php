<form action="/subtasks/create" method="post">
    @csrf
    <label for='name'>Имя</label>
    <input type="text" name="name" id="name">

    <button type="submit" value="create">Create</button>
</form>
