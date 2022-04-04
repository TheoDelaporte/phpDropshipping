<?php
if (isset($_GET['submitDirect'])) {
  $email = $_GET['email'];
  $idProduit = $_GET['submitDirect'];
  $quantity = 1;
}

require 'vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51KiIgFC2HVmN5XNH8S2v8zU8tbfvO1dqKcBRgq6x0iVa30LGc5jpB1cBfnyvQpiS9LjHdbyD4M35OsfXB3fQd4mp0008auVkhd');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'https://phpdropshipping.test/stripe-checkout/public';

$checkout_session = \Stripe\Checkout\Session::create([
  // 'customer_email' => isset($email),
  'line_items' => [
    [
      # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
      'price' => $idProduit,
      'quantity' => $quantity,
    ],
  ],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
