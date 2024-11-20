<?php

require_once __DIR__ . '/../src/Database.php';
require_once __DIR__ . '/../src/StudentController.php';

use App\Database;
use App\StudentController;

$config = require __DIR__ . '/../config/config.php';

$db = (new Database($config['db']))->getConnection();
$controller = new StudentController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    if (!empty($name) && !empty($email)) {
        $controller->addStudent($name, $email);
        header('Location: /lesson_28/task_1/public/index.php');
        exit();
    } else {
        echo "Name and Email are required.";
    }
}
