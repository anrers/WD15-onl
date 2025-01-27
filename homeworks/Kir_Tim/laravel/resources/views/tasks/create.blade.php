<?php

?>

<form action="/tasks" method="post">
    @csrf
    <div>
    <label id="name">Имя</label>
    <input type="text" name="name" id="name">
    </div>
    <div>
    <label id="description">Описание</label>
    <textarea type="description" id="description"></textarea>
    </div>
    <div>
    <label id="date">Срок</label>
    <input type="date" name="dueDate" id="date">
    </div>
</form>
