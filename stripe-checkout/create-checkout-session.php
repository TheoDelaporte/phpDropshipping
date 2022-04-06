<?php

if ($_GET['email'] == '') {
  echo "<script>
                window.location.href='../pages/login.php';
                alert('Vous devez être connecté pour passer commande !');
                </script>";
} else {
  $email = $_GET['email'];
  $idProduit = $_GET['submitDirect'];
  $quantity = 1;


  require 'vendor/autoload.php';
  // This is your test secret API key.
  \Stripe\Stripe::setApiKey('sk_test_51KiIgFC2HVmN5XNH8S2v8zU8tbfvO1dqKcBRgq6x0iVa30LGc5jpB1cBfnyvQpiS9LjHdbyD4M35OsfXB3fQd4mp0008auVkhd');

  header('Content-Type: application/json');

  $YOUR_DOMAIN = 'https://phpdropshipping.test/stripe-checkout/public';

  $checkout_session = \Stripe\Checkout\Session::create([
    'customer_email' => $email,
    'line_items' => [
      [
        # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
        'price' => $idProduit,
        'quantity' => $quantity,
      ],
    ],
    'mode' => 'payment',
    'success_url' => $YOUR_DOMAIN . '/success.php?id=' . $idProduit . '&q=' . $quantity . '&mail=' . $email . '&prix=' . $_GET['prix'],
    'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
  ]);

  header("HTTP/1.1 303 See Other");
  header("Location: " . $checkout_session->url);
}
