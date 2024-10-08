<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HW-18</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center text-danger">IF</h1>
    <div class="container-fluid bg-success-subtle pb-1">
        <h4 class="text-center">Напишите программу, которая выводит на экран сообщение в зависимости от возраста пользователя</h4>
        <div class="container bg-info pt-2 pb-3 rounded-3">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleInputAge" class="form-label">Введите Ваш возраст</label>
                    <input type="number" class="form-control" id="exampleAge" name="exampleAge" aria-describedby="ageHelp" min="1" max="110">
                    <div id="ageHelp" class="form-text">Мы никогда никому не передадим ваш возраст.</div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Отправить</button>
            </form>
        </div>
        <div class="container">
        <?php
        if (isset($_POST["submit"])) {
            if($_POST['exampleAge'] == null) {
                $ageGroop = 'не ввели возраст';
                $textColor = 'text-secondary';
            } elseif($_POST['exampleAge'] < 18){
                $ageGroop = 'несовершеннолетний';
                $textColor = 'text-success';
            } elseif ($_POST['exampleAge'] >= 18 and $_POST['exampleAge'] <= 65) {
                $ageGroop = 'взрослый';
                $textColor = 'text-warning';
            } else {
                $ageGroop = 'пенсионер';
                $textColor = 'text-danger';
            } ?>
            <p class="<?=$textColor?> fs-3 text fw-bold">Вы <?=$ageGroop?></p>
        <?php
        }
        ?>
        
        </div>
    </div>


    <div class="container-fluid bg-success-subtle pb-1">
        <h4 class="text-center">Напишите программу, которая проверяет, является ли введенное 
пользователем число четным или нечетным, и выводит соответствующее 
сообщение</h4>
        <div class="container bg-info pt-2 pb-3 rounded-3">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleInputAge" class="form-label">Введите число</label>
                    <input type="number" class="form-control" id="exampleNum" name="exampleNum" aria-describedby="ageHelp">
                    <div id="ageHelp" class="form-text">Мы проверим ваше число на чётность.</div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit2">Проверить</button>
            </form>
        </div>
        <div class="container">
        <?php
        if (isset($_POST["submit2"])) { 
            ;
            if($_POST['exampleNum'] == null){
                $numGroop = 'пустым';
                $textColor = 'text-secondary';
            }
            elseif(intval($_POST['exampleNum']) % 2 == 0){
                $numGroop = 'четным';
                $textColor = 'text-success';
            } else {
                $numGroop = 'нечетным';
                $textColor = 'text-danger';
            } ?>
            <p class="<?=$textColor?> fs-3 text fw-bold">Число является <?=$numGroop?></p>
            <?php
        }
        ?>
        </div>
    </div>

    <h1 class="text-center text-danger">SWITCH</h1>
    <div class="container-fluid bg-success-subtle pb-1">
        <h4 class="text-center">Напишите программу, которая выводит на экран сообщение в 
зависимости от значения переменной $dayOfWeek (от 1 до 7), которая 
содержит номер дня недели.</h4>
        <div class="container bg-info pt-2 pb-3 rounded-top-3">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleInputDay" class="form-label">Введите день недели</label>
                    <input type="text" class="form-control" id="exampleDay" name="exampleDay" aria-describedby="ageHelp">
                    <div id="ageHelp" class="form-text">Язык ввода может быть русским или англицким. Первый день недели - понедельник.</div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit3">Вывод</button>
            </form>
        </div>
        <div class="container bg-success rounded-bottom-3">
            <?php
             if (isset($_POST["submit3"])) {
                $dayOfWeek = strtolower($_POST['exampleDay']);
                switch($dayOfWeek) {
                    case null:
                        echo 'Пустое значение';
                        break;
                    case 'понедельник':
                    case 'monday':
                        echo 1;
                        break;
                    case 'вторник':
                    case 'tuesday':
                        echo 2;
                        break;
                    case 'среда':
                    case 'wednsday':
                        echo 3;
                        break;
                    case 'четверг':
                    case 'thursday':
                            echo 4;
                            break;
                    case 'пятница':
                    case 'friday':
                        echo 5;
                        break;
                    case 'суббота':
                    case 'saturday':
                        echo 6;
                        break;
                    case 'воскресенье':
                    case 'sunday':
                        echo 3;
                        break;
                    default:
                        echo 'такого дня нет';
                }
             }
            ?>
        </div>

        <div class="container-fluid bg-success-subtle pb-1">
        <h4 class="text-center">Напишите программу, которая определяет количество дней в месяце в 
