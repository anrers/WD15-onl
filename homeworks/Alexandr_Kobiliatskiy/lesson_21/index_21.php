<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HW-21</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h5>1. Создайте файл example.txt и запишите в него текст "Hello, world!" с
        помощью функции fwrite(). Затем откройте этот файл и выведите его
        содержимое на экран с помощью функции fgets()</h5>

    <div class="container p-2 bg-secondary-subtle text-center rounded-3 mb-4">

        <h4><?php
            $openedFile = fopen("example.txt", "w");
            fwrite($openedFile, "Hello, world!");
            fclose($openedFile);

            $openedFile2 = fopen("example.txt", "r");
            echo fgets($openedFile2);
            ?></h4>
    </div>

    <h5>
        2. Напишите скрипт PHP, который будет открывать файл data.txt в
        режиме записи и записывать в него данные, которые были введены
        пользователем в форму на веб-странице. Данные должны быть
        разделены запятыми. Форма должна содержать поля "Имя",
        "Фамилия" и "Email". После записи данных в файл, выведите
        сообщение об успешной записи данных.
    </h5>

    <div class="container-fluid p-4">
        <div class="container bg-dark-subtle p-3 rounded-2">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="namelHelp"
                           name="exampleInputName" pattern="[a-zA-Zа-яА-Я]+" required>
                    <div id="namelHelp" class="form-text">Введите свое имя буквами.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputSurname" class="form-label">Фамилия</label>
                    <input type="text" class="form-control" id="exampleInputSurname" aria-describedby="surnamelHelp"
                           name="exampleInputSurname" pattern="[a-zA-Zа-яА-Я]+" required>
                    <div id="surnamelHelp" class="form-text">Введите свою фамилию тоже буквами.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           name="exampleInputEmail" required>
                    <div id="emailHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>

    </div>

    <div class="container p-2 bg-secondary-subtle text-center rounded-3 mb-4">
        <h4><?php
            if(isset($_POST['exampleInputName']) and isset($_POST['exampleInputSurname']) and isset($_POST['exampleInputEmail'])){
                $openedFile3 = fopen("data.txt", "w");
                $exampleInputName = $_POST['exampleInputName'];
                $exampleInputSurname = $_POST['exampleInputSurname'];
                $exampleInputEmail = $_POST['exampleInputEmail'];
                fwrite($openedFile3, "$exampleInputName, $exampleInputSurname, $exampleInputEmail");
                fclose($openedFile3);
                echo "Данные успешно занесены в специальный файлик......";
            } else {
                echo "Что-то пошло не так, проверьте ввод";
            }
            ?></h4>
    </div>

    <h5>
        3. Напишите скрипт PHP, который будет открывать файл example.txt в
        режиме записи и записывать в него случайные числа от 1 до 1000,
        разделенные пробелами. Запишите в файл 10 случайных чисел.
        После записи чисел закройте файл. Затем откройте этот файл
        снова в режиме чтения и выведите на экран сумму всех чисел,
        которые были записаны в файл.
    </h5>

    <div class="container p-2 bg-secondary-subtle text-center rounded-3 mb-4">
        <h4>
            <?php
            $openedFile4 = fopen("example.txt", "w");
            for ($i = 0; $i < 10; $i++) {
                $number = mt_rand(1, 1000);
                fwrite($openedFile4, "$number ");
            }
            fclose($openedFile4);

            $openedFile4 = fopen("example.txt", "r");
            $numArr = explode(" ", trim(fgets($openedFile4)));
            echo array_sum($numArr);
            fclose($openedFile4);
            ?>
        </h4>
    </div>

</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>




