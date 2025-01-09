<?php
/**
 * @var array<TaskModel> $data
 */

use Morozav\Lesson35\Model\Models\TaskModel;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&amp;display=swap">
    <link rel="stylesheet" href="../src/View/style/style.css">
    <title>To Do List</title>
</head>
<body>
<div class="tasks">
    <a href="/task">
        <button name="create" type="submit"  style="margin-top: 20px; padding: 10px 15px">
            Добавить
        </button>
    </a>

</div>
<div class="container">
    <div class="tasks--header">
        <div class="tasks">
            <?php
            foreach ($data as $task) {
                $colorStyle = match (true) {
                    $task->getStatus() === 1 && $task->getDeadline()->getTimestamp() < $task->getExecutedAt()->getTimestamp() => "--expired_done",
                    $task->getStatus() === 0 && $task->getDeadline()->getTimestamp() < time() => "--expired",
                    $task->getStatus() === 1 => "--done",
                    default => "",
                }?>
                <div class="task task<?php echo $colorStyle ?>">
                    <?php
                    if ($task->getStatus() != 1) { ?>
                        <a href="/task/<?= $task->getId() ?>">
                            <button name="resolve" type="submit">
                                Выполнить
                            </button>
                        </a>
                    <?php
                    } ?>
                    <form action='/task/<?= $task->getId() ?>'
                          method='post'>
                        <div class="task--edit">
                            <input class="task--edit--item<?php echo $colorStyle ?>" type="text"
                                   name='name'
                                   value='<?= $task->getName() ?>'
                                   required
                                   minlength="2"
                                   maxlength="150"
                                   pattern="^[\s\w.,;:!?()+/-]{2,150}$"
                                   title="Введите от 2 до 150 символов, включая спец.символы {.,;:!?()+/-}.">
                            <input class="task--edit--item<?php echo $colorStyle ?>" name='description'
                                   value='<?= $task->getDescription() ?>'
                                   pattern="^[\s\w.,;:!?()+/-]{2,250}$"
                                   title="Введите от 2 до 250 символов, включая спец.символы {.,;:!?()+/-}.">
                            <input class="task--edit--item<?php echo $colorStyle ?>" type="date" name='deadline'
                                <?php
                                $today = date_format(new DateTime(), 'Y-m-d');
                                $dueDate = date_format($task->getDeadline(), 'Y-m-d'); ?>
                                   value='<?= $dueDate ?>'
                                   required
                                <?php
                                if ($today >= $dueDate) { ?>
                                    readonly
                                    style="color: darkgray"
                                    disabled
                                    min="<?= $today ?>"
                                    <?php
                                } ?> >
                            <?php
                            if ($task->getStatus() != 1) { ?>
                                <input type='hidden'
                                       name='id'
                                       value='<?= $task->getId() ?>'/>
                                <button
                                        type="submit">
                                    Изменить
                                </button>
                            <?php
                            } ?>
                        </div>
                    </form>
                </div>
                <?php
            } ?>

        </div>
    </div>
</body>
</html>
