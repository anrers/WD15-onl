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
        <h3 class=" text-center">1. Напишите PHP цикл, который выводит числа от 1 до 100</h3>
        <?php
        for ($i = 1; $i <= 100; $i++) {
            echo "$i; ";
        };
    ?>
    </div>

    <div class="container-fluid bg-body-secondary">
        <h3 class=" text-center">2. Напишите PHP цикл, который выводит ненумерованный список из 10 пунктов.</h3>
        <ul>
            <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo "<li>Пункт $i</li>";
                };
            ?>
        </ul>
    </div>

    <div class="container-fluid bg-warning-subtle">
    <h3 class="text-center">3. Создайте массив из 100 случайных чисел.</h3>
    <?php 
        $arr = [];
        for ($i = 1; $i <= 100; $i++) {
            $arr[] = mt_rand();
        }
    ?>
    </div>

    <div class="container-fluid bg-dark-subtle">
        <h3 class="text-center">4. Вывести массив из предыдущего задания, при помощи цикла while, а потом при помощи foreach.</h3>
        <?php
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
        ?>
    </div>
 
</div>
<div class="container-fluid bg-success-subtle">
    <h3 class="text-center">5. Создайте массив из 10 строк и выведите их любым циклом внутри HTML-элемента div.</h3>
    <div class="container bg-info-subtle pb-2">
        <?php
        $strArr = ['Каждый', 'студент', 'должен', 'взять', 'любые', 'две', 'функции,', 'связанные', 'с', 'массивами',];
        for ($i = 0; $i < count($strArr); $i++) {
            echo "$strArr[$i]<br>";
        }
        ?>
    </div>
</div>

<div class="container-fluid bg-body-secondary pb-4">
    
    <h3 class="text-center">6. Создайте массив, каждый элемент которого тоже массив с ключами title, description, price. Выведите все элементы этого массива, так, чтобы заголовки были в HTML-элементе h2, описания в p, а цена в гиперсылке.</h3>
    <?php
        $productArr = [
        ['title' => 'Cadillac', 'description' => 'Life. Liberty. And the Pursuit', 'price' => 19000000],
        ['title' => 'Volkswagen', 'description' => 'Das Auto', 'price' => 8000000],
        ['title' => 'BMW', 'description' => 'Sheer Driving Pleasure', 'price' => 21000000],
        ['title' => 'Лада', 'description' => 'Поддержи отечественного производителя....', 'price' => 1500000],
    ]
    ?>
    <div class="container bg-success-subtle">
        <?php
        foreach ($productArr as $value) {
            $arrVal = array_values($value);
            ?>
            <h2 class="mb-0"><?=$arrVal[0]?></h2>
            <p class="mb-0"><?=$arrVal[1]?></p>
            <a class="link-offset-3 mb-0" href="#"><?=$arrVal[2]?></a>
        <?php
        }
        ?>
    </div>
</div>

<div class="container-fluid bg-info">
    <h3 class="text-center">7. При выводе элементов из предыдущего задания покрасьте фон элементов ниже определенной цены в отличный от других цвет.</h3>
    <div class="container bg-success-subtle">
        <?php
            foreach ($productArr as $value) {
                $value['price'] < 2000000 ? $colorBeggar = 'red' : $colorBeggar = 'green';
                $arrVal = array_values($value);
                ?>
                <div class="container text-white" style='background-color: <?=$colorBeggar?>'>
                    <h2 class="mb-0"><?=$arrVal[0]?></h2>
                    <p class="mb-0"><?=$arrVal[1]?></p>
                    <a class="link-offset-3 mb-0 text-white" href="#"><?=$arrVal[2]?></a>
                </div>
                <br>   
                <?php
                }
                ?>
    </div>
</div>


<h3 class="text-center">8. Создайте масcив из 50 случайных чисел от 0 до 100. Найти все числа меньшие 72 и поместить их в отдельный массив</h3>

<div class="container-fluid bg-danger-subtle">
    <?php
    $randArrNum = [];
    $randArrNumFilter72 = [];
    for ($i = 0; $i < 50; $i++) {
        $randArrNum[] = mt_rand(0, 100);
    }

    foreach($randArrNum as $arrVal72){
        if ($arrVal72 < 72) {
            $randArrNumFilter72[] = $arrVal72;
        }
    }

    //        var_dump($randArrNum);
    //        echo "**********************************************";
    //        var_dump($randArrNumFilter72);
    ?>
</div>


<div class="container-fluid bg-warning">

    <h3 class="text-center">9. Создайте цикл, который выводит числа то 0 до 100 в HTML-элементах div; окраска HTML-элементов должна чередоваться («зебра»).</h3>

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