зависимости от значения переменной $month (от 1 до 12), которая 
содержит номер месяца.</h4>
        <div class="container bg-info pt-2 pb-3 rounded-top-3">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleInputDay" class="form-label">Введите порядковый номер месяца</label>
                    <input type="number" class="form-control" id="exampleNumMonth" name="exampleNumMonth" aria-describedby="ageHelp" min="1" max="12">
                    <div id="ageHelp" class="form-text">Числом.</div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit4">Вывод количества дней</button>
            </form>
        </div>
        <div class="container bg-success rounded-bottom-3">
            <?php
             if (isset($_POST["submit4"])) {
                $month = intval($_POST['exampleNumMonth']);
                switch($month) {
                    case null:
                        echo "<p class='fs-2 fw-bold'>Пустое значение</p>";
                        break;
                    case 2:
                        echo "<p class='fs-2 fw-bold'>В этом месяце 28 дней</p>";
                        break;
                    case 4:
                    case 6:
                    case 9:
                    case 11:
                        echo "<p class='fs-2 fw-bold'>В этом месяце 30 дней</p>";
                        break;
                    default:
                        echo "<p class='fs-2 fw-bold'>В этом месяце 31 день</p>";


                }
             }
            ?>
            </div>
        </div>
    </div>


    <h1 class="text-center text-danger">MATCH</h1>
        <div class="container-fluid bg-success-subtle pb-1">
        <h4 class="text-center">Напишите программу, которая принимает на вход строку, и определяет, 
        является ли она палиндромом.</h4>
        <div class="container bg-info pt-2 pb-3 rounded-top-3">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleStr" class="form-label">Введите строку</label>
                    <input type="text" class="form-control" id="exampleStr" name="exampleStr" aria-describedby="strHelp">
                    <div id="strHelp" class="form-text">Язык ввода может быть русским или англицким.</div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit5">Вывод</button>
            </form>
        </div>
        <div class="container bg-success rounded-bottom-3">
            <?php
            if (isset($_POST["submit5"]) and $_POST['exampleStr'] != null) {
                $exempleStr = strtolower($_POST['exampleStr']);
                $exempleStrRev = strrev($exempleStr);
                $resultExamStr = match($exempleStr) {
                    $exempleStrRev => 'Строка является полиндромом',
                    default => 'Строка не является полиндромом',
                };
                echo "<p class='fs-2 fw-bold'>$resultExamStr</p>";
            }
                ?>
        </div>

        <div class="container-fluid bg-success-subtle pb-1">
        <h4 class="text-center"> Напишите программу, которая принимает на вход число, и определяет, 
        является ли оно четным, кратным 3 или кратным 5.</h4>
        <div class="container bg-info pt-2 pb-3 rounded-top-3">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="someNum" class="form-label">Введите строку</label>
                    <input type="text" class="form-control" id="someNum" name="someNum">
                </div>
                <button type="submit" class="btn btn-primary" name="submit6">Вывод</button>
            </form>
        </div>
        <div class="container bg-success rounded-bottom-3">
            <?php
            if (isset($_POST["submit6"]) and $_POST['someNum'] != null) {
                $number = intval($_POST['someNum']);
                $resulsomeNum = match(true) {
                    $number == 0 => 'Зачем вводить ноль?',
                    $number % 2 == 0 => 'Введенное число четное',
                    $number % 5 == 0 => 'Введенное число кратно 5',
                    $number % 3 == 0 => 'Введенное число кратно 3',
                    default => 'Введенное число не подходит ни под один критерий',
                };
                echo "<p class='fs-2 fw-bold'>$resulsomeNum</p>";
            }
                ?>
            </div>
        </div>
    </div>

    <h1 class="text-center text-danger">WHILE</h1>
    <div class="container-fluid bg-success-subtle pb-1">
        <h4 class="text-center">Задача на поиск суммы нечетных чисел от 1 до N:</h4>
        <div class="container bg-info pt-2 pb-3 rounded-top-3">
            <form action="" method="post">
                <div class="row justify-content-lg-center justify-content-md-start gy-md-4 gy-sm-2 mb-4">
                    <div class="col-6">
                        <label for="minNum" class="form-label">Введите минимальное число</label>
                        <input type="number" class="form-control text-center" name="minNum">
                    </div>
                    <div class="col-6">
                        <label for="minNum" class="form-label">Введите максимальное число</label>
                        <input type="number" class="form-control text-center" name="maxNum">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit7">Вывод</button>
            </form>
        </div>
        <div class="container bg-success rounded-bottom-3">
            <?php
            if (isset($_POST["submit7"]) and $_POST['minNum'] != null and $_POST['maxNum'] != null and $_POST['minNum'] < $_POST['maxNum']) {
                $numberMin = intval($_POST['minNum']);
                $numberMax = intval($_POST['maxNum']);
                $sum = 0;
                while($numberMin <= $numberMax) {
                    if ($numberMin % 2 != 0){
                        $sum += $numberMin;
                    }
                    $numberMin += 1;
                }

                echo "<p class='fs-2 fw-bold'>$sum</p>";
            }
                ?>
        </div>


        <h4 class="text-center">Задача на поиск первого положительного числа, кратного 7</h4>
        <div class="container bg-info pt-2 pb-3 rounded-top-3">
            <form action="" method="post">
                <div class="row justify-content-lg-center justify-content-md-start gy-md-4 gy-sm-2 mb-4">
                    <div class="col-6">
                        <label for="minNum7" class="form-label">Введите минимальное число</label>
                        <input type="number" class="form-control text-center" name="minNum7">
                    </div>
                    <div class="col-6">
                        <label for="minNum7" class="form-label">Введите максимальное число</label>
                        <input type="number" class="form-control text-center" name="maxNum7">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit8">Вывод</button>
            </form>
        </div>
        <div class="container bg-success rounded-bottom-3">
            <?php
            if (isset($_POST["submit8"]) and $_POST['minNum7'] != null and $_POST['maxNum7'] != null and $_POST['minNum7'] < $_POST['maxNum7']) {
                $number7Min = intval($_POST['minNum7']);
                $number7Max = intval($_POST['maxNum7']);
                while($number7Min <= $number7Max) {
                    if ($number7Min > 0 and $number7Min % 7 == 0) {
                        echo "<p class='fs-2 fw-bold'>$number7Min</p>";
                        break;
                    }
                    $number7Min += 1;
                }
            }
                ?>
        </div>
        </div>


    <h1 class="text-center text-danger">FOR</h1>
    <h2 class="text-center">Дальше без пользовательского ввода</h2>
    <div class="container-fluid bg-success-subtle pb-1">
        <h4 class="text-center">Поиск суммы элементов массива:</h4>
        <div class="container bg-info pt-2 pb-3 rounded-3">
            <p>Массив задан числами: 1, 2, 3, 4, 5</p>
            <?php
                $numbers = [1, 2, 3, 4, 5];
                $sum = 0;
                for ($i = $numbers[0]; $i <= count($numbers)-1; $i++) {
                    $sum += $numbers[$i];
                }
            ?>
            <p class='fw-bold'>Сумма массива <?=$sum?></p>
        </div>

        <h4 class="text-center"> Собрать массив четных чисел из входного массива:</h4>
        <div class="container bg-info pt-2 pb-3 rounded-3">
            <p>Массив задан числами: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10</p>
            <?php
                $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
                $evenNumbers = [];
                for ($i = $numbers[0]; $i <= count($numbers)-1; $i++) {
                    if ($numbers[$i] % 2 ==0){
                        $evenNumbers[] = $numbers[$i];
                    }
                    
                }
            ?>
            <p class='fw-bold'>Массив из четных чисел: <?=implode(",", $evenNumbers)?></p>
        </div>
        </div>


    <h1 class="text-center text-danger">FOREACH</h1>
    <div class="container-fluid bg-success-subtle pb-1">
        <h4 class="text-center">Добавить новый элемент в ассоциативный массив и вывести все 
