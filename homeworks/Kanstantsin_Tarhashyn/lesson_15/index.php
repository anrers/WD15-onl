<?php   

// 1st task 
$array = [1, 2, 3, 4, 5, ];
var_dump($array[1]);

// 2nd task
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, ];
$result = array_sum($array);
var_dump($result);

// 3rd task
$array = ["orange", "apple", "blueberry", "strawberry", "raspberry",];
sort($array);
print_r($array);

// 4th  task
$array = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
var_dump($array[1][2]);

//5th task 
$array = [
    "blueberries" => "1$",
    "bananas" => "2$",
    "oranges" => "3$",
];
var_dump($array['oranges']);

//6th task
$array = [
    "blueberries" => "1$",
    "bananas" => "2$",
    "oranges" => "3$",
];

function keyValue ($array, $key) {
    if(array_key_exists($key, $array)){
        return $array[$key];
    }
    else {
        return null;
    }
}

$result = keyValue($array, "blueberries");
$result1 = keyValue($array, "bananas");
$result2 = keyValue($array, "oranges");
$result3 = keyValue($array, "kiwi");

var_dump($result);
var_dump($result1);
var_dump($result2);
var_dump($result3);

//7th
$array = [
    "blueberries" => "1$",
    "bananas" => "4$",
    "oranges" => "3$",
    "strawberries" => "5.5$"
];

function findValue ($array) {
    $maxValue = max($array);
    return $maxValue;
};

$result = findValue($array);
var_dump($result);

//8th task
$array = [
    "blueberries" => "2$",
    "bananas" => "1$",
    "oranges" => "4$",
    "strawberries" => "3$"
];

function sortArray ($array) {
    asort($array);
    return $array;
}

var_dump(sortArray($array));

//9th task
function callbackToArray ($array, $callback) {
    $newArray = [];
    foreach ($array as $value) {
        $newArray[] = $callback($value);
    }

    return $newArray;
}

function multiply ($int) {
    return $int * 3;
}

$numbersArray = [1, 2, 3, 4, 5];

$newArray = callbackToArray($numbersArray, 'multiply');
print_r($newArray);

//10th task
$string = "Hello, World!";

var_dump($string);

//11th task
$str1 = "Hello, ";
$str2 = "World!";
$str3 = $str1 . $str2;

var_dump($str3);

//12th task
$string = "Hello, World!";

$w = substr($string, 7, 1);
$o = substr($string, 4, 1);

var_dump($w . " " . $o);

//13th task
$string = "Hello, World!";
$subString = "Wor ld";

if (str_contains($string, $subString)) {
     print_r("Yes \n");
} else {
    print_r("No \n");
}    

//14th task
$string1 = "Hello, world!";
$subString1 = "world";

$newString = str_replace($subString1, "everyone" , $string1);
print_r("$newString \n");

//15th task
$string = "<p>Hello, <b>world</b>!</p>";
function deleteTags($string){
    $newString = strip_tags($string);
    return $newString;
}
print_r(deleteTags("$string \n"));

//16th task
$string = "Hello, World!";
$lowercaseString = strtolower($string);

print_r("$lowercaseString \n");

//17th task
$stringToExplode = "apple,orange,banana";
$arrayExplode = explode(",", $stringToExplode);

print_r($arrayExplode);