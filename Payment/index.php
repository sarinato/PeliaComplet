<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- css Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">    
    <title>Pay Page</title>    
</head>
<body>
    <div class="container">
        <h2 class="my-4 text-center">Pay for Pelia Service [20$]</h2>
        <form action="./charge.php" method="post" id="payment-form">                    
            <div class="form-row">
                <input type="text" class="form-control mb-3 StripeElement StripeElement--empty" name ="first_name" placeholder="First Name">
                <input type="text" class="form-control mb-3 StripeElement StripeElement--empty" name="last_name" placeholder="Last Name">
                <input type="text" class="form-control mb-3 StripeElement StripeElement--empty" name="email" placeholder="Email Adress">                
                <div id="card-element" class="form-control">
                <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>
            
            <button>Submit Payment</button>
        </form>
    </div>

    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="./js/charge.js"></script>

</body>
</html>