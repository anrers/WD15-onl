<?php
$paymentDetailsText = "payment details";
$billingDetailsText = "billing details";

//CardHolder input
$cardHoldersInputName = "cardHolders";
$cardHolderInputName = "cardHolder";
$cardHolderPlaceholder = "name on card";
$cardHolderPattern = "^(?=[\w]{2,} [\w]{2,})[a-z A-Z]{" . ($cardHolderMinLength = 5) . "," . ($cardHolderMaxLength = 50) . "}$";
$cardHolderTitle = "Add card holder NAME (at least 2 characters) and SURNAME (at least 2 characters) separated by a space. Field can't be less than" .
    $cardHolderMinLength . " and greater than " . $cardHolderMaxLength . " characters";

//Card number input
$cardNumberInputName = "cardNumber";
$cardNumberPlaceholder = "card number";
$cardNumberPattern = "^[0-9\s]{" . ($cardNumberMinLength = 17) . "," . ($cardNumberMaxLength = 23) . "}$";
$cardNumberTitle = "Enter card number: from 13 to 19 digits.";

//Expiry date  input
$expiryDateInputName = "expiryDate";
$expiryDatePlaceholder = "expiry date";
$expiryDateTitle = "Expiry date can't be less than current date.";
$today = date_format(new DateTime(), 'Y-m-d');

//Security code input
$securityCodeInputName = "securityCode";
$securityCodePlaceholder = "security code";
$securityCodePattern = "^[0-9]{" . ($securityCodeLength = 3) . "}$";
$securityCodeTitle = "Enter security сode: " . $securityCodeLength . " digits.";

//City input
$cityInputName = "city";
$cityPlaceholder = "city";
$cityPattern = "^[A-Za-z\s-]{ " . ($cityMinLength = 2) . "," . ($cityMaxLength = 30) . "}$";
$cityTitle = "City name can't be less than " . $cityMinLength . " characters and greater than " . $cityMaxLength . " characters";

//State
$stateProvinceDefaultUnreachableOptionName = "state province";

//Zip code input
$zipCodeInputName = "zipCode";
$zipCodePlaceholder = "zip code";
$zipCodePattern = "^[0-9]{ " . ($zipCodeMinLength = 4) . "," . ($zipCodeMaxLength = 6) . "}$";
$zipCodeTitle = "Expected from " . $zipCodeMinLength . " to " . $zipCodeMaxLength . " digits";

$textFieldWithMaxLength = [
    $cityInputName => $cityMaxLength,
    $cardHoldersInputName => $cardHolderMaxLength,
    $cardHolderInputName => $cardHolderMaxLength,
    $securityCodeInputName => $securityCodeLength,
    $zipCodeInputName => $zipCodeMaxLength,
    $cardNumberInputName => $cardNumberMaxLength,
];

$cardHoldersList = [
    "Alex Moroz",
    "Dzmitry Moroz",
    "Other Person",
    "Some Person",
];
$states = [
    "minsk" => "Minsk",
    "mogilev" => "Mogilev",
    "grodno" => "Grodno",
    "brest" => "Brest",
    "vitebsk" => "vitebsk",
    "gomel" => "gOmel",
];