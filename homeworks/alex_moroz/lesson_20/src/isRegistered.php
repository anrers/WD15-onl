<?php
function isRegistered(): bool
{
    return (isset($_SESSION['isRegistered']) && $_SESSION['isRegistered'] == true);
}