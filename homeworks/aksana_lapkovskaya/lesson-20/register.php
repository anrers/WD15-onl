<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    if (empty($_POST['first_name'])) {
        $errors[] = 'First name is required.';
    } else {
        $first_name = htmlspecialchars(trim($_POST['first_name']));
        if (strlen($first_name) < 2) {
            $errors[] = 'First name must be at least 2 characters long.';
        }
    }

    if (empty($_POST['last_name'])) {
        $errors[] = 'Last name is required.';
    } else {
        $last_name = htmlspecialchars(trim($_POST['last_name']));
        if (strlen($last_name) < 2) {
            $errors[] = 'Last name must be at least 2 characters long.';
        }
    }

    if (empty($_POST['email'])) {
        $errors[] = 'Email is required.';
    } else {
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format.';
        }
    }

    if (!isset($_POST['agreement'])) {
        $errors[] = 'You must agree to the terms and conditions.';
    }

    if (empty($errors)) {
        echo "Registration successful!";
        echo "<br>First Name: " . htmlspecialchars($first_name);
        echo "<br>Last Name: " . htmlspecialchars($last_name);
        echo "<br>Email: " . htmlspecialchars($email);
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
        echo "<br><a href='homework_20.html'>Go back to registration</a>";
    }
}