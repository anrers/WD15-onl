<form action="/tags" method="post">
    @csrf
    <label for="name">Имя тега</label>
    <input type="text" name="name" id="name">

    <button type="submit" value="create">Cоздать</button>
</form>
