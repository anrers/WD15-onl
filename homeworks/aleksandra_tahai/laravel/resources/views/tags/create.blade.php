<button>
    <a href="/tags">Список тегов</a>
</button>
<form action="/tags" method="post">
    @csrf
    <label for="tag">New tag</label>
    <input id="tag" type="text" name="name">
    <input type="submit">
</form>
