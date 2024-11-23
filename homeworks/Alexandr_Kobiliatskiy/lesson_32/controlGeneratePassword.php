<?php
require_once 'generatePassword.php';

//Проверим перекос по количеству символов
$i = 0;
$result = "";
while ($i < 10000) {
    $result .= generatePassword(10);
    $i++;
}
$resArr = str_split($result);
print_r(array_count_values($resArr)); //Количество каждого символа примерно равномерное

echo "Максимальное количество:";
print_r(max(array_count_values($resArr)));

echo "\n";
echo "Минимальное количество:";
print_r(min(array_count_values($resArr)));

echo "\n";
echo "Разница:";
print_r(max(array_count_values($resArr)) - min(array_count_values($resArr)));

//А не генерирует ли оно одинаковые пароли....
echo "\n";
$ii = 0;
$result2 = [];
while ($ii < 100000) {
    $result2[] = generatePassword(10);
    $ii++;
}
print_r(array_count_values($result2)); //Повторов на 100 000 нет все пароли уникальны, на 1 000 000 все повисло....)))
