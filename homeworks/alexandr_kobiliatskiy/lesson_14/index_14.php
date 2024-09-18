<?php
echo "<b>Задача №1 Написать функцию, которая принимает на вход два числа и возвращает их сумму</b> <br>";
function summTwoNum ($numOne, $numTwo)
{
    return $numOne + $numTwo;
}
//Проверка
$res = summTwoNum(25, 11);
echo "$res<br>";
echo "<br>";

echo "<b>Задача №2 Написать функцию, которая принимает на вход строку и возвращает ее длину</b> <br>";

function lenString($str): int | string
{
    if(gettype($str) != "string"){
        $result = "Вы ввели не строку, а " . gettype($str);
    } else $result = strlen($str);
    return $result;
}
// Проверка
echo  lenString("С точки зрения банальной эрудиции, не каждый человеческий индивидуум способен лояльно реагировать на все тенденции потенциального действия") . "<br>";
echo lenString(25) . "<br>";
echo lenString(true) . "<br>";
echo lenString([24, 25, 17]) . "<br>";
echo "<br>";

echo "<b>Задача №3 Написать функцию, которая принимает на вход массив чисел и возвращает их среднее значение</b> <br>";
function averageNum($arr): string | float
{
    if(gettype($arr) == "array" &&  count($arr) ==  count(array_filter($arr, 'is_numeric'))){
        $result = array_sum($arr) / count($arr);

    } else $result = "Недопустимый аргумент функции";
    return $result;
}

//Проверка
echo averageNum([25, 16, 42, 115]) . "<br>";
echo averageNum(['25', '16', '42', '115']) . "<br>";
echo averageNum(true) . "<br>";
echo averageNum([true]) . "<br>";
echo averageNum(['one', 'two']) . "<br>";
echo "<br>";

echo " <b>Задача №4 Написать функцию, которая принимает на вход два числа и определяет, какое из них больше</b> <br>";
function whoIsBigger($num1, $num2): float | string
{
    if ($num1 != $num2) {
        $arr = [$num1, $num2];
        if (count($arr) == count(array_filter($arr, 'is_numeric'))) {
            $result = max($arr);
        } else $result = "Недопустимый аргумент функции";
    } else $result = "Вы ввели одинаковые цыфирки";
        return $result;
    }
//Проверка
echo whoIsBigger(25, 17) . "<br>";
echo whoIsBigger(25.5, 17.4) . "<br>";
echo whoIsBigger("Слово1", "Слово2") . "<br>";
echo whoIsBigger(true, false) . "<br>";
echo whoIsBigger(25, 25) . "<br>";
echo "<br>";

echo "<b>Задача №5 Написать функцию, которая принимает на вход две строки и возвращает их объединение</b> <br>";
function concatStr($anything1, $anything2): string
{
    if($anything1 === true) {$anything1 = 'true';}
    elseif ($anything1 === false) {$anything1 = 'false';}
    elseif ($anything2 === true) {$anything2 = 'true';}
    elseif ($anything2 === false) {$anything2 = 'false';}
    $anything1 = (string)$anything1;
    $anything2 = (string)$anything2;
    return $anything1 . " ". $anything2 . "<br>";

}

//Проверка
echo  concatStr("Какая-нибудь строка и число", 40, );
echo  concatStr("Здесь мы объединим две", "какие-нибудь строки");
echo  concatStr(true, false); //Здесь сработало коряво, выводит только true. Потом разберусь
echo  concatStr(true, "string");
echo "<br>";

echo "<b>Задача №6 Написать функцию, которая принимает на вход строку и возвращает ее в верхнем регистре</b> <br>";
function upperStr($anything1): string
{
    if($anything1 === true) {$anything1 = 'true';}
    elseif ($anything1 === false) {$anything1 = 'false';}
    $anything1 = (string)$anything1;
    return  mb_strtoupper($anything1) . "<br>";
}

// Проверка
echo upperStr("Какая-нибудь строка для перевода в верхний регистр");
echo upperStr(25.782);
echo upperStr(true);
echo upperStr(false);
echo "<br>";

echo "<b>Задача №7 Написать функцию, которая принимает на вход строку и определяет, содержит ли она подстроку</b> <br>";
function findPartString($wholeString, $partString)
{
    {
        if(gettype($wholeString) != "string"){
            $result = "Вы ввели не строку, а " . gettype($wholeString);
        } else $result = str_contains($wholeString, $partString);
        if($result === true){$message = "Искомая подстрока содержится в проверяемой строке";}
        else $message = "Искомая подстрока отсутствует в проверяемой строке";
        return $message . "<br>";
    }
}
//Проверка
echo findPartString("Заставить дочь мыть посуду", "жалость");
echo findPartString(25, 17);
echo findPartString("Автогудронатор", "авто");
echo findPartString("Автогудронатор", "Авто"); //Пока регистрозависимый поиск. Нужно писать грамотно
echo "<br>";

echo "<b>Задача №8 Найти среднее арифметическое двух чисел</b> <br>";
function averageNumber($num1, $num2): float | string
{
        $arr = [$num1, $num2];
        if (count($arr) == count(array_filter($arr, 'is_numeric'))) {
            $result = array_sum($arr)/(count($arr));
        } else $result = "Недопустимый аргумент функции";
    return $result . "<br>";
}
//Проверка
echo averageNumber(25, 17);
echo averageNumber("25", 11);
echo averageNumber("Двадцать пять", 11);
echo "<br>";

echo "<b>Задача №9 Найти корень квадратный из числа</b> <br>";
function squareRoot($num1): float | string
{
    if (gettype($num1) == "integer" | gettype($num1) == "double") {
        $result = sqrt($num1);
    } else $result = "Недопустимый аргумент функции";
    return $result . "<br>";
}
//Проверка
echo squareRoot(17);
echo squareRoot("17");
echo squareRoot("String");
echo squareRoot(17.12896);





