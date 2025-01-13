<?php

use Model\Database;

require 'vendor/autoload.php';

$database = new Database();

(new \Model\Migrations\CreateTaskTableMigration($database))->up();