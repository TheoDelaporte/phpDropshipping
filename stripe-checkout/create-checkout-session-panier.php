<?php
if ($_GET['email'] == '') {
  echo "<script>
                window.location.href='../pages/login.php';
                alert('Vous devez être connecté pour passer commande !');
                </script>";
} else {
  $email = $_GET['email'];
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
    'customer_email' => $email,
    'line_items' => [
      $data
    ],
    'mode' => 'payment',
    'success_url' => $YOUR_DOMAIN . '/success.php?id=' . $idProduits . '&q=' . $qte . '&mail=' . $email . '&prix=' . $_GET['prix'],
    'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
  ]);

  header("HTTP/1.1 303 See Other");
  header("Location: " . $checkout_session->url);
}
