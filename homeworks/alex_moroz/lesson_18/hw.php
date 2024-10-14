<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


//TODO: add tests; add check for float numbers

<div>
    <h3>1) Вывести на экран сообщение в зависимости от возраста пользователя</h3>
    <?php
    $age = $_POST['age'] ?? null;
    $isCorrectAge = $age && is_numeric($age) && $age >= 0;
    $correctAgeMessage = ($age && is_numeric($age) && $age < 0) || ($age && !is_numeric($age));

    function getAgeMessage($age)
    {
        if ($age >= 0 && $age < 18) {
            return "Вы несовершеннолетний.";
        }

        if ($age <= 65) {
            return "Вы взрослый.";
        }

        return "Вы пенсионер.";
    }

    ?>

    <div>
        <?php if ($isCorrectAge) {
            echo getAgeMessage($age);
        }
        if ($correctAgeMessage) {
            ?> <p style="color: red">И с нулем-то сомнительно. А тут '<?= $age ?>'...Попробуем еще раз.</p>
        <?php }
        if (!$isCorrectAge) { ?>
            <form action="" method="post">
                <label for="age">Введите Ваш возраст:</label>
                <input name="age" id="age" type="number">

                <button name="checkAge" type="submit">Проверить возраст</button>
            </form>
        <?php } ?>
    </div>
</div>

<div>
    <h3>2) Проверьте, является ли введенное число четным или нечетным.</h3>
    <?php $task = "2) Проверьте, является ли введенное число четным или нечетным";

    $number = $_POST['number'] ?? null;
    if ($number && is_numeric($number)) {
        echo "Число " . $number . (($number % 2 != 0) ? " - нечетное." : " - четное.");
    }
    if ($number && !is_numeric($number)) {
        ?> <p style="color: red">Ниже нужно число ввести. Не понимаю '<?= $number ?>'.</p>
    <?php }
    if (!$number) { ?>
        <form action="" method="post">
            <label for="number">Введите число, чтобы проверить четность/нечетность:</label>
            <input name="number" id="number" type="number">

            <button name="checkNumber" type="submit">Проверить Число</button>
        </form>
    <?php } ?>
</div>

<div>
    <h3>3) Вывести на экран сообщение в зависимости от значения дня недели (от 1 до 7)."</h3>
    <?php
    $dayOfWeek = $_POST['dayOfWeek'] ?? null;
    $isCorrectDayOfWeek = $dayOfWeek && is_numeric($dayOfWeek) && ($dayOfWeek >= 1 && $dayOfWeek <= 7);
    $correctDayOfWeekMessage = ($dayOfWeek && is_numeric($dayOfWeek) && ($dayOfWeek < 1 || $dayOfWeek > 7)) || ($dayOfWeek && !is_numeric($dayOfWeek));

    function getDayOfWeekMessage($dayOfWeek)
    {
        switch ($dayOfWeek) {
            case 1:
                return "Сегодня понедельник. Рабочая неделя только началась.";
            case 2:
                return "Сегодня вторник. Немногим лучше понедельника.";
            case 3:
                return "Сегодня среда. Medium рабочей недели.";
            case 4:
                return "Сегодня четверг, а четверг это маленькая пятнииица.";
            case 5:
                return "Пятница. Наконец-то.";
            case 6:
                return "Суббота. Вместо тысячи слов.";
            default:
                return "Воскресенье. Хорошо, пока не вспомнишь, что завтра понедельник.";
        }
    }

    ?>

    <div>
        <?php if ($isCorrectDayOfWeek) {
            echo getDayOfWeekMessage($dayOfWeek);
        }
        if ($correctDayOfWeekMessage) {
            ?> <p style="color: red">В неделе пока 7 дней. Попробуем ввести ниже число от 1 до 7, а не
                '<?= $dayOfWeek ?>'.</p>
        <?php }

        if (!$isCorrectDayOfWeek) { ?>
            <form action="" method="post">
                <label for="dayOfWeek">Введите день недели:</label>
                <input name="dayOfWeek" id="dayOfWeek" type="number">

                <button name="checkВayOfWeek" type="submit">Проверить день недели</button>
            </form>
        <?php } ?>
    </div>
</div>

