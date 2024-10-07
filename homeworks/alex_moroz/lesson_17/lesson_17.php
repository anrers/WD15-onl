<?php
echo "Основные конструкции языка PHP";

//Синтаксис if - elseif - else
//1
if (true) {
    if (true) {
        echo 'if 2';
    }
    echo 'if 1';
}
//2
if (true) :
    echo 'if 1';
    if (false) :
        echo 'if 2';
    else :
        echo 'else 2';
    endif;
endif;
echo "<p></p>";

//тернарный оператор
$value = "text";
$result = (empty($value)) ? $value : "not_empty";

$result = $value ?: "not_empty"; // сокращенная запись; значение переменной value приводится к bool, если true - то возвращается изначальное значение value
$result = $value ?? "default"; // оператор объединения с null
$value ??= "default"; //сокращенный оператор объединения с null

print_r($result);
echo "<p></p>";

//Синтаксис switch //проверка на нестрогое равенство
$var = 2;
switch ($var) {
    case 1:
        echo "1";
        break; // при сопадении в case, код выполняется до break;
    case 2:
        echo "2";
        break;
    default :
        echo "default";
        break;
}

//Синтаксис match
$matchResult = match ($var) { //проверка на строгое равенство; д.б. исчерпывающим
    1 => "1",
    2 => "2",
    default => "default",
};

$var = 4;
$matchResult = match ($var) {
    1, 3 => "1,3",
    2 => "2",
    4 => returnText(),
    default => "default",
};

print_r($matchResult);
function returnText()
{
    return "Text";
}

$result = 0;

//+-*/%
$operator = "+";
$operand1 = 12;
$operand2 = 6;

switch ($operator) {
    case "+":
        $result = $operand1 + $operand2;
        break;
    case "-":
        $result = $operand1 - $operand2;
        break;
    case "*":
        $result = $operand1 * $operand2;
        break;
    case "/":
        $result = $operand1 / $operand2;
        break;
    case "%":
        $result = $operand1 % $operand2;
        break;
    default :
        echo "Unknown operand.";
        break;
}

var_dump($result);

$array = [
    1 => "el1",
    2 => "el2",
];

//Циклы foreach
foreach ($array as $item => $value) { //следить за названием - переопределяет значения, переменные доступны после функции

}

//return в функции с циклом прерывает ее выполнение
//break; - управляющая конструкция, прервет выволнение цикла, не в функции. break с цифрой - какое количество вышестроящих циклов д.б. прерваны
//continue; - пропускает выполнение текущей итерации - кода после continue;  с цифрой - какое количество вышестроящих циклов д.б. пропущены

//Циклы while
$i = 0;

do {
    echo $i;
    $i++;
}
while ($i < 10);

//return в функции с циклом прерывает ее выполнение
//break; - управляющая конструкция, прервет выволнение цикла, не в функции. break с цифрой - какое количество вышестроящих циклов д.б. прерваны
//continue; - пропускает выполнение текущей итерации - кода после continue;  с цифрой - какое количество вышестроящих циклов д.б. пропущены

$array = [1,2,3,4,5,6,7,8,9];
$i = 0;
while ($i < count($array))
{
    echo $array[$i];
    $i++;
}

//Циклы for
$i = 0;

for ($i = 0; $i < count($array); $i++)
{
    echo $array[$i];
}

for (; $i < count($array); $i++)
{
    echo $array[$i];
}