<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework 28</title>
</head>
<body>
    <form method="post" action="db_students.php">
        <label for="name">Enter your name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" required>

        <input type="submit" value="Submit">
    </form>
    <form method="post" action="db_enrollments.php">
        <h2>Enroll All Students</h2>
        <input type="submit" value="Enroll All Students">
    </form>
</body>
</html>