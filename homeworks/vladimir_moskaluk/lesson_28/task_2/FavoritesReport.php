<?php

require_once __DIR__ . '/UserController.php';

use App\UserController;

$config = require __DIR__ . '/config.php';

$db = new mysqli(
    $config['db']['host'],
    $config['db']['user'],
    $config['db']['password'],
    $config['db']['dbname']
);

$userController = new UserController($db);
$usersWithFavorites = $userController->getUsersWithFavorites();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites Report</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table th, table td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
<h1>Favorites Report</h1>
<table>
    <thead>
    <tr>
        <th>User ID</th>
        <th>User Name</th>
        <th>Total Favorite Price</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($usersWithFavorites as $user): ?>
        <tr>
            <td><?= $user['user_id'] ?></td>
            <td><?= $user['user_name'] ?></td>
            <td><?= $user['total_favorite_price'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
