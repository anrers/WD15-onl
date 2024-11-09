<?php

require_once '../bootstrap.php';

if (isset($_POST["id"])) {
    $result = $userService->remove($_POST["id"]);
}
header("Location: ../index.php");
