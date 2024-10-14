<?php

echo '<pre>';
var_dump($_POST);
echo '</pre>';

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$isFormApproved = $_POST['formApproval'];

$isFormSubmited = ($firstName and $lastName and $email and $isFormApproved);

if ($isFormSubmited) {
    $result = "The form has been succesfuly submited";
} else {
    $result = "The form has not been submitted";
}

print_r("$result\n");

echo "<br>";
echo "<a href='index.php'>Click here to resubmit the form</a>";