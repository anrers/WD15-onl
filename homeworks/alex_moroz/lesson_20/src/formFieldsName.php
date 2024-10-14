<?php
$fileData = file_get_contents(dirname(__DIR__) . "/resourse/formConfig.json");

$formFieldNamesData = json_decode($fileData, true);
?>
