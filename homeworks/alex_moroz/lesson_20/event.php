<?php
require_once 'src/header.php';
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>
<?php if (isRegistered()) { ?>
    Привет, <?= $_SESSION['name'] ?> <?= $_SESSION['surname'] ?>. Вы успешно зарегистрировались для участия в мероприятии.
<?php } ?>
<?php
require_once 'src/footer.php';
?>
