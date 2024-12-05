<?php

require_once 'Database.php';
require_once 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$user->create("Hello Bye", "hello@bye.com");

$user->update(1, "Hello Goodbye", "hello@goodbye.com");

$user->delete(1);

