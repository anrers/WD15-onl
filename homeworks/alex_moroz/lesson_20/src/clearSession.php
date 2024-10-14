<?php
function clearSession(): void
{
    if (isset($_SESSION["form_errors"])) {
        unset($_SESSION["form_errors"]);
    }
    if (isset($_SESSION["isRegistered"])) {
        unset($_SESSION["isRegistered"]);
    }
    if (isset($_SESSION["name"])) {
        unset($_SESSION["name"]);
    }
    if (isset($_SESSION["surname"])) {
        unset($_SESSION["surname"]);
    }
}
