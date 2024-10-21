<?php

echo '<pre>';
var_dump($_POST);
echo '</pre>';

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$errors = [];
$isFormApproved = $_POST['formApproval'];

$patternFirstName = "#^[A-Za-zÀ-ÖØ-öø-ÿ]+(?:['-][A-Za-zÀ-ÖØ-öø-ÿ]+)*$#";
$patternLastName = "#^[A-Za-zÀ-ÖØ-öø-ÿ]+(?:['-][A-Za-zÀ-ÖØ-öø-ÿ]+)*(?:\s[A-Za-zÀ-ÖØ-öø-ÿ]+(?:['-][A-Za-zÀ-ÖØ-öø-ÿ]+)*)*$#";
$patternEmail = "#^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$#";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($firstName) || !preg_match($patternFirstName, $firstName)) {
        $errors[] = "Missing First Name";
    }

    if (empty($lastName) || !preg_match($patternLastName, $lastName)) {
        $errors[] = "Missing Last Name";
    }

    if (empty($email) || !preg_match($patternEmail, $email)) {
        $errors[] = "Missing email address";
    }

    if (empty($isFormApproved)) {
        $errors[] = "Check the checkbox for approval";
    }

    if (empty($errors)) {
        echo "Registration is succesful!<br>";
        echo "First Name: $firstName<br>";
        echo "Last Name: $lastName<br>";
        echo "Email: $email<br>";
    } else {
        echo "This form has some errors. Please fix them to proceed:<br>";
        foreach ($errors as $error) {
            echo "$error<br>";
        }
    }
}
