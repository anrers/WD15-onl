<?php
require_once 'src/implode.php';
session_start();
clearSession();
$locationPath = 'Location: ' . 'hw.php';

$userData = $_POST['userData'] ?? null;
$_SESSION['userData']['name'] = $_POST['userData']['name'] ?? null;
$_SESSION['userData']['surname'] = $_POST['userData']['surname'] ?? null;
$_SESSION['userData']['email'] = $_POST['userData']['email'] ?? null;

$validationProperties = [  //Нужно ли выносить в отдельный config.json ???
    'name' => [
        'length' => ['min' => 2, 'max' => 20],
        'pattern' => [
            'template' => '#^[А-яёЁA-Za-z]+$#',
            'explanation' => 'Только буквенные обозначения.',
        ],
    ],
    'surname' => [
        'length' => ['min' => 2, 'max' => 20],
        'pattern' => [
            'template' => '#^[А-Яа-яёЁA-Za-z]+$#',
            'explanation' => 'Только буквенные обозначения.',
        ],
    ],
    'email' => [
        'length' => ['min' => 7, 'max' => 30],
        'pattern' => [
            'template' => '#^[a-zA-Z]+[a-zA-Z0-9._-]*[a-zA-Z]+@[a-zA-Z\\.]+\\.[a-zA-Z]{2,6}$#',
            'explanation' => "Имя почтового ящика (до символа @): только латинские символы; Цифры от 0 до 9, спец.символы {._-} в середине. 
                           Доменное имя (после символа @): только латинские символы; от 2 до 6 символов после последней точки.",
        ],
    ],
];

$errorsArray = validateUserDataFields($userData, $validationProperties);

if (empty($errorsArray)) {
    $locationPath = $locationPath . "?success=" . true;
    $fileData = file_get_contents(__DIR__ . '/data.txt');
    file_put_contents(__DIR__ . '/data.txt', mapped_implode($_SESSION['userData']) . "\n", FILE_APPEND);
} else {
    $_SESSION['validationErrors'] = $errorsArray;
}

header($locationPath);



function validateUserDataFields($userData, $validationProperties): ?array
{
    foreach ($validationProperties as $property => $rules) {
        $validationResultMessage = getValidationMessage($userData[$property], $rules['length'], $rules['pattern']);

        if ($validationResultMessage) {
            $errorsArray[$property] = $validationResultMessage;
        }
    }
    return ($errorsArray ?? null);
}

function getValidationMessage(string $field, array $fieldSizes, array $pattern): ?string
{
    if (!$field) {
        return "Поле должно быть заполнено.";
    }

    if (mb_strlen($field) < $fieldSizes['min'] || mb_strlen($field) > $fieldSizes['max']) {
        return "Длина от " . $fieldSizes['min'] . " до " . $fieldSizes['max'] . " символов.";
    }

    if (!preg_match($pattern['template'], htmlspecialchars($field, ENT_QUOTES, 'UTF-8'))) {
        return $pattern['explanation'];
    }

    return null;
}

function clearSession(): void
{
    if (isset($_SESSION["validationErrors"])) {
        unset($_SESSION["validationErrors"]);
    }
    if (isset($_SESSION["name"])) {
        unset($_SESSION["name"]);
    }
    if (isset($_SESSION["surname"])) {
        unset($_SESSION["surname"]);
    }
    if (isset($_SESSION["email"])) {
        unset($_SESSION["email"]);
    }
}