<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HW-19</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container bg-secondary-subtle p-4 text-center rounded-3">
        <form >
           <div class="text-start mb-5">
                <h5 class="mb-4">PAYMENT DETAILS</h5>
                <div class="mb-3 fs-6">
                    <input list="name_on_card_var" id="name_on_card_chose" name="name_on_card_chose" placeholder="NAME ON CARD" class="form-control border-0 border-bottom border-dark border-2 bg-secondary-subtle w-100">
                    <datalist id="name_on_card_var">
                        <option value="Ivav ivanov"></option>
                        <option value="Peter Petrov"></option>
                        <option value="Galina Ivanovna"></option>
                    </datalist>
                </div>

                <div class="row gx-5">
                    <div class="col-6">
                        <input class="form-control w-100 border-0 border-bottom border-dark border-2 bg-secondary-subtle" type="number" placeholder="CARD NUMBER">
                    </div>
                    <div class="col-3">
                        <input class="form-control w-100 border-0 border-bottom border-dark border-2 bg-secondary-subtle" type="date" placeholder="EXPIRY DATE">
                    </div>
                    <div class="col-3">
                        <input class="form-control w-100 border-0 border-bottom border-dark border-2 bg-secondary-subtle" type="number" placeholder="CARD NUMBER">
                    </div>
                </div>

                
            </div>
            <div class="text-start mb-5">
                <h5 class="mb-4">BILLING ADDRESS</h5>
                <div class="row gx-5 mb-4">
                    <div class="col-6">
                        <input class="form-control w-100 border-0 border-bottom border-dark border-2 bg-secondary-subtle" type="text" placeholder="NAME ON CARD">
                    </div>
                    <div class="col-6">
                        <input class="form-control w-100 border-0 border-bottom border-dark border-2 bg-secondary-subtle" type="text" placeholder="CITY">
                    </div>
                    
                </div>
                <div class="row gx-5">
                    <div class="col-6">
                        <select class="form-select w-100 border-0 border-bottom border-dark border-2 bg-secondary-subtle" type="text" aria-label="Пример выбора по умолчанию">
                            <option selected>STATE PROVINCE</option>
                            <option value="1">Ингушетия</option>
                            <option value="2">Тыва</option>
                            <option value="3">Карачаево-Черкесия</option>
                            <option value="4">Карелия</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <input class="form-control w-100 border-0 border-bottom border-dark border-2 bg-secondary-subtle" type="text" placeholder="ZIP CODE">
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-dark" style="padding: 1% 20%">PAY $888</button>
            </div> 
        </form>
    </div>
    
    
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>