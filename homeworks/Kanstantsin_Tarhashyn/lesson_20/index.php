<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Work - 20</title>
</head>

<body>
    <form action="register.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="firstName">First name:</label><br>
            <input type="text" id="firstName" name="firstName" value=""
                pattern="#^[A-Za-zÀ-ÖØ-öø-ÿ]+(?:['-][A-Za-zÀ-ÖØ-öø-ÿ]+)*$#">
        </div><br>
        <div>
            <label for="lastName">Last name:</label><br>
            <input type="text" id="lastName" name="lastName" value=""
                pattern="#^[A-Za-zÀ-ÖØ-öø-ÿ]+(?:['-][A-Za-zÀ-ÖØ-öø-ÿ]+)*(?:\s[A-Za-zÀ-ÖØ-öø-ÿ]+(?:['-][A-Za-zÀ-ÖØ-öø-ÿ]+)*)*$#">
        </div><br>
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value=""
                pattern="#^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$#">
        </div><br>
        <div>
            <label for="formApproval">Please approve the form</label>
            <input name="formApproval" type="checkbox" value="yes" required>
        </div><br>
        <button type="submit">Send the form</button>
    </form>
</body>

</html>