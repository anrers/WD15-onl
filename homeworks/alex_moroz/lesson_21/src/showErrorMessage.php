<?php

function showErrorMessage($errors, $key)
{
    $errorValue = $errors[$key] ?? null;
    if ($errorValue) { ?>
        <span style="color: red"> <?= $errorValue ?> </span>
    <?php }
}