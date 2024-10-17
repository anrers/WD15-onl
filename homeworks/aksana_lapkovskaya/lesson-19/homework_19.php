<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <style>
        input,
        select {
            border: none;
            border-bottom: solid 1px black;
            text-transform: uppercase;
            font-weight: 500;
            opacity: 60%;
            padding: 10px 5px;
            appearance: none;
            background: none;
            width: 100%;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        select,
        input[list] {
            cursor: pointer;
        }

            position: relative;
            width: 100%;
        }

        .select-wrapper select {
            width: 100%;
            padding: 10px 5px;
            border: none;
            border-bottom: solid 1px black;
            font-weight: 500;
            opacity: 60%;
            appearance: none;
            background-color: transparent;
            text-transform: uppercase;
        }

        select {
            border-radius: 0;
        }

        .select-wrapper:after {
            content: '';
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none;
            opacity: 60%;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-top: 6px solid black;
        }

        select:focus {
            outline: none;
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
            margin: 0 auto;
            padding: 50px;
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
            padding: 17px 90px;
            border-radius: 0;
            margin: 60px 0 0 auto;
            width: 400px;
            cursor: pointer;
            border: none;
        }

        .paymentForm__submit-btn:hover {
            opacity: 80%;
        }
    </style>
</head>

<body>
    <div class="paymentForm__wrapper">
        <form action="" class="form" method="post" novalidate>
            <div class="paymentForm__section">
                <h3 class="paymentForm__title">payment details</h3>
                <div class="paymentForm__top-input">
                    <div class="select-wrapper" style="grid-column: 1 / 4;">
                        <input type="text" class="paymentForm__name" name="card_name" list="card_name" 
                        placeholder="Name on Card" minlength="5" maxlength="50" pattern="^[A-Za-z\s]+$" required>
                        <datalist id="card_name">
                            <option value="Blobby">Blobby</option>
                            <option value="Floppy">Floppy</option>
                            <option value="Flippy">Flippy</option>
                        </datalist>
                    </div>

                    <input type="text" class="paymentForm__card_number" placeholder="Card Number" 
                    name="card_number" minlength="13" maxlength="19" pattern="^\d{13,19}$" required>

                    <input type="text" class="paymentForm__expiration_date" name="expiration_date" 
                    placeholder="MM/DD/YYYY" pattern="(0[1-9]|1[0-2])\/(0[1-9]|[12][0-9]|3[01])\/([0-9]{4})" maxlength="10" required>

                    <input type="text" class="paymentForm__security_code" name="security_code" 
                    placeholder="CVV" minlength="3" maxlength="4" pattern="^\d{3,4}$" required>
                </div>
            </div>
            
            <div class="paymentForm__section">
                <h3 class="paymentForm__title">billing address</h3>
                <div class="paymentForm__bottom-input">

                    <input type="text" class="paymentForm__name" name="billing_name" 
                    placeholder="Billing Address" minlength="5" maxlength="50" pattern="^[A-Za-z\s]+$" required>

                    <input type="text" class="paymentForm__city" name="city" placeholder="City" 
                    pattern="^[A-Za-z\s]+$" required>

                    <div class="select-wrapper">
                        <select name="state_province" required>
                            <option value="" disabled selected>State Province</option>
                            <option value="Washington">Washington</option>
                            <option value="Oregon">Oregon</option>
                            <option value="California">California</option>
                            <option value="Colorado">Colorado</option>
                            <option value="Arizona">Arizona</option>
                            <option value="New Jersey">New Jersey</option>
                        </select>
                    </div>

                    <input type="text" class="paymentForm__zip_code" name="zip_code" 
                    placeholder="Zip Code" minlength="5" maxlength="5" pattern="^\d{5}$" required>
                </div>
            </div>
            <button type="submit" class="paymentForm__submit-btn">pay $6666</button>
        </form>
    </div>
</body>

</html>