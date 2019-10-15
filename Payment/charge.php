<?php
require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('modules/Customer.php');
require_once('modules/Transaction.php');

\Stripe\Stripe::setApiKey('sk_test_aTltiQRgwjMVxfhx6AyHhJfj00DKtY96uT');

// Sanitize Post Array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];

// Create Customer in stripe
$customer = \Stripe\Customer::create(array(
    "email" => $email,    
    "source" => $token
));
// Charge Customer in stripe
$charge = \Stripe\Charge::create(array(
    "amount" => 1000,
    "currency" => "usd",
    "description" => "Pelia Reminding Service",
    "customer" => $customer->id
));

// Customer Data
$customerData = [
    "id" => $charge->customer,
    "first_name" => $first_name,
    "last_name" => $last_name,
    "email" => $email 
];

// Instantiate Customer
$customer = new Customer();

// Add customer To db
$customer->addCustomer($customerData);

// Transaction Data
$transactionData = [
    "id" => $charge->id,
    "customer_id" => $charge->customer,
    "product" => $charge->description,
    "amount" => $charge->amount,
    "currency" => $charge->currency,
    "status" => $charge->status
];

// Instantiate Customer
$transaction = new Transaction();

// Add customer To db
$transaction->addTransaction($transactionData);

// Redirect to the success page
header("location: success.php?tid=".$charge->id."&product=".$charge->description);