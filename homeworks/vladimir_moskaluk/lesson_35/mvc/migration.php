<?php

use Model\Database;
use Model\Migration\CreateTaskTableMigration;

require_once 'vendor/autoload.php';

$database = new Database();

(new CreateTaskTableMigration($database))->up();
