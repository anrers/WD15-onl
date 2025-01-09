<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Model\Database;
use Model\Migrations\CreateTaskTableMigrations;

$db = new Database();

$migration = new CreateTaskTableMigrations($db);

/* $migration->up(); */

echo "Таблица успешно создана.\n";