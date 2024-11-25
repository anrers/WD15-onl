<?php

session_start(); ?>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HW 32</title>
</head>
<style>
    div {
        margin-bottom: 5px;
    }
</style>
<body>

<form action="password/generatePassword.php" method="post">
    <div>
        <label for="passwordLength">Password length:</label>
        <input name="passwordLength"
               id="passwordLength"
               type="number"
               min="5"
               max="20"
        >
        <?php
        if (isset($_SESSION["error"])) { ?>
        <span style="background-color: antiquewhite; color: red">
            <?php
            echo $_SESSION["error"] ?> <span>
    </span>
    </div>
    <?php
    } ?>
    <button name="submit" type="submit">Generate</button>
</form>
<br>
<br>
<?php
if (isset($_SESSION["password"])) { ?>
    <div>
        Generated password: <span style="background-color: burlywood">
        <?php
        echo $_SESSION["password"] ?>
    </span>
    </div>
<?php
}
if (isset($_SESSION["password"])) {
    unset($_SESSION["password"]);
}

if (isset($_SESSION["error"])) {
    unset($_SESSION["error"]);
}
?>


