<?php
//<!--10.-->
echo "<p>Создание строк. Создайте переменную string и присвойте ей значение 'Привет, мир!'</p>";
$string = "Привет, мир!";
echo $string;

//<!--11.-->
echo "<p>Сцепление строк. Создайте переменные str1 и str2 и склейте их вместе с помощью оператора</p>";
$str1 =  "Привет";
$str2 = ", мир!";
$result = $str1 . $str2;
echo $result;

//<!--12.-->
echo "<p>Извлечение символов из строк. Извлеките символы 'w' и 'o' из строки 'Hello World!'</p>";
$stroke = "Hello World!";
$result = ucwords(str_ireplace(["w", "o"], "", strtolower($stroke))); //удалить все "w", "o" без учета регистра, оставить первые буквы в словах заглавными, как было в изначальном тексте
print_r($result);

//<!--13.-->
echo "<p>Поиск подстроки. Проверьте, содержит ли строка 'Hello World!' подстроку 'World'</p>";
$stroke =  "Hello World!";
$subStroke = "World";
var_dump(str_contains($stroke, $subStroke));
//or
$regex = "#World#";
$matchArray = [];
var_dump(preg_match($regex, $stroke));

//<!--15.-->
echo "<p>Обработка HTML-тегов. Удалите все HTML-теги из строки</p>";
$stroke = "<p>Hello, <b>world</b>!</p>";
$regex = "#<.{0,2}>+#";
$result = preg_replace($regex, "", $stroke); //заменяет все совпадения (как preg_match_all)
echo $result;

//14
echo "<p>Замена подстроки. Замените все вхождения подстроки 'world' на 'everyone'  в строке 'Hello world!'</p>";
$stroke =  "Hello world!";
$subStrokeToReplace = "world";
$result = str_replace($subStrokeToReplace, 'everyone', $stroke);
print_r($result);

//or

$regex = "#world#";
$matchArray = [];
$result = preg_replace($regex, "everyone", $stroke); //заменяет все совпадения (как preg_match_all)
print_r($result);

//<!--16.-->
echo "<p>Преобразование регистра. Преобразуйте строку 'HeLLo, WorLd!' к нижнему регистру.</p>";
$string = "HeLLo, WorLd!";
$result = mb_strtolower($string);
print_r($result);

//<!--17.-->
echo "<p>Разбиение строки на подстроки. Разбейте строку 'apple,orange,banana' на массив из трех элементов.</p>";
$string = "apple,orange,banana";
$result = explode(",", $string);
print_r($result);