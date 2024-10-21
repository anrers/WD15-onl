<?php
function validateField($field, $fieldName, $minLength = 2) {
    if (empty($field)) {
        return "$fieldName is required.";
    } else {
        $sanitizedField = htmlspecialchars(trim($field));
        if (strlen($sanitizedField) < $minLength) {
            return "$fieldName must be at least $minLength characters long.";
        }
    }
    return null;
}

function validateEmail($email) {
    if (empty($email)) {
        return 'Email is required.';
    } else {
        $sanitizedEmail = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
        if (!filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL)) {
            return 'Invalid email format.';
        }
    }
    return null;
}

function saveDataToFile($firstName, $lastName, $email, $fileName = "data.txt") {
    $file = fopen($fileName, "a");
    fwrite($file, "$firstName,$lastName,$email\n");
    fclose($file);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    $firstNameError = validateField($_POST['first_name'], 'First name');
    $lastNameError = validateField($_POST['last_name'], 'Last name');
    $emailError = validateEmail($_POST['email']);

    if ($firstNameError) $errors[] = $firstNameError;
    if ($lastNameError) $errors[] = $lastNameError;
    if ($emailError) $errors[] = $emailError;

    if (!isset($_POST['agreement'])) {
        $errors[] = 'You must agree to the terms and conditions.';
    }

    if (empty($errors)) {
        $firstName = htmlspecialchars(trim($_POST['first_name']));
        $lastName = htmlspecialchars(trim($_POST['last_name']));
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

        saveDataToFile($firstName, $lastName, $email);

        echo "Data successfully written to data.txt!";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
} else {
    header("Location: form.html");
    exit;
}