<?php
const TASK_KEY_NAME = 'task';
const RESULT_KEY_NAME = 'result';

$task = "Объявите переменную x и присвойте ей значение 5. Затем увеличьте значение x на 3 и выведи результат на экран.";
$x = 5;
$result = $x + 3;
$resultArray[] = [TASK_KEY_NAME => $task, RESULT_KEY_NAME => $result];

$task = "Объявите переменные a и b, присвойте им значения 10 и 7 соответственно. Затем выведите на экран результат деления a на b.";
$a = 10;
$b = 7;
$result = $a / $b;
$resultArray[] = [TASK_KEY_NAME => $task, RESULT_KEY_NAME => $result];

$task = "Объявите переменные name и age и присвойте им значения 'Алиса' и 25 соответственно. Затем выведите на экран фразу 'Меня зовут Алиса, и мне 25 лет'.";
$name = "Алиса";
$age = 25;
$result = "Меня зовут $name, и мне $age лет";
$resultArray[] = [TASK_KEY_NAME => $task, RESULT_KEY_NAME => $result];

$task = "Объявите переменную y и присвойте ей значение 12. Затем увеличьте значение y в два раза и выведи результат на экран.";
$y = 12;
$result = $y * 2;
$resultArray[] = [TASK_KEY_NAME => $task, RESULT_KEY_NAME => $result];

$task = "Объявите переменные x и y и присвойте им значения 6 и 4 соответственно. Затем выведите на экран результат умножения х на y.";
$x = 6;
$y = 4;
$result = $x * $y;
$resultArray[] = [TASK_KEY_NAME => $task, RESULT_KEY_NAME => $result];

$task = "Объявите две переменные и присвойте им значения чисел 7 и 3. Выполните операцию сложения с этими переменными и выведи результат.";
$x = 7;
$y = 3;
$result = $x + $y;
$resultArray[] = [TASK_KEY_NAME => $task, RESULT_KEY_NAME => $result];

$task = "Объявите переменную и присвойте ей строковое значение. Выполните операцию конкатенации этой строки со строкой 
'мне нравится программирование' и выведи результат.";
$someText = "Сегодня";
$stroke = "мне нравится программирование";
$result = "$someText $stroke"; // конкатенация через "." вывод без пробела
$resultArray[] = [TASK_KEY_NAME => $task, RESULT_KEY_NAME => $result];

$task = "Объявите переменную и присвойте ей значение числа. Затем выполните операцию инкремента на этой переменной и выведи результат.";
$x = 7;
$y = $x++;
$notice = "<span style='color: lightgray; background-color: white'> (x - увеличит значение, y - будет равным первоначальному значению х)</span>";
$result = "Постинкремент: {x}: $x; {y}: $y $notice";
$resultArray[] = [TASK_KEY_NAME => $task, RESULT_KEY_NAME => $result];

$task = "Объявите две переменные и присвойте им значения строковых литералов. Выполните операцию конкатенации этих строк и выведи результат.";
$x = "Литера";
$y = "л"; // x - увеличит значение, y - будет равным первоначальному значению х
$result = $x . $y;
$resultArray[] = [TASK_KEY_NAME => $task, RESULT_KEY_NAME => $result];

$task = "Объявите две переменные и присвойте им значение строковой цифры, а второй число. Выполните операцию сложения и выведи результат.";
$x = "12";
$y = 12;
$result = $x + $y;
$resultArray[] = [TASK_KEY_NAME => $task, RESULT_KEY_NAME => $result];

//Оформление вывода через функцию.
showResult($resultArray);

function showResult($resultArray)
{
    if (isset($resultArray)) {
        echo "<p>Задачи:</p>";
        foreach ($resultArray as $k => $value) {
            $taskPrintView = "<p>" . ++$k . ". " . $value[TASK_KEY_NAME] . "</p>";
            $resultValue = $value[RESULT_KEY_NAME]; // или {$value['result']}
            echo $taskPrintView;
            echo "Результат: <span style='color: darkgreen; background-color: aquamarine'>$resultValue</span>";
        }
    } else {
        echo "Результат: <span style='color: darkgreen; background-color: aquamarine'> не был определен.</span>";
    }
}
