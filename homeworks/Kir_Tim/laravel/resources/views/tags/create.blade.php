<form action="/tags/create" method="post">
    @csrf
    <label for='name'>Имя тега</label>
    <input type="text" name="name" id="name">

    <button type="submit" value="create">Create</button>
</form>
