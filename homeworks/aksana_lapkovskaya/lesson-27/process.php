<?php

$connection = new mysqli("localhost", "root", "", "user_management");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$action = $_POST['action'] ?? 'save';
$name = $_POST['name'] ?? null;
$age = $_POST['age'] ?? null;
$email = $_POST['email'] ?? null;

function saveData($name, $age, $email) {
    global $connection;
    $stmt = $connection->prepare("INSERT INTO users (name, age, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $name, $age, $email);
    if ($stmt->execute()) {
        echo "User saved successfully with ID: " . $connection->insert_id . "<br>";
    } else {
        echo "Error saving user: " . $stmt->error . "<br>";
    }
    $stmt->close();
}

function getUserById($id) {
    global $connection;
    $stmt = $connection->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo "User ID: " . $user['id'] . " - Name: " . $user['name'] . " - Age: " . $user['age'] . " - Email: " . $user['email'] . "<br>";
    } else {
        echo "User with ID $id does not exist.<br>";
    }
    $stmt->close();
}

function updateUser($id, $name, $age, $email) {
    global $connection;
    $stmt = $connection->prepare("UPDATE users SET name = ?, age = ?, email = ? WHERE id = ?");
    $stmt->bind_param("sisi", $name, $age, $email, $id);
    if ($stmt->execute()) {
        echo "User updated successfully.<br>";
    } else {
        echo "Error updating user: " . $stmt->error . "<br>";
    }
    $stmt->close();
}

function deleteUserById($id) {
    global $connection;
    $stmt = $connection->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "User deleted successfully.<br>";
    } else {
        echo "Error deleting user: " . $stmt->error . "<br>";
    }
    $stmt->close();
}

if ($action === 'save' && $name && $age && $email) {
    saveData($name, $age, $email);
} else {
    echo "Please fill out all fields to save a user.<br>";
}

$testId = 14;
$newName = "Jane";
$newAge = 99;
$newEmail = "jane@gmail.com";

echo "<br>Selecting user with ID: $testId<br>";
getUserById($testId);

echo "<br>Updating user with ID: $testId<br>";
updateUser($testId, $newName, $newAge, $newEmail);
getUserById($testId);

echo "<br>Deleting user with ID: $testId<br>";
deleteUserById($testId);
getUserById($testId);

$connection->close();
?>