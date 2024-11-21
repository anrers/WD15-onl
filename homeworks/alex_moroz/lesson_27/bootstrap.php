<?php
spl_autoload_register(function ($class_name) {
    require_once 'src/classes/' . $class_name . '.php';
});

use Database\UserDaoImpl as UserDao;
use Service\UserServiceImpl as UserService;

$userDao = new UserDao();
$userService = new UserService($userDao);
