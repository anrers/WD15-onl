<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HW-17</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid bg-primary-subtle">
    <?php
    echo "1.Напишите PHP цикл, который выводит числа от 1 до 100 <br>";
    for ($i = 1; $i <= 100; $i++) {
        echo "$i; ";
    };
    echo "<br>";
    echo "<br>";

    echo "2.Напишите PHP цикл, который выводит ненумерованный список из 10 пунктов. <br>";
    for ($i = 1; $i <= 10; $i++) {
        echo "<li>Пункт $i</li>";
    };
    echo "<br>";
    echo "<br>";

    echo "3.Создайте массив из 100 случайных чисел. <br>";
    $arr = [];
    for ($i = 1; $i <= 100; $i++) {
        $arr[] = mt_rand();
    }
    //print_r($arr);
    echo "<br>";
    echo "<br>";

    echo "4.Вывести массив из предыдущего задания, при помощи цикла while, а потом при помощи foreach.<br>";
    echo "Цикл while <br>";
    $i = 0;
    while ($i < 100) {
        echo "$arr[$i]; ";
        $i++;
    }
    echo "<br>";
    echo "Цикл foreach <br>";
    foreach ($arr as $i => $val) {
        echo "$val; ";
    }
    echo "<br>";
    echo "<br>";
    ?>
</div>
<div class="container-fluid bg-success-subtle">
    <?php
    echo "5. Создайте массив из 10 строк и выведите их любым циклом внутри HTML-элемента div.";
    ?>
    <div class="container bg-info-subtle pb-2">
        <?php
        $strArr = ['Каждый', 'студент', 'должен', 'взять', 'любые', 'две', 'функции,', 'связанные', 'с', 'массивами',];
        for ($i = 0; $i < count($strArr); $i++) {
            echo "$strArr[$i]<br>";
        }
        ?>
    </div>
</div>
<div class="container-fluid bg-body-secondary">
    <?php
    echo "6. Создайте массив, каждый элемент которого тоже массив с ключами title, description, price. Выведите все элементы этого массива, так, чтобы заголовки были в HTML-элементе h2, описания в p, а цена в гиперсылке.";
    $productArr = [
        ['title' => 'Cadillac', 'description' => 'Life. Liberty. And the Pursuit', 'price' => 19000000],
        ['title' => 'Volkswagen', 'description' => 'Das Auto', 'price' => 8000000],
        ['title' => 'BMW', 'description' => 'Sheer Driving Pleasure', 'price' => 21000000],
        ['title' => 'Лада', 'description' => 'Поддержи отечественного производителя....', 'price' => 1500000],
    ]
    ?>
    <div class="container bg-success-subtle">
        <?php
        foreach ($productArr as $key => $value) {
            foreach ($value as $k => $v) {
                if ($k == 'title') {
                    echo "<h2>$v</h2>";
                }
                if ($k == 'description') {
                    echo "<p>$v</p>";
                }
                if ($k == 'price') {
                    echo "<a>$v</a><br>";
                    echo "<br>";
                }
            }
            echo "<br>";
        }
        ?>
    </div>
</div>

<div class="container-fluid bg-info">
    <?php
    echo "7. При выводе элементов из предыдущего задания покрасьте фон элементов ниже определенной цены в отличный от других цвет.";
    ?>

    <div class="container bg-success-subtle">
        <?php
        foreach ($productArr as $key => $value) {
            foreach ($value as $k => $v) {
                $value['price'] < 2000000 ? $colorBeggar = 'red' : $colorBeggar = 'green';
                if ($k == 'title') {
                    echo "<div style='background-color: $colorBeggar'><h2 style='color: white'>$v</h2></div>";
                }
                if ($k == 'description') {
                    echo "<div style='background-color: $colorBeggar'><p style='color: white'>$v</p></div>";
                }
                if ($k == 'price') {
                    echo "<div style='background-color: $colorBeggar'><a style='color: white'>$v</a></div><br>";
                    echo "<br>";
                }
            }
            echo "<br>";
        }
        ?>
    </div>
</div>


<?php
echo "8.Создайте масcив из 50 случайных чисел от 0 до 100. Найти все числа меньшие 72 и поместить их в отдельный массив";
?>
<div class="container-fluid bg-danger-subtle">
    <?php
    $randArrNum = [];
    $randArrNumFilter72 = [];
    for ($i = 0; $i < 50; $i++) {
        $randArrNum[] = mt_rand(0, 100);
    }
    for ($i = 0; $i < count($randArrNum); $i++) {
        if ($randArrNum[$i] < 72) {
            $randArrNumFilter72[] = $randArrNum[$i];
        }
    }
    //        var_dump($randArrNum);
    //        echo "**********************************************";
    //        var_dump($randArrNumFilter72);
    ?>
</div>


<div class="container-fluid bg-warning">
    <?php
    echo "9.Создайте цикл, который выводит числа то 0 до 100 в HTML-элементах div; окраска HTML-элементов должна чередоваться («зебра»).";
    ?>
    <div class="container bg-dark-subtle">
        <?php
        for ($i = 0; $i < 101; $i++) {
            $i % 2 == 0 ? $colorZebra = 'grey' : $colorZebra = 'white';
            echo "<div style='background-color: $colorZebra'>$i</div>";
        }

        ?>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>




