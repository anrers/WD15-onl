<?php

require_once __DIR__ . '/../src/Database.php';
require_once __DIR__ . '/../src/StudentController.php';

use App\Database;
use App\StudentController;

$config = require __DIR__ . '/../config/config.php';

$db = (new Database($config['db']))->getConnection();
$controller = new StudentController($db);

// Получаем список всех студентов для формы зачисления
$students = $controller->getAllStudents();

include __DIR__ . '/../templates/addStudentForm.php';
include __DIR__ . '/../templates/enrollStudentsForm.php';
