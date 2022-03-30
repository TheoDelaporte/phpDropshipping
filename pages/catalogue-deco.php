<?php
include '../confBd/config.php';

$stmt = $db_pdo->prepare("Select * from produits where categorie = 'decoration'");
$stmt->execute();
$datas = $stmt->fetchAll(PDO::FETCH_ASSOC);


include "../skeleton/backgroundvideo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/catalogue/style.css" />
    <link rel="stylesheet" href="../assets/login/style.css" />
</head>

<body>
    <div class="app">
        <?php
        include "../skeleton/header.php";
        ?>
        <div class="row no-gutters">
            <?php
            foreach ($datas as $produit) {
            ?>
                <div class="col-3">
                    <div class="app-card card md-2">
                        <span>
                            <?= $produit['libelleProduit'] ?>
                        </span>
                        <div class="app-card__subtext">
                            <center><img src="../img/<?= $produit['imageProduit'] ?>" style="text-align:center;" height="150" width="150"></center>
                        </div>
                        <div class="app-card-buttons">
                            <form action="../stripe-checkout/create-checkout-session.php" method="POST">
                                <button type="submit" class="content-button status-button" name="submit" value="<?= $produit['idProduit'] ?>">Commander</button>
                            </form>
                            <a>
                                <div class="menu"></div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>