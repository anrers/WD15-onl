<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="homework19.php" method="post" enctype="multipart/form-data">

    <div class="form-container">
        <h2>PAYMENT DETAILS</h2>
        <form novalidate>
            <div class="input-group">
                <input type="text" id="card-name" name="card-name" list="card-names"
                       placeholder="NAME ON CARD" title="Введите название карты" required maxlength="20">
                <datalist id="card-names">
                    <option value="Visa">
                    <option value="MasterCard">
                    <option value="American Express">
                </datalist>
            </div>

            <div class="row row_top">
                <div class="input-group">
                    <input type="text" id="card-number" name="card-number"
                           placeholder="CARD NUMBER"
                           title="Введите номер банковской карты" pattern="\d{4}\s\d{4}\s\d{4}\s\d{4}" required>
                </div>
                <div class="input-group">
                    <input type="text" id="expiry-date" name="expiry-date" placeholder="EXPIRY DATE" required
                           title="Введите срок действия" pattern="[0-9]{2}/[0-9]{2}">
                </div>
                <div class="input-group">
                    <input type="text" id="cvv" name="cvv" placeholder="CVV"
                           pattern="[0-9]{3,4}" minlength="3" maxlength="4" title="Введите CVV код" required>
                </div>
            </div>

            <h2 class="title_billing">BILLING ADDRESS</h2>
            <div class="row">
                <div class="input-group">
                    <input type="text" id="billing-name" name="billing-name" placeholder="NAME ON CARD"
                           required title="Введите название карты" maxlength="20" pattern="[a-zA-Z\s]{1,20}">
                </div>
                <div class="input-group">

                    <input type="text" id="city" name="city" placeholder="CITY" required maxlength="20"
                           title="Введите название города" pattern="[a-zA-Z\s]{1,20}">
                </div>
            </div>

            <div class="row">
                <div class="input-group">
                    <select id="state" name="state" required title="Выберите штат">
                        <option value="">STATE PROVINCE</option>
                        <option value="NY">New York</option>
                        <option value="CA">California</option>
                        <option value="TX">Texas</option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="text" id="zip" name="zip" placeholder="ZIP CODE"
                           required pattern="[0-9]{6}" title="Введите индекс города">
                </div>
            </div>
            <button type="submit">PAY $888</button>
        </form>
    </div>
    <script src="imask.min.js"></script>
    <script src="script.js"></script>
</body>
</html>