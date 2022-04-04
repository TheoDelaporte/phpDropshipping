<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include_once("../fonctions-panier.php");

$erreur = false;

$action = (isset($_POST['action']) ? $_POST['action'] : (isset($_GET['action']) ? $_GET['action'] : null));
if ($action !== null) {
  if (!in_array($action, array('ajout', 'suppression', 'refresh')))
    $erreur = true;

  //récupération des variables en POST ou GET
  $l = (isset($_POST['l']) ? $_POST['l'] : (isset($_GET['l']) ? $_GET['l'] : null));
  $p = (isset($_POST['p']) ? $_POST['p'] : (isset($_GET['p']) ? $_GET['p'] : null));
  $q = (isset($_POST['q']) ? $_POST['q'] : (isset($_GET['q']) ? $_GET['q'] : null));

  //Suppression des espaces verticaux
  $l = preg_replace('#\v#', '', $l);
  //On vérifie que $p est un float
  $p = floatval($p);

  //On traite $q qui peut être un entier simple ou un tableau d'entiers

  if (is_array($q)) {
    $QteArticle = array();
    $i = 0;
    foreach ($q as $contenu) {
      $QteArticle[$i++] = intval($contenu);
    }
  } else
    $q = intval($q);
}

if (!$erreur) {
  switch ($action) {
    case "ajout":
      ajouterArticle($l, $q, $p);
      break;

    case "suppression":
      supprimerArticle($l);
      break;

    case "refresh":
      for ($i = 0; $i < count($QteArticle); $i++) {
        modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i], round($QteArticle[$i]));
      }
      break;

    default:
      break;
  }
}

echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>CodePen - Shopping Cart Dropdown</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="../assets/panier/style.css">

</head>

<body class="bodyclass">
  <form method="post" action="" style="margin:auto;">


    <div class="container1">
      <div class="shopping-cart">
        <div class="shopping-cart-header">
          <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
          <div class="shopping-cart-total">
            <span class="lighter-text">Total:</span>
            <span class="main-color-text"><?= MontantGlobal() . ' €'; ?></span>
          </div>
        </div>
        <!--end shopping-cart-header -->

        <ul class="shopping-cart-items">
          <?php
          if (creationPanier()) {
            $nbArticles = count($_SESSION['panier']['libelleProduit']);
            if ($nbArticles <= 0)
              echo "<tr><td>Votre panier est vide </ td></tr>";
            else {
              for ($i = 0; $i < $nbArticles; $i++) {
          ?><li class="clearfix">
                  <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item2.jpg" alt="item1" />
                  <span class="item-name"><?= htmlspecialchars($_SESSION['panier']['libelleProduit'][$i]); ?></span>
                  <span class="item-price"><?= htmlspecialchars($_SESSION['panier']['prixProduit'][$i]) . ' €'; ?></span>
                  <span class="item-quantity">Quantité : <?= "<input type=\"text\" size=\"4\" name=\"q[]\" value=\"" . htmlspecialchars($_SESSION['panier']['qteProduit'][$i]) . "\"/>" ?></span>
                </li>

          <?php
              }
              echo "<tr><td colspan=\"4\">";
              echo "<input type=\"submit\" class=\"button\" value=\"Mettre à jour la quantité\"/>";
              echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
            }
          }
          ?>
        </ul>

        <a href="#" class="button">Checkout</a>
      </div>
      <!--end shopping-cart -->
    </div>
    <!--end container -->
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="../assets/panier/script.js"></script>

</body>

</html>