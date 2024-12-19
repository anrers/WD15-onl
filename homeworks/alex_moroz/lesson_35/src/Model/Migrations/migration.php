<?php

use Morozav\Lesson35\Model\Repositories\DatabaseConnection;
use Morozav\Lesson35\Model\Migrations\Tasks\CreateTaskTableMigration as CreateTaskTable;

require_once '../../../vendor/autoload.php';

$db = DatabaseConnection::getConnection();

(new CreateTaskTable($db))->up();