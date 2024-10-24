<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];

   
    $file = fopen("data.txt", "a");

    if ($file) {
        $data = "$firstName, $lastName, $email\n";
        fwrite($file, $data); 

        fclose($file);

        echo "The data has been successfully saved to the file.";
    } else {
        echo "Error: failed to open the file for writing.";
    }
} else {
    echo "Please fill in the form.";
}