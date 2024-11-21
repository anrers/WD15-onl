<?php
spl_autoload_register(function ($class_name) {
    require_once 'src/' . $class_name . '.php';
});
session_start();

use Repository\User\UserRepositoryImpl as UserRepository;
use Service\User\UserServiceImpl as UserService;

$userRepository = new UserRepository();
$userService = new UserService($userRepository);
