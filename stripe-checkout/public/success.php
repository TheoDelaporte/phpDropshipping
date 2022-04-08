<?php

include '../../confBd/config.php';
$url = $_SERVER['SCRIPT_NAME'];
// COMMANDE
$idCommande = rand();
$email = $_GET['mail'];
// $prixTotal = $_GET['prix'];
$prixTotal = $_GET['prix'];
$date = date("d-m-Y");
$stmtCommande = $db_pdo->prepare("INSERT INTO commande (idCommande, mailClient, prixTotal, dateCommande)
VALUES ($idCommande, '$email', $prixTotal, '$date')");
$stmtCommande->execute();


// DETAILS COMMANDE
$idProduits = $_GET['id'];
$qteProduits = $_GET['q'];
$idProduit = explode(" ", $idProduits);
$count = count($idProduit) - 1;
$qte = $_GET['q'];
$qteProduit = explode(" ", $qteProduits);


if ($count == 1) {

  $stmtDetailsCommande = $db_pdo->prepare("INSERT INTO details_commande (idCommande, idProduit, qteProduit)
  VALUES ('$idCommande', '$idProduit[0]', '$qteProduit[0]')");
  $stmtDetailsCommande->execute();
} elseif ($count == 2) {
  $stmtDetailsCommande = $db_pdo->prepare("INSERT INTO details_commande (idCommande, idProduit, qteProduit)
  VALUES ('$idCommande', '$idProduit[0]', '$qteProduit[0]')");
  $stmtDetailsCommande->execute();

  $stmtDetailsCommande = $db_pdo->prepare("INSERT INTO details_commande (idCommande, idProduit, qteProduit)
  VALUES ('$idCommande', '$idProduit[1]', '$qteProduit[1]')");
  $stmtDetailsCommande->execute();
} elseif ($count == 3) {
  $stmtDetailsCommande = $db_pdo->prepare("INSERT INTO details_commande (idCommande, idProduit, qteProduit)
  VALUES ('$idCommande', '$idProdui[0]', '$qteProduit[0]')");
  $stmtDetailsCommande->execute();

  $stmtDetailsCommande = $db_pdo->prepare("INSERT INTO details_commande (idCommande, idProduit, qteProduit)
  VALUES ('$idCommande', '$idProduit[1]', '$qteProduit[1]')");
  $stmtDetailsCommande->execute();

  $stmtDetailsCommande = $db_pdo->prepare("INSERT INTO details_commande (idCommande, idProduit, qteProduit)
  VALUES ('$idCommande', '$idProduit[2]', '$qteProduit[2]')");
  $stmtDetailsCommande->execute();
} elseif ($count == 4) {
  $stmtDetailsCommande = $db_pdo->prepare("INSERT INTO details_commande (idCommande, idProduit, qteProduit)
  VALUES ('$idCommande', '$idProduit[0]', '$qteProduit[0]')");
  $stmtDetailsCommande->execute();

  $stmtDetailsCommande = $db_pdo->prepare("INSERT INTO details_commande (idCommande, idProduit, qteProduit)
  VALUES ('$idCommande', '$idProduit[1]', '$qteProduit[1]')");
  $stmtDetailsCommande->execute();

  $stmtDetailsCommande = $db_pdo->prepare("INSERT INTO details_commande (idCommande, idProduit, qteProduit)
  VALUES ('$idCommande', '$idProduit[2]', '$qteProduit[2]')");
  $stmtDetailsCommande->execute();

  $stmtDetailsCommande = $db_pdo->prepare("INSERT INTO details_commande (idCommande, idProduit, qteProduit)
  VALUES ('$idCommande', '$idProduit[3]', '$qteProduit[3]')");
  $stmtDetailsCommande->execute();
} elseif ($count == 5) {
  $stmtDetailsCommande = $db_pdo->prepare("INSERT INTO details_commande (idCommande, idProduit, qteProduit)
  VALUES ('$idCommande', '$idProduit[0]', '$qteProduit[0]')");
  $stmtDetailsCommande->execute();

  $stmtDetailsCommande = $db_pdo->prepare("INSERT INTO details_commande (idCommande, idProduit, qteProduit)
  VALUES ('$idCommande', '$idProduit[1]', '$qteProduit[1]')");
  $stmtDetailsCommande->execute();

  $stmtDetailsCommande = $db_pdo->prepare("INSERT INTO details_commande (idCommande, idProduit, qteProduit)
  VALUES ('$idCommande', '$idProduit[2]', '$qteProduit[2]')");
  $stmtDetailsCommande->execute();

  $stmtDetailsCommande = $db_pdo->prepare("INSERT INTO details_commande (idCommande, idProduit, qteProduit)
  VALUES ('$idCommande', '$idProduit[3]', '$qteProduit[3]')");
  $stmtDetailsCommande->execute();

  $stmtDetailsCommande = $db_pdo->prepare("INSERT INTO details_commande (idCommande, idProduit, qteProduit)
  VALUES ('$idCommande', '$idProduit[4]', '$qteProduit[4]')");
  $stmtDetailsCommande->execute();
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Thanks for your order!</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <section>
    <p>
      Paiement effectué ! </p>
    <a style="text-align: center" href="../../index.php?url=success">Retourner à l'accueil</a>.

  </section>
</body>

</html>