<?php
require_once 'enroll_students.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enroll Students</title>
</head>
<body>
    <h2>Enroll Students</h2>
    <form method="post">
        <label>Select Students to Enroll:</label><br>
        <?php foreach ($students as $student): ?>
            <input type="checkbox" name="student_ids[]" value="<?= $student['id'] ?>">
            <?= $student['name'] ?><br>
        <?php endforeach; ?>
        <input type="submit" value="Enroll Selected Students">
    </form>
</body>
</html>