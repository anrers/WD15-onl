<?php
var_dump($_POST);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework 19</title>
    <style>

        input, select {
            border: none;
            border-bottom: solid 1px;
            text-transform: uppercase;
            font-weight: 500;
            color: grey;
            padding: 15px 5px;
        }

        form {
            padding-inline: 15px;
        }

        .form_wrapper {
            max-width: 800px;
            width: 100%;
            margin: 0px auto;
            padding-block: 200px;
        }

        .form_values_wrapper {
            margin-bottom: 45px;
        }

        h3, option, p {
            text-transform: uppercase;
        }

        button.form_submit {
            display: block;
            background-color: black;
            color: aliceblue;
            text-transform: uppercase;
            font-weight: 600;
            padding: 17px 120px;
            border: none;
            border-radius: 10px;
            margin-inline: auto 0;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="form_wrapper">
    <form action="" class="form" method="post">
        <div class="form_values_wrapper">
            <h3 class="form_title">payment details</h3>
            <div class="form_values" style="display: grid; grid-template-columns: 1fr 200px 200px; grid-template-rows: 1fr 1fr; grid-row-gap: 20px;
        grid-column-gap: 50px;">
                <input type="text" class="form_cards_name" name="cards_name" list="form_cards" required
                       pattern="^(?!^$)([A-Za-z]+ [A-Za-z]+)$" title="Введите имя и фамилию держателя карты"
                       placeholder="name on card"  style="grid-column: 1 / 4;">
                <datalist id="form_cards">
                    <option value="alex kyio">alex kyio</option>
                    <option value="mart hytr">mart hytr</option>
                    <option value="ert uytn">ert uytn</option>
                </datalist>
                <input type="text" class="form_card_number" required name="card_number" placeholder="card number"
                       pattern="^((?!^$)(\d{13,19}))$" title="Введите номер карты (13-19 значений)">
                <input type="text" class="form_card_expiry-date" name="card_expiry-date" placeholder="expiry date"
                       pattern="^((0[1-9]|[12][0-9]|3[01])\.([0][1-9]|[1][0-2])\.(202[4-9]))$" title="Введите действующую дату в формате: число.месяц.год " required>
                <input type="text" class="form_card_number_last" name="card_number_last" placeholder="card number"
                       pattern="^(?!^$)[0-9]{3}$" title="Введите CVV (3 значения)" required>
            </div>
        </div>
        <div class="form_values_wrapper">
            <h3 class="form_title">billing address</h3>
            <div class="form_values" style="display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 1fr 1fr; grid-row-gap: 20px;
        grid-column-gap: 70px;">
                <input type="text" class="form_cards_name" name="cards_name" list="form_cards"
                       placeholder="name on card" pattern="^(?!^$)([A-Za-z]+ [A-Za-z]+)$" required
                       title="Введите имя и фамилию держателя карты">
                <input type="text" class="form_city" name="city" placeholder="city"
                       pattern="^(?!^$)(?!.{20})(([A-Za-z]+)|([A-Za-z]+ [A-Za-z]+))$" title="Введите название населенного пункта" required>
                <select name="state_province" required id="form_states">
                    <option value="" disabled selected hidden> state province</option>
                    <option value="1"> first value</option>
                    <option value="2"> second value</option>
                    <option value="3"> first value</option>
                </select>
                <input type="text" class="form_zip_coder" name="zip_coder" placeholder="zip coder"
                       pattern="^(?!^$)([0-9]{5})$" title="Введите 5 цифр." required>
            </div>
        </div>
        <button type="submit" class="form_submit">pay</button>
    </form>
</div>
</body>
