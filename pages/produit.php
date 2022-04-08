<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Produit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../assets/produit/style.css" />
    <link rel="stylesheet" href="../assets/login/style.css" />
</head>
<?php
include "../skeleton/backgroundvideo.php";
?>
<div class="app" style="width:100%; height:100%">
    <?php
    include "../skeleton/header.php";
    include "../confBd/config.php";
    if (isset($_GET['produit']))
        $idProduit = $_GET['produit'];

    $stmt = $db_pdo->prepare("Select * from produits where idProduit = :produit");
    $stmt->bindParam(':produit', $idProduit);
    $stmt->execute();
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);
    $calculProduit = ((int)$produit['prixHT'] * 1.4);
    // ((int)$item['quantity'] * (int)$product['price']);
    ?>
    <div class="container" style="padding: 2%">
        <!--   https://www.jerecho.com/codepen/nike-product-page/ -->
        <div class="product-image">
            <!-- <img src="../img/<?= $produit['imageProduit'] ?>" alt="" class="product-logo"> -->
            <img src="../img/<?= $produit['imageProduit'] ?>" alt="" class="product-pic">
        </div>

        <div class="product-details">
            <header>
                <h1 class="title"><?= $produit['libelleProduit'] ?></h1>
                <span class="colorCat"><?= $produit['categorie'] ?></span>
                <div class="price">
                    <span class="before"><?= $calculProduit . ' €' ?></span>
                    <span class="current"><?= $produit['prixHT'] . ' €' ?></span>
                </div>
            </header>
            <article>
                <h5>Description</h5>
                <p><?= $produit['descriptionProduit'] ?></p>
            </article>

            <div class="footer">
                <!-- <a style='' href="panier.php?action=ajout&amp;l=<?= $produit['libelleProduit'] ?>&amp;q=1&amp;p=<?= $produit['prixHT'] ?>">Ajouter au panier</a> -->
                <button type="button">
                    <a style='' href="panier.php?action=ajout&amp;l=<?= $produit['libelleProduit'] ?>&amp;q=1&amp;p=<?= $produit['prixHT'] ?>">Ajouter au panier</a>
                </button>
                <!-- <a href="#!"><img src="http://co0kie.github.io/codepen/nike-product-page/share.png" alt=""></a> -->
            </div>
        </div>

    </div>