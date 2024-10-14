<?php
require_once 'src/bootstrap.php';
require_once 'src/clearSession.php';
clearSession();

$userData = $_POST['userData'] ?? null;

$formAccepted = $_POST['formAccepted'] ?? false;
$fileData = file_get_contents(__DIR__ . "/resourse/formErrorConfig.json");
$formErrors = json_decode($fileData, true);

$errorsArray = validateUserDataFields($userData, $formErrors);
if (!$formAccepted) {
    addError($errorsArray, 'formAccepted', 'required', "Примите согласие на обработку данных формы.");
}

if (empty($errorsArray)) {
    $_SESSION['isRegistered'] = true;
    $page = 'event.php';
} else {
    $_SESSION["form_errors"] = $errorsArray;
    $page = 'hw.php';
}

$_SESSION['name'] = $_POST['userData']['name'];
$_SESSION['surname'] = $_POST['userData']['surname'];
$_SESSION['email'] = $_POST['userData']['email'];
$_SESSION['formAccepted'] = $_POST['formAccepted'];
header("location: " . $page);

function validateUserDataFields($userData, $formErrors): array
{
    $errorsArray = [];

    foreach ($formErrors as $key => $value) {

        //check required field is presented and is filled
        if (empty($userData[$key]) && $value['required'] || !$userData) {
            addError($errorsArray, $key, 'required', "Поле должно быть заполнено.");
            continue;
        }

        //check length
        if (mb_strlen($userData[$key]) < $value['minLength'] || mb_strlen($userData[$key]) > $value['maxLength']) {
            addError($errorsArray, $key, 'length', "Длина поля должна быть от " . $value['minLength'] . " до " . $value['maxLength'] . " букв.");
        }

        //check pattern match
        if (!preg_match($value['pattern'], htmlspecialchars($userData[$key], ENT_QUOTES, 'UTF-8'))) {
            if ($key != "email") {
                addError($errorsArray, $key, 'pattern', "В поле должны быть введены только буквы.");
                continue;
            }

            addError($errorsArray, $key, 'pattern', " Email: 
                        <ul>
                            <li> <b>не должен</b> начинаться cо знака \"@ \"</li>
                            <li> <b>не должно</b> быть пробелов</li>
                            <li> <b>может</b> содержать буквы латинского алфавита, а также цифры и знаки \"._-\" (не в начале и не перед знаком \"@ \).</li>
                            <li> <b>должен</b> содержать знак \"@\".</li>
                            <li> после знака \"@\" <b>должны</b> быть только латинские буквы и точка.</li>
                            <li> домен <b>должен</b> быть от 2 до 6 символов.</li>
                        </ul>");
        }
    }

    return $errorsArray;
}

function addError(&$errorsArray, $fieldName, $errorType, $errorDescription): void
{
    $errorsArray[$fieldName][$errorType] = $errorDescription;
}