<div>
    <h3>4) Вывести на экран количество дней в месяце (месяцы заданы от 1 до 12).</h3>
    <?php
    $month = $_POST['month'] ?? null;
    $isCorrectMonth = $month && is_numeric($month) && $month >= 1 && $month <= 12;
    $correctMonthMessage = ($month && is_numeric($month) && ($month < 1 || $month > 12)) || ($month && !is_numeric($month));

    function getDaysInMonthMessage($month)
    {
        switch ($month) {
            case 2:
                return "В этом месяце 28 дней.";
            case 4:
            case 6:
            case 9:
            case 11:
                return "В этом месяце 30 дней.";
            default:
                return "В этом месяце 31 день.";
        }
    }

    ?>
    <div>
        <?php if ($isCorrectMonth) {
            echo getDaysInMonthMessage($month);
        }
        if ($correctMonthMessage) {
            ?> <p style="color: red">В году пока 12 месяцев. Попробуем ввести ниже число от 1 до 13, а не '<?= $month ?>
                '.</p>
        <?php }

        if (!$isCorrectMonth) { ?>
            <form action="" method="post">
                <label for="month">Введите номер месяца:</label>
                <input name="month" id="month" type="number">

                <button name="checkMonth" type="submit">Проверить кличество дней в месяце</button>
            </form>
        <?php } ?>
    </div>
</div>

<div>
    <h3>5) Является ли слово палиндромом?</h3>
    <?php
    $string = $_POST['string'] ?? null;
    ?>

    <div>
        <?php if ($string) {
            $matchResult = match ($string) {
                strrev($string) => true,
                default => false,
            };
            echo $string . ($matchResult ? " - это палиндромом." : " - не палиндром.");
        }

        if (!$string) { ?>
            <form action="" method="post">
                <label for="string">Введите слово:</label>
                <input name="string" id="string">

                <button name="checkString" type="submit">Проверить</button>
            </form>
        <?php } ?>
    </div>
</div>

<div>
    <h3>6) Проверьте, вляется ли число четным, кратным 3 или кратным 5.</h3>
    <?php
    $numberForMatch = $_POST['numberForMatch'] ?? null;
    $resultForMatch = match (true) {
        $numberForMatch % 2 == 0 => "Число четное",
        $numberForMatch % 3 == 0 && $numberForMatch % 5 == 0 => "Число кратно 3 и 5",
        $numberForMatch % 3 == 0 => "Число кратно 3",
        $numberForMatch % 5 == 0 => "Число кратно 5",
    };
    ?>
    <div>
        <?php if ($numberForMatch && is_numeric($numberForMatch)) {
            echo $resultForMatch;
        }

        if ($numberForMatch && !is_numeric($numberForMatch)) {
            ?> <p style="color: red">Ниже нужно число ввести. Не понимаю '<?= $number ?>'.</p>
        <?php }

        if (!$numberForMatch) { ?>
            <form action="" method="post">
                <label for="numberForMatch">Введите число:</label>
                <input name="numberForMatch" id="numberForMatch">

                <button name="checkТumberForMatch" type="submit">Проверить</button>
            </form>
        <?php } ?>
    </div>
</div>

<div>
    <h3>7) Поиск суммы нечетных чисел от 1 до N (где N - введенное значение).</h3>
    <?php
    $lastNumber = $_POST['lastNumber'] ?? null;

    function getOddNumbersSum($lastNumber)
    {
        $sum = 0;
        $i = 1;
        if ($lastNumber > 0) {
            while ($i <= $lastNumber) {
                if ($i & 1) {
                    $sum += $i;
                }
                $i++;
            }
        } else {
            while ($i >= $lastNumber) {
                if ($i & 1) {
                    $sum += $i;
                }
                $i--;
            }
        }
        return $sum;
    }

    ?>
    <div>
        <?php if ($lastNumber && is_numeric($lastNumber)) {
            echo getOddNumbersSum($lastNumber);
        }
        if ($lastNumber && !is_numeric($lastNumber)) {
            ?> <p style="color: red">Ниже нужно число ввести. Не понимаю '<?= $number ?>'.</p>
        <?php }

        if (!$lastNumber) { ?>
            <form action="" method="post">
                <label for="lastNumber">Введите число:</label>
                <input name="lastNumber" id="lastNumber">

                <button name="calculateSum" type="submit">Посчитать</button>
            </form>
        <?php } ?>
    </div>
</div>

<div>
    <h3>8) Найти первое положительное число, кратное 7, начиная от введенного.</h3>
    <?php
    $startNumber = $_POST['startNumber'] ?? null;

    function getFirstPositiveNumberMultiplyOfSeven($startNumber)
    {
        $foundedNumber = $startNumber;
        while (true) {
            $isNeedToContinueSearching = $foundedNumber % 7 != 0 || ($foundedNumber % 7 == 0 && $foundedNumber < 0) || $foundedNumber == 0;
            if (!$isNeedToContinueSearching) {
                break;
            }
            $foundedNumber++;
        }
        return $foundedNumber;
    }

    ?>
    <div>
        <?php if ($startNumber && is_numeric($startNumber)) {
            echo "Первое положительное число, кратное 7 (начиная с " . $startNumber . ") - это " . getFirstPositiveNumberMultiplyOfSeven($startNumber);
        }

        if ($startNumber && !is_numeric($startNumber)) {
            ?> <p style="color: red">Ниже нужно число ввести. Не понимаю '<?= $number ?>'.</p>
        <?php }

        if (!$startNumber) { ?>
            <form action="" method="post">
                <label for="startNumber">Введите число:</label>
                <input name="startNumber" id="startNumber">

                <button name="findFirstPositiveMultiplyOfSeven" type="submit">Найти</button>
            </form>
        <?php } ?>
    </div>
