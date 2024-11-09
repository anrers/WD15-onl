<?php

require_once 'bootstrap.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HW 28</title>
</head>
<body>
<h2>Сохранить студента</h2>
<form action="action/saveStudent.php" method="post">
    <div>
        <label for="name">Имя:</label>
        <input name="name" id="name" type="text"
               required
               minlength="2"
               maxlength="20"
               pattern="^[а-яА-ЯёЁA-Za-z]{2,20}$"
               title="Введите от 2 до 20 букв.">
    </div>
    <div>
        <label for="email">Email:</label>
        <input name="email" id="email" type="email"
               required
               minlength="7"
               maxlength="30"
               pattern="^[a-zA-Z]+[a-zA-Z0-9._-]*[a-zA-Z]+@[a-zA-Z]+\\.[a-zA-Z]{2,6}$"
               title="Введите email">
    </div>
    <button name="save" type="submit">Сохранить</button>
</form>

<h2>Студенты</h2>
<form action='action/fillEnrollment.php' method='post'>
    <table>
        <tr>
            <th>Имя</th>
            <th>Возраст</th>
        </tr>
        <?php
        $students = $studentService->getAllStudents();

        foreach ($students as $student) { ?>
            <tr>
                <td><?= $student["name"] ?></td>
                <td><?= $student["email"] ?></td>
            </tr>
            <?php
        } ?>
    </table>
    <?php
    if (count($students) > 5) {
        $student_ids = array_map(fn($student) => $student['id'], $students);
        $student_ids = implode(',', array_map(fn($student_id) => sprintf("(%s)", $student_id), $student_ids))?>
        <input type='hidden' name='studentsIds' value='<?= $student_ids ?>'/>
        <button name="fill" type="submit">Зачислить</button>
    <?php
    } ?>
</form>