<?php   

//1st task
$i = 0;

while ($i < 100) {
    $i++;
    echo $i .PHP_EOL;
}

//2nd task

echo "<ul>";
for ($i = 1; $i <= 10; $i++) {
    echo "<li>Number $i</li>";
}
echo "</ul>";

//3rd task

$randomInts = [];

for ($i = 1; $i <= 100; $i++) {
    $randomInts [] = rand(1, 2000);
}

print_r($randomInts);

//4th task

$i = 0;

while ($i < 100) {
    $i2 = $i + 1;
    echo "Number - $i2 is $randomInts[$i]" .PHP_EOL;
    $i++;
}

//5th task

foreach ($randomInts as $value) {
    echo $value . PHP_EOL;
}

//6th task

$array = [
    [
        "title" => "Carrot",
        "description" => "Delicious carrot sticks",
        "price" => 2.99
    ],
    [
        "title" => "Hazelnut",
        "description" => "Roasted hazelnut cookies",
        "price" => 4.99
    ],
    [
        "title" => "Pizza",
        "description" => "Freshly prepared pizza",
        "price" => 10.99
    ]
];

foreach ($array as $value) {
    echo "<h2>{$value['title']}</h2>";
    echo "<p>{$value['description']}</p>";
    echo "<a href='#'>{$value['price']}</a>" .PHP_EOL;
}

//7th task

$defaultPrice = 3.99;

foreach ($array as $value) {
    if ($value['price'] < $defaultPrice) {
        $style = "style='background-color: blue;'";
    } else {
        $style = "style='background-color: red;'";
    }

    echo "<div $style>";
    echo "<h2>{$value['title']}</h2>";
    echo "<p>{$value['description']}</p>";
    echo "<a href='#'>{$value['price']}</a>" .PHP_EOL;
    echo "</div>";
}

//8th task

$arrayOfNumbers = [];
$newArrayOfNumbers = [];

$i = 0;
while ($i < 50) {
    $arrayOfNumbers[] = rand(1, 100);
    $i++;
}

foreach ($arrayOfNumbers as $value) {
    if ($value < 72) {
        $newArrayOfNumbers[] = $value;
    }
}

print_r($arrayOfNumbers);
print_r($newArrayOfNumbers);

//9th task

echo "<div>";
for ($i = 0; $i < 100; $i++) {
    if ($i % 2 == 0) {
        $style = "style='background-color: lightgray;'";
    } else {
        $style = "style='background-color: white;'";
    }

    echo "<div $style>$i</div>";
}
echo "</div>";