</div>

<div>
    <!--    Нет проверки введенных значений-->
    <h3>9) Поиск суммы элементов (введите через символ ',' )</h3>
    <?php
    $strokeToArray = $_POST['array'] ?? null;

    function getArraySum($strokeToArray)
    {
        $array = explode(",", $strokeToArray);
        $sum = 0;
        for ($i = 0; $i < count($array); $i++) {
            $sum += $array[$i];
        }
        return $sum;
    }

    ?>

    <div>
        <?php if ($strokeToArray) {
            echo "Сумма элементов введенного массива [" . $strokeToArray . "] = " . getArraySum($strokeToArray);
        }

        if (!$strokeToArray) { ?>
            <form action="" method="post">
                <label for="array">Введите числа через запятую:</label>
                <input name="array" id="array">

                <button name="calcSum" type="submit">Посчитать</button>
            </form>
        <?php } ?>
    </div>
</div>

<div>
    <!--    Нет проверки введенных значений-->
    <h3>10) Собрать массив четных чисел из входного массива (введите через символ ',' ).</h3>
    <?php
    $strokeToArray2 = $_POST['array2'] ?? null;

    function getEvenArray($strokeToArray)
    {
        $array = explode(",", $strokeToArray);
        $evenNumbersArray = [];
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i] % 2 == 0) {
                $evenNumbersArray[] = $array[$i];
            }
        }
        return $evenNumbersArray;
    }

    ?>
    <div>
        <?php if ($strokeToArray2) {
            echo "Из массива [" . $strokeToArray2 . "] = ";
            echo "<pre>";
            print_r(getEvenArray($strokeToArray2));
            echo "</pre>";
        }

        if (!$strokeToArray2) { ?>
            <form action="" method="post">
                <label for="array2">Введите числа через запятую:</label>
                <input name="array2" id="array2">

                <button name="evenNumbersArray" type="submit">Получить</button>
            </form>
        <?php } ?>
    </div>
</div>

<div>
    <h3>11) Добавить товар в каталог.</h3>
    <?php
    $task = "9) Добавить новый продукт в каталог.";

    $products = [
        "product_1" => [
            'title' => "Product 1",
            "description" => "Product 1 decription",
            "price" => 15.0,
        ],
        "product_2" => [
            'title' => "Product 2",
            "description" => "Product 2 decription",
            "price" => 55.0,
        ],
        "product_3" => [
            'title' => "Product 3",
            "description" => "Product 3 decription",
            "price" => 65.0,
        ],
        "product_4" => [
            'title' => "Product 4",
            "description" => "Product 4 decription",
            "price" => 35.0,
        ],
        "product_5" => [
            'title' => "Product 5",
            "description" => "Product 5 decription",
            "price" => 45.0,
        ],
    ];

    $newProduct = $_POST['newProduct'] ?? null;
    $newProductTitle = $newProduct['title'] ?? null;
    $newProductDescription = $newProduct['description'] ?? null;
    $newProductPrice = $newProduct['price'] ?? null;

    $isProductDataFilled = $newProductTitle && $newProductPrice;
    $productDataCorrectMessage = $newProductTitle && $newProductPrice && !is_numeric($newProductPrice);

    function addProductToArray(&$array, $title, $description, $price)
    {
        $id = getProductId($title);
        if (!in_array($id, $array)) {
            $description = $description ?: $title; // почему не срабатывает $description ??= $title; $description ?? $title;
            $array[$id] = [
                'title' => $title,
                'description' => $description,
                'price' => $price,
            ];
            return $array[$id];
        } else {
            $element = &$array[$id];
            if ($element['price'] != $price) {
                $element['price'] = $price;
                return $array[$id];
            }
            return null;
        }
    }

    function getProductId($title)
    {
        return preg_replace("#[\s]+#", "_", trim(strtolower($title)));
    }

    ?>
    <div>
        <?php if ($productDataCorrectMessage) {
            ?> <p style="color: red">В поле для цены хотелось бы видеть числа, а не '<?= $newProductPrice ?>'.</p>
        <?php } elseif ($isProductDataFilled) {
            $productsSizeBefore = count($products);
            $newProductDescription ?? $newProductTitle;
            $addedProduct = addProductToArray($products, $newProductTitle, $newProductDescription, $newProductPrice);

            if (!$addedProduct) {
                echo "Продукт с такой ценой уже есть.";
            } elseif ($productsSizeBefore == count($products)) {
                echo "Обновлена цена для продукта: title = " . $addedProduct['title'] . " - " . $newProductPrice;
            } else {
                foreach ($products as $item) {
                    echo "<pre>";
                    print_r($item);
                    echo "</pre>";
                }
            }
        }

        if (!$isProductDataFilled || $productDataCorrectMessage) { ?>
            <form action="" method="post">
                <label for="newProductTitle">Название продукта:</label>
                <input name="newProduct[title]" id="newProductTitle">

                <label for="newProductDescription">Описание продукта:</label>
                <input name="newProduct[description]" id="newProductDescription">

                <label for="newProductPrice">Цена продукта:</label>
                <input name="newProduct[price]" id="newProductPrice">

                <button name="addNewProduct" type="submit">Добавить в каталог</button>
            </form>
        <?php } ?>
    </div>
