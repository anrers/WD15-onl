<?php
require_once 'db-connection.php';

print_r(getUserById(3));

updateUser(3, 'Qwerty', 25, 'test@test.com');

deleteUserById(8);
