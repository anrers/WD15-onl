<?php

function showErrorMessage($errors, $key) {
    $errorValue = $errors[$key] ?? null;
    if ($errorValue) {
        foreach ($errors[$key] as $error) { ?>
            <span style="color: red"> <?= $error ?> </span>
        <?php }
    }
}
