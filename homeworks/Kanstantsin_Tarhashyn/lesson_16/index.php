<?php

$password = "qwe 2rty_weRty!)";
function passwordCheck ($password) {

    if (strlen($password) < 8 || strlen($password) > 16) {
        return "Password should be between 8 and 16 characters";
    }

    if (!preg_match("#[a-zA-z]#", $password) || !preg_match("#[0-9]#", $password)) {
        return "Password should contain both letters and numbers";
    }

    $specialSymbols = "#[?%:!()*+=_/]#";
    if (preg_match_all($specialSymbols, $password) < 2) {
        return "Password should contain at least two special symbols:  ?:%!()*+=_";
    }
    
    if (!preg_match("#[A-Z]#", $password)) {
        return "Password should contain at least one uppercase letter";
    }

    if (preg_match("#\s+#", $password)) {
        return "Password should not contain any spaces";
    }

    return "Valid Password!";
}

$result = passwordCheck($password);
print_r($result);
