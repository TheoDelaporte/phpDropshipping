<?php

$idProduits = $_GET['id'];
$array = explode(" ", $idProduits);
$count = count($array) - 1;
$qte = $_GET['q'];
$quantity = explode(" ", $qte);

if ($count == 1) {
  $data = array([
    'price' => $array['0'],
    'quantity' => $quantity[0],
  ],);
} elseif ($count == 2) {
  $data = array(
    [
      'price' => $array['0'],
      'quantity' => $quantity[0],
    ],
    [
      'price' => $array['1'],
      'quantity' => $quantity[1],
    ],
  );
} elseif ($count == 3) {
  $data = array(
    [
      'price' => $array['0'],
      'quantity' => $quantity[0],
    ],
    [
      'price' => $array['1'],
      'quantity' => $quantity[1],
    ],
    [
      'price' => $array['2'],
      'quantity' => $quantity[2],
    ],
  );
} elseif ($count == 4) {
  $data = array(
    [
      'price' => $array['0'],
      'quantity' => $quantity[0],
    ],
    [
      'price' => $array['1'],
      'quantity' => $quantity[1],
    ],
    [
      'price' => $array['2'],
      'quantity' => $quantity[2],
    ],
    [
      'price' => $array['3'],
      'quantity' => $quantity[3],
    ],
  );
} elseif ($count == 5) {
  $data = array(
    [
      'price' => $array['0'],
      'quantity' => $quantity[0],
    ],
    [
      'price' => $array['1'],
      'quantity' => $quantity[1],
    ],
    [
      'price' => $array['2'],
      'quantity' => $quantity[2],
    ],
    [
      'price' => $array['3'],
      'quantity' => $quantity[3],
    ],
    [
      'price' => $array['4'],
      'quantity' => $quantity[4],
    ],
  );
}
require 'vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51KiIgFC2HVmN5XNH8S2v8zU8tbfvO1dqKcBRgq6x0iVa30LGc5jpB1cBfnyvQpiS9LjHdbyD4M35OsfXB3fQd4mp0008auVkhd');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'https://phpdropshipping.test/stripe-checkout/public';

$checkout_session = \Stripe\Checkout\Session::create([
  // 'customer_email' => isset($email),
  'line_items' => [
    $data
    // [
    //   # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    //   'price' => $idProduit,
    //   'quantity' => $quantity,
    // ],
    // [
    //   'price' => $idProduit,
    //   'quantity' => 2,
    // ],
  ],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
