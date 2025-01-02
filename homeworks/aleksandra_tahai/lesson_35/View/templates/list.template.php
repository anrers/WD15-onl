<?php
/**
 * @var array<TaskModel> $tasks
 */

use Model\Models\TaskModel;

$currentDate = date(' Y-m-d');
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
              rel="stylesheet">
        <link rel="stylesheet" href="/View/styles/styleTaskList.css">
        <title>Task List</title>
    </head>
    <body>
    <div>
        <form id="createButton" action="/create" method="post">
            <button>Создать новую задачу</button>
        </form>
        <form id="listTasks" method="post" action="/update">
            <table>
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Окончание задачи</th>
                    <th>Осталось дней</th>
                    <th>Статус</th>
                    <th>Кнопочка</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($tasks as $task): ?>
                    <?php
                    if ($task->getStatus() === 'Completed!') {
                        $backgroundColor = 'rgb(0, 248, 40, 0.81)';
                    } elseif ($task->getStatus() === 'In process!' and ($task->getDueDate()->format(' Y-m-d') >= $currentDate)) {
                        $backgroundColor = 'transparent';
                    } else {
                        $backgroundColor = 'rgb(255, 6, 63, 0.81)';
                    } ?>
                    <tr style="background-color: <?php echo $backgroundColor ?>; text-decoration: <?php echo $backgroundColor === 'transparent' ? 'none' : 'line-through'; ?>  ">
                        <td><?= $task->getName() ?></td>
                        <td><?= $task->getDescription() ?></td>
                        <td><?= $task->getDueDate()->format('d-m-Y') ?></td>
                        <td><?= $task->getDaysRemaining() ?></td>
                        <td><?= $task->getStatus() ?></td>
                        <td>
                            <button <?php echo $backgroundColor === 'transparent' ? '' : 'disabled style="background-color: grey;"'; ?>
                                    name="taskId" value="<?php echo $task->getId(); ?>" type="submit">the end
                            </button
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </form>
    </div>
    </body>
    </html>

<?php


?>