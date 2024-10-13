<?php
$formName = $_POST["formName"] ?? null;
$formSurname = $_POST["formSurname"] ?? null;
$formEmail = $_POST["formEmail"] ?? null;
$formAgree = $_POST["formAgreement"] ?? null;


if (!empty($formName) && !empty($formSurname) && !empty($formEmail) && !empty($formAgree)) {
    if (preg_match("#^[a-zA-Z]{3,15}$#", $formName) && preg_match("#^[a-zA-Z]{3,15}$#", $formSurname) && preg_match("#^[\w/.]+@[a-z]{5,8}.[a-z]{3}$#", $formEmail) && $formAgree) {
        $formResult = "Form is successfully submitted!";
        echo "<p>$formResult</p>";
    } else {
        $formResult = "Form is not submitted!";
        echo "<p>$formResult</p>";
    }
}
echo "<a href='index.php'>Return to form!</a>";
