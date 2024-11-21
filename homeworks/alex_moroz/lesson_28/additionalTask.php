<?php
$connection = new mysqli(
    "mysql-8.2",
    "root",
    "",
    "study"
);

//сумму всех продуктов, которые в избранном у пользователя
//1. Создать таблицу products (если нет) id, name, price
//2. Создать таблицу favorites (если нет) user_id, product_id
//3. Написать запрос, который вернёт всех пользователей + сумму цен товаров (products), которые пользователь добавил в избранное
$query = "SELECT users.id, users.name, SUM(price) AS sum_of_favourites, count(products.id) AS quantity_of_products_in_favourites FROM users 
                             LEFT JOIN favorites ON users.id = favorites.user_id
                             LEFT JOIN products ON products.id = favorites.product_id
                                                   GROUP BY users.id";
$result = $connection->query($query);

echo '<pre>';
print_r($result->fetch_all(MYSQLI_ASSOC));
echo '</pre>';

//посчитать сколько раз товар добавлен в избранное и сумму
$query = "SELECT products.*, count(favorites.product_id) * (products.price) as sum_in_favourites, count(favorites.product_id) AS times_in_favourites FROM products 
    LEFT JOIN favorites ON products.id = favorites.product_id GROUP BY products.id";
$result = $connection->query($query);

echo '<pre>';
print_r($result->fetch_all(MYSQLI_ASSOC));
echo '</pre>';