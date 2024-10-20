<?php
var_dump($_POST);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAYMENT FORM</title>
    <style>
        .wrapper {
            max-width: 800px;
            margin: 20px auto;
            padding-top: 100px;
        }

        .form_wrapper {
            margin-bottom: 45px;
        }

        form {
            padding-inline: 15px;

        }

        h2, option, p {

            text-transform: uppercase;
            font-family: "calibri";
        }

        input, select {
            border: none;
            border-bottom: solid 1px;
            text-transform: uppercase;
            padding: 15px 5px;
        }

        button.form_submit {
            display: block;
            background-color: black;
            color: aliceblue;
            text-transform: uppercase;
            font-weight: 600;
            margin-top: 20px;
            padding: 15px 120px;
            border: none;
            border-radius: 5px;
            margin-inline: auto 0;
        }

    </style>
</head>
<body>
    <div class="wrapper">
        <form action="" class="form" method="post">
            <div class="form_wrapper">
                <h2 class="form_title">payment details</h2>
                <div class="form_values"
                     style="display: grid; grid-template-columns: 1fr 200px 200px; grid-template-rows: 1fr 1fr; grid-row-gap: 20px; grid-column-gap: 50px;">
                    <input type="text" class="form_cards_name" name="cards_name" list="form_cards" required
                           pattern="^(?!^$)([A-Za-z]+ [A-Za-z]+)$" title="Введите реквизиты держателя карты"
                           placeholder="name on card" style="grid-column: 1 / 4;">
                    <datalist id="form_card">
                        <option value="Kirill Tim">Kirill Tim</option>
                        <option value="Ivan Petrov">Ivan Petrov</option>
                        <option value="Petr Petrov">Petr Petrov</option>
                    </datalist>
                    <input type="text" class="form_card_number" required name="card_number" placeholder="card number"
                           pattern="^((?!^$)(\d{13,19}))$" title="Введите номер карты">
                    <input type="date" class="form_card_expiry-date" name="card_expiry-date" placeholder="expiry date"
                           pattern="^((0[1-9]|[12][0-9]|3[01])\.([0][1-9]|[1][0-2])\.(202[4-9]))$"
                           title="Дата действия чч.мм.гг " required>
                    <input type="text" class="form_card_number_last" name="card_number_last" placeholder="CVV"
                           pattern="^(?!^$)[0-9]{3}$" title="Введите CVV код" required>
                </div>
            </div>
            <div class="form_values_wrapper">
                <h2 class="form_title">billing address</h2>
                <div class="form_values" style="display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 1fr 1fr; grid-row-gap: 20px;
        grid-column-gap: 70px;">
                    <input type="text" class="form_cards_name" name="cards_name" list="form_cards"
                           placeholder="name on card" pattern="^(?!^$)([A-Za-z]+ [A-Za-z]+)$" required
                           title="Введите реквизиты держателя карты">
                    <input type="text" class="form_city" name="city" placeholder="city"
                           pattern="^(?!^$)(?!.{20})(([A-Za-z]+)|([A-Za-z]+ [A-Za-z]+))$"
                           title="Введите название населенного пункта" required>
                    <select name="state_province" required id="form_states">
                        <option value="" disabled selected hidden> state province</option>
                        <option value="1"> Minsk</option>
                        <option value="2"> Brest</option>
                        <option value="3"> Gomel</option>
                    </select>
                    <input type="text" class="form_zip" name="zip_code" placeholder="zip code"
                           pattern="^(?!^$)([0-9]{5})$" title="Введите индекс." required>
                </div>
            </div>
            <button type="submit" class="form_submit">pay $888</button>
        </form>
    </div>
</body>

</html>