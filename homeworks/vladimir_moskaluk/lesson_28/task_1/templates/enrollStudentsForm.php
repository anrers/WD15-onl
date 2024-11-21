<form action="/lesson_28/task_1/public/enrollStudents.php" method="POST">
    <h3>Select Students to Enroll:</h3>
    <?php if (!empty($students)): ?>
        <?php foreach ($students as $student): ?>
            <div>
                <input type="checkbox" id="student-<?= $student['id'] ?>" name="student_ids[]" value="<?= $student['id'] ?>">
                <label for="student-<?= $student['id'] ?>">
                    <?= htmlspecialchars($student['name']) ?> (<?= htmlspecialchars($student['email']) ?>)
                </label>
            </div>
        <?php endforeach; ?>
        <button type="submit">Enroll Students</button>
    <?php else: ?>
        <p>No students available to enroll.</p>
    <?php endif; ?>
</form>
