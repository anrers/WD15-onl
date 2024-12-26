<form action="/tasks" method="post">
    @csrf
    <div>
        <label id="name">Имя:</label>
        <input type="text" name="name" id="name">
    </div>

    <div>
        <label id="description">Описание:</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <div>
        <label id="dueDate">Срок:</label>
        <input type="date" name="dueDate" id="dueDate">
    </div>
</form>
