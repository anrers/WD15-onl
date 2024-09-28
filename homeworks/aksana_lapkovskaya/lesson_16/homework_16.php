<?php

function validatePassword($password){
    if (strlen($password) < 8 || strlen($password) > 16) {
        return "Password must be between 8 and 16 characters";
    }
    if (!preg_match("/[a-zA-Z]/", $password) || !preg_match("/\d/", $password)) {
        return "Password must contain both letters and numbers";
    }
    if (preg_match_all("/[?%:!()*+=_]/", $password) < 2) {
        return "Password must contain at least two special symbols from the set ?:%!()*+=_";
    }
    if (!preg_match("/[A-Z]/", $password)) {
        return "Password must contain at least one uppercase letter";
    }
    if (preg_match("/\s/", $password)) {
        return "Password must not contain any spaces";
    }  
    
    return "Password is valid.";
}

$password = "Just@So1e_P?6h";
print_r(validatePassword($password));