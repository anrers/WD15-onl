<?php

// task 1
for ($i = 1; $i <= 100; $i++) {
    echo $i . "<br>";
}

// task2
echo "<ul>";
for ($i = 1; $i <= 10; $i++) {
    echo "<li>Step $i</li>";
}
echo "</ul>";

// task3
$randomNumbers = [];
for ($i = 0; $i < 100; $i++) {
    $randomNumbers[] = rand(1, 1000);
}
echo "<pre>";
print_r($randomNumbers);
echo "</pre>";

// task4
$i = 0;
while ($i < count($randomNumbers)) {
    echo $randomNumbers[$i] . "<br>";
    $i++;
}

foreach ($randomNumbers as $number) {
    echo $number . "<br>";
}

// task5
$strings = ["Mike", "El", "Will", "Lucas", "Dustin", "Steve", "Nancy", "Jonathan", "Robin", "Max"];

echo "<div>";
foreach ($strings as $string) {
    echo "<p>$string</p>";
}
echo "</div>";

// task6
$products = [
    ["title" => "Cookies", "description" => "with chocolate chips", "price" => 5.99],
    ["title" => "Ice cream", "description" => "butter pecan", "price" => 2.99],
    ["title" => "Chocolate", "description" => "with sea salt and caramel", "price" => 0.99]
];

foreach ($products as $product) {
    echo "<h2>{$product['title']}</h2>";
    echo "<p>{$product['description']}</p>";
    echo "<a href='#'>Price: {$product['price']}</a><br>";
}

// task7
$priceThreshold = 1.99;

foreach ($products as $product) {
    $style = $product['price'] < $priceThreshold ? "style='background-color: lightcoral;'" : "";
    
    echo "<div $style>";
    echo "<h2>{$product['title']}</h2>";
    echo "<p>{$product['description']}</p>";
    echo "<a href='#'>Price: {$product['price']}</a><br>";
    echo "</div>";
}

// task8
$randomNumbers = [];
for ($i = 0; $i < 50; $i++) {
    $randomNumbers[] = rand(0, 100);
}

$filteredNumbers = [];
foreach ($randomNumbers as $number) {
    if ($number < 72) {
        $filteredNumbers[] = $number;
    }
}

print_r($filteredNumbers);

// task9
echo "<div>";
for ($i = 0; $i <= 100; $i++) {
    $bgColor = $i % 2 == 0 ? 'black' : 'white';
    $textColor = $i % 2 == 0 ? 'white' : 'black';
    echo "<div style='background-color: $bgColor; color: $textColor;'>$i</div>";
}
echo "</div>";