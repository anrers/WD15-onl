<?php

$errors = [];
// Проверка поля NAME OF CARD
if (empty($_POST["namecard"])) {
    $errors[] = "The NAME OF CARD field must be filled in";
}
// Проверка поля CARD NUMBER
if (empty($_POST["cardnumber"]) || !preg_match("/^\d{16}$/", $_POST["cardnumber"])) {
    $errors[] = "The card number must contain 16 digits";
}
// Проверка поля EXPIRY DATE
if (empty($_POST["expirydate"])) {
    $errors[] = "The NAME OF CARD field must be filled in";
}
// Проверка поля CARD NUMBER
if (empty($_POST["cardnumber2"]) || !preg_match("/^\d{16}$/", $_POST["cardnumber"])) {
    $errors[] = "The card number (field two) must contain 16 digits";
}
// Проверка поля NAME ON CARD
if(empty($_POST["cardholder"]) || !preg_match("/^[a-zA-ZА-Яа-яЁё]+ [a-zA-ZА-Яа-яЁё]+$/u", $_POST["cardholder"])) {
    $errors[] = "Enter the cardholder's name";
}
// Проверка поля CITY
if (empty($_POST["city"]) || !preg_match("/^[a-zA-ZА-Яа-яЁё]+$/u", $_POST["city"])) {
    $errors[] = "Enter the name of the city";
}
// Проверка поля state
if (empty($_POST["state"])) {
    $errors[] = "Select the name of the state";
}
// Проверка поля ZIP CODE
if (empty($_POST["zipcode"]) || !preg_match("/^\d{3}$/", $_POST["zipcode"])) {
    $errors[] = "Zip code must contain three digits";
}
if (empty($errors)) {
    echo "<h1>Data sent successfully!</h1>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAYMENT</title>
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        .errors {
            font-size: 18px;
            line-height: 23px;
            color: #000;
            margin-bottom: 5px;
        }
        .contacts__title {
            font-size: 24px;
            line-height: 28px;
            color: #333;
            text-transform: uppercase;
            margin-bottom: 15px;
        }
        input, select {
            padding: 10px;
            width: 100%;
            border-radius: 4px;
            border: none;
            font-size: 16px;
            line-height: 20px;
        }
        input:focus, select:focus {
            border-color: #008cba;
            outline: none;
            box-shadow: 0 0 10px rgba(0, 140, 186, 0.5);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .payment-form__group_inputs {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 15px;
        }
        #cardname {
            grid-column: 1 / 5;
        }
        #cardnumber {
            grid-column: 1 / 3;
        }
        .address-form__group_inputs {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 15px;
        }
        .pay-button {
            background-color: #000;
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            width: 50%;
            position: relative;
            left: 50%;
            transition: 0.5s;
        }
        .pay-button:hover {
            background-color: #444;
        }
        
    </style>
</head>
<body>

    <?php if (!empty($errors)): ?>
        <div class="errors"><?= implode('<br>', $errors) ?></div>
    <?php endif; ?>

    <form method="post" action="">

        <div class="contacts-form__wrapper">

            <h2 class="contacts__title">
                PAYMENT DETAILS
            </h2>

            <div class="payment-form__group_inputs">
                <input list="cardnames" class="contacts-form__input" name="namecard" id="cardname" type="text" placeholder="NAME OF CARD" required>
                <datalist id="cardnames">
                    <option value="Visa">
                    <option value="MasterCard">
                </datalist>
                
                <input class="contacts-form__input" id="cardnumber" name="cardnumber" type="number" placeholder="CARD NUMBER" required>
                
                <input class="contacts-form__input" name="expirydate" type="date" placeholder="EXPIRY DATE" required>
                
                <input class="contacts-form__input" name="cardnumber2" type="number" placeholder="CARD NUMBER" required>
            </div>

        </div>

        <div class="contacts-form__wrapper">

            <h2 class="contacts__title">
                BILLING ADDRESS
            </h2>

            <div class="address-form__group_inputs">
                <input class="contacts-form__input" name="cardholder" type="text" placeholder="NAME ON CARD" required>
                <input class="contacts-form__input" name="city" type="text" placeholder="CITY" required>
                <select class="contacts-form__input" name="state" type="text">
                    <option selected>STATE PROVINCE</option>
                    <option value="State1">Minsk Region</option>
                    <option value="State2">Gomel Region</option>
                    <option value="State3">Grodno Region</option>
                    <option value="State4">Mogilev Region</option>
                    <option value="State5">Brest Region</option>
                    <option value="State6">Vitebsk Region</option>
                </select>
                <input class="contacts-form__input" name="zipcode" type="number" placeholder="ZIP CODE" required>
            </div>

        </div>

        <button type="submit" class="pay-button">PAY $888</button>

    </form>

</body>
</html>