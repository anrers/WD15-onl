<?php

echo '<pre>';
var_dump($_POST);
echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input,
        select {
            border: none;
            border-bottom: solid 1px;
            text-transform: uppercase;
            font-weight: 500;
            opacity: 60%;
            padding: 10px 5px;
        }

        select,
        input:focus {
            outline: none;
            border-top: none;
        }

        form {
            padding-inline: 10px;
        }

        h3,
        option,
        p {
            text-transform: uppercase;
        }

        .paymentForm__wrapper {
            max-width: 900px;
            width: 100%;
            margin: 0px auto;
            padding-block: 200px;
        }

        .paymentForm__section {
            margin-bottom: 40px;
        }

        .paymentForm__top-input {
            display: grid;
            grid-template-columns: 1fr 200px 200px;
            grid-template-rows: 1fr 1fr;
            grid-row-gap: 20px;
            grid-column-gap: 50px;  
        }

        .paymentForm__bottom-input {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            grid-row-gap: 20px;
            grid-column-gap: 70px;
        }

        .paymentForm__submit-btn {
            display: block;
            background-color: black;
            font-weight: 500;
            color: white;
            text-transform: uppercase;
            padding: 17px 170px;
            border-radius: 10px;
            margin-inline: auto 0;
            cursor: pointer;
        }

        .paymentForm__submit-btn:hover {
            opacity: 80%;
        }
    </style>
</head>

<body>
    <div class="paymentForm__wrapper">
        <form action="" class="form" method="post">
            <div class="paymentForm__section">
                <h3 class="paymentForm__title">payment details</h3>
                <div class="paymentForm__top-input">
                    <input type="text" class="paymentForm__name" name="card_name" list="card_name" required
                        pattern="^(?!^$)([A-Za-z]+ [A-Za-z]+)$" placeholder="name on card" style="grid-column: 1 / 4;">
                    <datalist id="card_name">
                        <option value="Adam Savage">Adam  Savage</option>
                        <option value="Bill Clinton">Bill Clinton</option>
                        <option value="Charles Bukovski">Charles Bukovski</option>
                    </datalist>
                    <input type="text" class="paymentForm__card_number" placeholder="card number" required name="card_number"
                        pattern="^((?!^$)(\d{13,19}))$" maxlength="19">
                    <input type="text" class="paymentForm__expiration_date" name="expiration_date" placeholder="expiration date"
                        pattern="^((0[1-9]|[12][0-9]|3[01])\.([0][1-9]|[1][0-2])\.(202[4-9]))$" maxlength="10" required>
                    <input type="text" class="paymentForm__security_code" name="security_code" placeholder="CVV"
                     pattern="^(?!^$)[0-9]{3}$" maxlength="3" required>
                </div>
            </div>
            <div class="paymentForm__section">
                <h3 class="paymentForm__title">billing address</h3>
                <div class="paymentForm__bottom-input">
                    <input type="text" class="paymentForm__name" name="card_name"placeholder="name on card"
                     pattern="^(?!^$)([A-Za-z]+ [A-Za-z]+)$" required>
                    <input type="text" class="paymentForm__city" name="city" placeholder="city"
                        pattern="^[A-Za-zÀ-ÖØ-öø-ÿ]+(?:[ '-][A-Za-zÀ-ÖØ-öø-ÿ]+)*$" required>
                    <select name="state_province" required>
                        <option value="" disabled selected style="opacity: 60%;"> state province</option>
                        <option value="Texas">Texas</option>
                        <option value="New York">New York</option>
                        <option value="Florida">Florida</option>
                        <option value="New Jersey">New Jersey</option>
                        <option value="Ohio">Ohio</option>
                    </select>
                    <input type="text" class="paymentForm__zip_code" name="zip_code" placeholder="zip code"
                     pattern="^(?!^$)([0-9]{5})$" maxlength="5" required>
                </div>
            </div>
            <button type="submit" class="paymentForm__submit-btn">pay $888</button>
        </form>
    </div>
</body>

</html>