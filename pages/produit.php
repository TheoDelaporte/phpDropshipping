<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Mon compte</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../assets/produit/style.css" />
    <link rel="stylesheet" href="../assets/login/style.css" />
</head>
<?php
include "../skeleton/backgroundvideo.php";
?>
<div class="app">
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
    <div class="container">
        <!--   https://www.jerecho.com/codepen/nike-product-page/ -->
        <div class="product-image">
            <!-- <img src="../img/<?= $produit['imageProduit'] ?>" alt="" class="product-logo"> -->
            <img src="../img/<?= $produit['imageProduit'] ?>" alt="" class="product-pic">
            <div class="dots">
                <a href="#!" class="active"><i>1</i></a>
                <a href="#!"><i>2</i></a>
                <a href="#!"><i>3</i></a>
                <a href="#!"><i>4</i></a>
            </div>
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
            <div class="controls">
                <div type="hidden" class="color">
                </div>
                <div class="size">
                    <h5>size</h5>
                    <a href="#!" class="option">(UK 8)</a>
                </div>
                <div class="qty">
                    <h5>qty</h5>
                    <a href="#!" class="option">(1)</a>
                </div>
            </div>
            <div class="footer">
                <button type="button">
                    <img src="http://co0kie.github.io/codepen/nike-product-page/cart.png" alt="">
                    <span>Ajouter au panier</span>
                </button>
                <a href="#!"><img src="http://co0kie.github.io/codepen/nike-product-page/share.png" alt=""></a>
            </div>
        </div>

    </div>

    <a href="https://www.youtube.com/watch?v=qGOxPVHfZuE" target="_blank" title="Watch me speed code this" style="position: fixed; bottom: 10px; right: 10px"><img src="http://co0kie.github.io/codepen/youtube.png" alt=""></a>