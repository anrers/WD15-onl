<?php


use Model\Database;
use Model\Migrations\CreateDatabaseMigration;

require_once 'vendor/autoload.php';

$database = new Database();

(new CreateDatabaseMigration($database))->dropDataBase();