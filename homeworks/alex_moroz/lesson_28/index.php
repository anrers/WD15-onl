<?php

require_once 'bootstrap.php'

/**
 * @var $studentService {@link \Service\StudentServiceImpl}
 */
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

<h2>Все студенты</h2>
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
<h2>Зачисленные студенты</h2>
<table>
    <tr>
        <th>Имя</th>
        <th>Возраст</th>
    </tr>
    <?php
    $enrolledStudents = $studentService->getEnrolledStudents();

    foreach ($enrolledStudents as $enrolledStudent) { ?>
        <tr>
            <td><?= $enrolledStudent["name"] ?></td>
            <td><?= $enrolledStudent["email"] ?></td>
        </tr>
        <?php
    } ?>
</table>
<h2>Студенты к зачислению</h2>
<form action='action/fillEnrollment.php' method='post'>
    <table>
        <tr>
            <th>Имя</th>
            <th>Возраст</th>
        </tr>
        <?php
        $notEnrolledStudents = $studentService->getNotEnrolledStudents();

        foreach ($notEnrolledStudents as $notEnrolledStudent) { ?>
            <tr>
                <td><?= $notEnrolledStudent["name"] ?></td>
                <td><?= $notEnrolledStudent["email"] ?></td>
            </tr>
            <?php
        } ?>
    </table>
    <?php
    if (count($notEnrolledStudents) > 4) {
        $studentIds = array_map(fn($notEnrolledStudents) => $notEnrolledStudents['id'], $notEnrolledStudents);?>
        <input type='hidden' name='studentsIds' value='<?= json_encode($studentIds); ?>'/>
        <button name="fill" type="submit">Зачислить</button>
        <?php
    } ?>
</form>