значения данного массива </h4>
        <div class="container bg-info pt-2 pb-3 rounded-3">
        <p>Входной массив: name - Alexandr, surname - Kobiliatskiy</p>
        <?php
            $customInfo = ['name' => 'Alexandr', 'surname' => 'Kobiliatskiy',];
            $customInfo['age'] = 45;
            $customInfoVal = array_values($customInfo);
            foreach( $customInfoVal as $value) {
                echo " <p class='fw-bold'>$value</p>";
            }
        ?>
        </div>

        <h4 class="text-center">Объединить нескольких ассоциативных массивов в один и вывести 
        результат (ключ, значение) </h4>
        <div class="container bg-info pt-2 pb-3 rounded-3">
        <p>Первый входной массив: name - Alexandr, surname - Kobiliatskiy</p>
        <p>Второй входной массив: age - 45, marital_status - married whith children</p>
        <?php
            $customInfo1 = ['name' => 'Alexandr', 'surname' => 'Kobiliatskiy',];
            $customInfo2 = ['age' => 45, 'marital_status' => 'married whith children',];
            $customInfoResult = array_merge($customInfo1, $customInfo2);
            foreach( $customInfoResult as $key => $value) {
                echo " <p class='fw-bold'>$key - $value</p>";
            }
        ?>
        </div>
        </div>
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>




