<?php
require_once 'src/header.php';
require_once 'src/formFieldsName.php';
require_once 'src/showError.php';

$errors = $_SESSION["form_errors"] ?? null;
$userName = $_SESSION['name'] ?? null;
$userSurname = $_SESSION['surname'] ?? null;
$userEmail = $_SESSION['email'] ?? null;
$isFormAccepted = $_SESSION['formAccepted'] ?? false;

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

/**
 * @var array $formFieldNamesData from resourse/config.json defined in formFieldsName.php
 */
?>
    <h2> <?= $formFieldNamesData["header"] ?> </h2>
    <form action="register.php" method="post">
        <div>
            <label for="name"> <?= $formFieldNamesData["name"] ?>:</label>
            <input id="name" name="userData[name]" required <?php if ($userName) echo "value='$userName'"; ?>>

            <?php if ($errors) {
                showErrorMessage($errors, "name");
            } ?>
        </div>
        <div>
            <label for="surname"><?= $formFieldNamesData["surname"] ?>:</label>
            <input id="surname" name="userData[surname]" required <?php if ($userSurname) echo "value='$userSurname'"; ?>>

            <?php if ($errors) {
                showErrorMessage($errors, "surname");
            } ?>
        </div>
        <div>
            <label for="email"><?= $formFieldNamesData["email"] ?>:</label>
            <input id="email" name="userData[email]" type="email" required <?php if ($userEmail) echo "value='$userEmail'"; ?>>

            <?php if ($errors) {
                showErrorMessage($errors, "email");
            } ?>
        </div>
        <div>
            <label for="formAccepted"><?= $formFieldNamesData["checkbox"] ?>:</label>
            <input id="formAccepted" name="formAccepted" type="checkbox" value="true"
                   <?php if ($isFormAccepted) echo "checked"; ?>>

            <?php if ($errors) {
                showErrorMessage($errors, "formAccepted");
            } ?>
        </div>
        <button name="submit" type="submit"><?= $formFieldNamesData["registerButtonName"] ?></button>
    </form>
<?php
require_once 'src/footer.php';
?>