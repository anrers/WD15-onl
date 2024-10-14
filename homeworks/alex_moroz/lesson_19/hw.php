<?php
require 'data.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <title>HW 19</title>
</head>
<body>
<div class="payment-form">
    <form action="" method="post">
        <div class="form__wrapper">
            <p class="header"> <?= $paymentDetailsText ?> </p>
            <div class="details details__payment">
                <input class="details__item_union_first_row_columns"
                       id="<?= $cardHoldersInputName ?>"
                       name="<?= $cardHoldersInputName ?>"
                       list="cardHoldersList"
                       placeholder="<?= $cardHolderPlaceholder ?>"
                       pattern="<?= $cardHolderPattern ?>"
                       title="<?= $cardHolderTitle ?>"
                       minlength="<?= $cardHolderMinLength ?>"
                       maxlength="<?= $cardHolderMaxLength ?>"
                       oninput="fillCardHolder()"
                       required/>
                <datalist id="cardHoldersList">
                    <?php
                    foreach ($cardHoldersList as $cardHolder) { ?>
                        <option value="<?= $cardHolder ?>"></option>
                    <?php } ?>
                </datalist>
                <input class="details__item_union_card_number_columns"
                       id="<?= $cardNumberInputName ?>"
                       name="<?= $cardNumberInputName ?>"
                       minlength="<?= $cardNumberMinLength ?>"
                       maxlength="<?= $cardNumberMaxLength ?>"
                       placeholder="<?= $cardNumberPlaceholder ?>"
                       pattern="<?= $cardNumberPattern ?>"
                       title="<?= $cardNumberTitle ?>"
                       required/>
                <input id=" <?= $expiryDateInputName ?>"
                       name=" <?= $expiryDateInputName ?>"
                       placeholder="<?= $expiryDatePlaceholder ?>"
                       min="<?= $today ?>"
                       title="<?= $expiryDateTitle ?>"
                       type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'"
                       required>
                <input id="<?= $securityCodeInputName ?>"
                       name="<?= $securityCodeInputName ?>"
                       placeholder="<?= $securityCodePlaceholder ?>"
                       minlength="<?= $securityCodePlaceholder ?>3"
                       maxlength="<?= $securityCodePlaceholder ?>3"
                       pattern="<?= $securityCodePattern ?>"
                       title="<?= $securityCodeTitle ?>"
                       required/>
            </div>

            <p class="header"> <?= $billingDetailsText ?> </p>
            <div class="details details__billing">
                <input id="<?= $cardHolderInputName ?>"
                       name="<?= $cardHolderInputName ?>"
                       placeholder="<?= $cardHolderPlaceholder ?>"
                       pattern="<?= $cardHolderPattern ?>"
                       title="<?= $cardHolderTitle ?>"
                       minlength="<?= $cardHolderMinLength ?>"
                       maxlength="<?= $cardHolderMaxLength ?>"
                       required/>
                <input id="<?= $cityInputName ?>"
                       name="<?= $cityInputName ?>"
                       placeholder="<?= $cityPlaceholder ?>"
                       pattern="<?= $cityPattern ?>"
                       title="<?= $cityTitle ?>"
                       minlength="<?= $cityMinLength ?>"
                       maxlength="<?= $cityMaxLength ?>"
                       required/>
                <select name="placeholder__item" id="stateProvince" required>
                    <option disabled selected hidden><?= $stateProvinceDefaultUnreachableOptionName ?></option>
                    <?php
                    foreach ($states as $stateKey => $stateValue) { ?>
                        <option value="<?= $stateKey ?>"> <?= $stateValue ?> </option>
                    <?php } ?>
                </select>

                <input id="<?= $zipCodeInputName ?>"
                       name="<?= $zipCodeInputName ?>"
                       placeholder="<?= $zipCodePlaceholder ?>"
                       minlength="<?= $zipCodeMinLength ?>"
                       maxlength="<?= $zipCodeMaxLength ?>"
                       pattern="<?= $zipCodePattern ?>"
                       title="<?= $zipCodeTitle ?>"
                       required/>
            </div>
            <div class="button-wrapper">
                <button name="submitPayment" type="submit" class="button button_align-left">pay $888</button>
            </div>
        </div>
    </form>
</div>
<script src="script.js"></script>

<script>
    <?php foreach ($textFieldWithMaxLength as $key => $value) {?>
    document.getElementById(<?= $key ?>).addEventListener('input', function () {
        const maxLength = <?= $value ?>;
        if (this.value.length > maxLength) {
            this.value = this.value.substring(0, maxLength);
        }
    });
    <?php } ?>
</script>
</body>
</html>