</div>

<div>
    <h3>12) Вывести несколько каталогов.</h3>
    <?php
    $productsWinter = [
        "product_winter_1" => [
            'title' => "Product Winter 1",
            "description" => "Product Winter 1 decription",
            "price" => 15.0,
        ],
        "product_winter_2" => [
            'title' => "Product Winter 2",
            "description" => "Product Winter 2 decription",
            "price" => 55.0,
        ],
        "product_winter_3" => [
            'title' => "Product Winter 3",
            "description" => "Product Winter 3 decription",
            "price" => 65.0,
        ],
    ];

    $productsSummer = [
        "product_summer_1" => [
            'title' => "Product Summer 1",
            "description" => "Product Summer 1 decription",
            "price" => 15.0,
        ],
        "product_summer_2" => [
            'title' => "Product Summer 2",
            "description" => "Product Summer 2 decription",
            "price" => 55.0,
        ],
        "product_summer_3" => [
            'title' => "Product Summer 3",
            "description" => "Product Summer 3 decription",
            "price" => 65.0,
        ],
    ];

    $productsAutumn = [
        "product_autumn_1" => [
            'title' => "Product Autumn 1",
            "description" => "Product Autumn 1 decription",
            "price" => 15.0,
        ],
        "product_autumn_2" => [
            'title' => "Product Autumn 2",
            "description" => "Product Autumn 2 decription",
            "price" => 55.0,
        ],
        "product_autumn_3" => [
            'title' => "Product Autumn 3",
            "description" => "Product Autumn 3 decription",
            "price" => 65.0,
        ],
    ];

    $productsSpring = [
        "product_spring_1" => [
            'title' => "Product Spring 1",
            "description" => "Product Spring 1 decription",
            "price" => 15.0,
        ],
        "product_spring_2" => [
            'title' => "Product Spring 2",
            "description" => "Product Spring 2 decription",
            "price" => 55.0,
        ],
        "product_spring_3" => [
            'title' => "Product Spring 3",
            "description" => "Product Spring 3 decription",
            "price" => 65.0,
        ],
    ];

    $catalogsArray = [
        "summer" => $productsSummer,
        "autumn" => $productsAutumn,
        "winter" => $productsWinter,
        "spring" => $productsSpring,
    ];

    $catalogsToMerge = $_POST['catalogs'] ?? null;
    $isAnyCatalogSelected = $catalogsToMerge;

    function mergeSelectedArray($catalogsToMerge, $catalogsArray)
    {
        $result = [];
        foreach ($catalogsArray as $key => $value) {
            if (array_key_exists($key, $catalogsToMerge)) {
                $result = array_merge($result, $value);
            }
        }
        return $result;
    }

    ?>
    <div>
        <?php if ($isAnyCatalogSelected) {
            $resultArray = mergeSelectedArray($catalogsToMerge, $catalogsArray);
            foreach ($resultArray as $key => $value) {
                echo "Ключ: " . $key;
                echo "<pre>";
                echo "Значение: ";
                print_r($value);
                echo "</pre>";
            }
        }

        if (!$isAnyCatalogSelected) { ?>
            <form action="" method="post">
                <p>Отметьте каталоги, которые хотите просмотреть:</p>
                <label for=springCatalog>Весенний каталог</label>
                <input type="checkbox" name="catalogs[spring]" id="springCatalog">

                <label for=summerCatalog>Летний каталог</label>
                <input type="checkbox" name="catalogs[summer]" id="summerCatalog">

                <label for=autumnCatalog>Осенний каталог</label>
                <input type="checkbox" name="catalogs[autumn]" id="autumnCatalog">

                <label for=winterCatalog>Зимний каталог</label>
                <input type="checkbox" name="catalogs[winter]" id="winterCatalog">

                <button name="mergeCatalog" type="submit">Показать</button>
            </form>
        <?php } ?>
    </div>
</div>