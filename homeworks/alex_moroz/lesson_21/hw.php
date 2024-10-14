<?php
session_start();
require_once 'src/header.php';
require_once 'src/showErrorMessage.php';

$exampleTtxFilePath = __DIR__ . "/example.txt";
$result = '';
?>

<!--    1.Создайте файл example.txt и запишите в него текст "Hello, world!" с помощью функции fwrite(). Затем откройте этот-->
<!--    файл и выведите его содержимое на экран с помощью функции fgets()-->

    <h2> 1. Записать в файл "example.txt" текст "Hello, world!". Вывести содержимое файла "example.txt". </h2>
<?php
$stroke = "Hello, world!";

$fileData = fopen($exampleTtxFilePath, "w");
fwrite($fileData, $stroke);
fclose($fileData);

$fileData = fopen($exampleTtxFilePath, "r");
while ($line = fgets($fileData)) {
    $result = $result . $line;
}
?>
    <p><?= $result ?> </p>


<!--    2. Напишите скрипт PHP, который будет открывать файл data.txt в режиме записи и записывать в него данные, -->
<!--    которые были введены пользователем в форму на веб-странице. Данные должны быть разделены запятыми. -->
<!--    Форма должна содержать поля "Имя", "Фамилия" и "Email". После записи данных в файл, выведите сообщение об успешной записи данных.-->
    <h2> 2. Записать данные из формы в файл "data.txt". Вывести сообщение об успешной записи данных. </h2>

<?php $isFormedFilledCorrectly = isset($_GET['success']) ?? $_GET['success'] === true;

if (!$isFormedFilledCorrectly) {
    $errors = $_SESSION["validationErrors"] ?? null;
    $userName = $_SESSION['userData']['name'] ?? null;
    $userSurname = $_SESSION['userData']['surname'] ?? null;
    $userEmail = $_SESSION['userData']['email'] ?? null;
}
?>

    <form action="form.php" method="post">

        <div>
            <label for="name"> Имя:</label>
            <input id="name" name="userData[name]" <?php if (isset($userName)) echo "value='$userName'"; ?>
                   required minlength="2" maxlength="20" pattern="^[а-яА-ЯёЁA-Za-z]{2,20}$"
                   title="Введите от 2 до 20 букв.">

            <?php if (!$isFormedFilledCorrectly) {
                showErrorMessage($errors, "name");
            } ?>
        </div>

        <div>
            <label for="surname"> Фамилия:</label>
            <input id="surname" name="userData[surname]" <?php if (isset($userSurname)) echo "value='$userSurname'"; ?>
                   required minlength="2" maxlength="20" pattern="^[а-яА-ЯёЁA-Za-z]{2,20}$"
                   title="Введите от 2 до 20 букв.">

            <?php if (!$isFormedFilledCorrectly) {
                showErrorMessage($errors, "surname");
            } ?>
        </div>

        <div>
            <label for="email"> Email:</label>
            <input id="email" name="userData[email]" <?php if (isset($userEmail)) echo "value='$userEmail'"; ?>
                   required minlength="7" maxlength="30"
                   pattern="^[a-zA-Z]+[a-zA-Z0-9._-]*[a-zA-Z]+@[a-zA-Z]+\\.[a-zA-Z]{2,6}$">

            <?php if (!$isFormedFilledCorrectly) {
                showErrorMessage($errors, "email");
            } ?>
        </div>

        <button name="submit" type="submit"> Отправить </button>
    </form>

<?php if ($isFormedFilledCorrectly) { ?>
    <p style="color: blue; font-size: 20px"> Данные успешно добавлены в файл 'data.txt'. </p>
<?php } ?>


<!--    3. Напишите скрипт PHP, который будет открывать файл example.txt в режиме записи и записывать в него случайные -->
<!--    числа от 1 до 1000, разделенные пробелами. Запишите в файл 10 случайных чисел. После записи чисел закройте файл. -->
<!--    Затем откройте этот файл снова в режиме чтения и выведите на экран сумму всех чисел, которые были записаны в файл.-->
    <h2>3. В файл example.txt записать 10 случайных чисел от 1 до 1000, разделенные пробелами. Выведите на экран сумму
        всех чисел, которые были записаны в файл.</h2>
<?php
$fileData = fopen($exampleTtxFilePath, "w+");
for ($i = 0; $i < 10; $i++) {
    $array[] = rand(1, 1000);
}
fwrite($fileData, implode(" ", $array));
fclose($fileData);

$fileData = fopen($exampleTtxFilePath, "r");
$arraySum = 0;
while ($line = fgets($fileData)) {
    $arraySum += array_sum(explode(" ", $line));
}
?>
    <p>Сумма 10 случайных чисел: <?= $arraySum ?> </p>

<?php
require_once 'src/footer.php';
?>