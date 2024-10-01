<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
    //Напишите PHP цикл, который выводит числа от 1 до 100.
    echo "Задание 1" . PHP_EOL;
    $i = 0;
    while ($i++ < 100) {
        echo $i . PHP_EOL;
    }

    //Напишите PHP цикл, который выводит ненумерованный список из 10 пунктов.
    echo "Задание 2" . PHP_EOL;
    $l = 0;
    while ($l++ < 10) {
        echo "<li>$l-й пункт</li>" . PHP_EOL;
    }
    //Создайте массив из 100 случайных чисел.
    echo "Задание 3" . PHP_EOL;
    $arrWithRandom = [];
    while (count($arrWithRandom) < 100) {
        $arrWithRandom[] = rand(1, 100);
    }
    var_dump($arrWithRandom) . PHP_EOL;
    //Вывести массив из предыдущего задания, при помощи цикла while, а потом при помощи foreach.
    echo "Задание 4, Вариант While" . PHP_EOL;
    $i = 0;
    while ($i < 100) {
        echo $arrWithRandom[$i] . PHP_EOL;
        $i = ++$i;
    }
    echo "Задание 4, Вариант For" . PHP_EOL;
    for ($i = 0; $i < 100; $i++) {
        echo $arrWithRandom[$i] . PHP_EOL;
    }


    // Создайте массив из 10 строк и выведите их любым циклом внутри HTML-элемента div
    echo "Задание 5" . PHP_EOL;
    ?>
    <div class="warning">
        <?php
        $newMass = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j'];
        foreach ($newMass as $m) {
            echo "<p>$m</p>" . PHP_EOL;
        }
        ?>
    </div>
    <?php
    //Создайте массив, каждый элемент которого тоже массив с ключами title, description, price. Выведите все элементы этого массива, так, чтобы заголовки были в HTML-элементе h2, описания в p, а цена в гиперсылке.
    echo "Задание 6" . PHP_EOL;
    $newArr = [
        [
            'title' => 'Title 1',
            'description' => 'Description 1',
            'price' => 100
        ],
        [
            'title' => 'Title 2',
            'description' => 'Description 2',
            'price' => 200
        ]
    ];
    foreach ($newArr as $key => $value) {
        foreach ($value as $k => $v) {
            if ($k == 'title') {
                echo "<h2>$v</h2>" . PHP_EOL;
            } elseif ($k == 'description') {
                echo "<p>$v</p>" . PHP_EOL;
            } else {
                echo "<a>$v</a>" . PHP_EOL;
            }
        }
    }
    //При выводе элементов из предыдущего задания покрасьте фон элементов ниже определенной цены в отличный от других цвет
    echo "Задание 7" . PHP_EOL;
    foreach ($newArr as $key => $value) {
        foreach ($value as $k => $v) {
            if ($k == 'title') {
                echo "<h2>$v</h2>" . PHP_EOL;
            } elseif ($k == 'description') {
                echo "<p>$v</p>" . PHP_EOL;
            } elseif ($v < 200) {
                echo "<a style='color:red'>$v</a>" . PHP_EOL;
            } else {
                echo "<a>$v</a>" . PHP_EOL;
            }
        }
    }

    ?>
    <?php
    //Создайте масcив из 50 случайных чисел от 0 до 100. Найти все числа меньшие 72 и поместить их в отдельный массив
    echo "Задание 8" . PHP_EOL;
    $arrWithRandomValues = [];
    $newArrWithRandomValues = [];
    while (count($arrWithRandomValues) < 50) {
        $arrWithRandomValues[] = rand(1, 100);
    }
    var_dump($arrWithRandomValues) . PHP_EOL;

    for ($i = 0; $arrWithRandomValues[$i] < 72; $i++) {
        $newArrWithRandomValues[] = $arrWithRandomValues[$i];
    }
    var_dump($newArrWithRandomValues);
    // 9.	Создайте цикл, который выводит числа то 0 до 100 в HTML-элементах div; окраска HTML-элементов должна чередоваться («зебра»).
    echo "Задание 9" . PHP_EOL;
    ?>
    <div>
        <?php
        for ($i = 0; $i <= 100; $i++) {
            if (($i + 1) % 2 == 0) {
                echo "<p style='color:red'>$i</p>" . PHP_EOL;
            } else {
                echo "<p>$i</p>" . PHP_EOL;
            }
        }
        ?>
    </div>
</head>
<body>

</body>
</html>
