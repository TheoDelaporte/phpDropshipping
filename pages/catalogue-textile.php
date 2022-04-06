<?php
include '../confBd/config.php';
// On détermine sur quelle page on se trouve
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}

// On détermine le nombre total d'articles
$sql = 'SELECT COUNT(*) AS nb_articles FROM `produits`;';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute
$query->execute();

// On récupère le nombre d'articles
$result = $query->fetch();

$nbArticles = (int) $result['nb_articles'];

// On détermine le nombre d'articles par page
$parPage = 8;

// On calcule le nombre de pages total
$pages = ceil($nbArticles / $parPage);

// Calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;

$stmt = $db_pdo->prepare("Select * from produits where categorie='textile' LIMIT $premier, $parPage;");
$stmt->execute();
$datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
$i = 0;

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
                $i++;
            ?>
                <div class="col-3 mb-3">
                    <div class="app-card card md-2">
                        <span style="color: white;">
                            <?= $produit['libelleProduit'] ?>
                        </span>
                        <div class="app-card__subtext">
                            <center><img src="../img/<?= $produit['imageProduit'] ?>" style="text-align:center;" height="150" width="150"></center>
                        </div>
                        <div class="app-card-buttons">
                            <a href="../stripe-checkout/create-checkout-session.php?submitDirect=<?= $produit['idProduit'] ?>&prix=<?= $produit['prixHT'] ?>&email=<?= $_SESSION['email'] ?>" class="content-button status-button">Commander</a>
                            <form action="produit.php" method="GET">
                                <button type="submit" class="menu" name="produit" value="<?= $produit['idProduit'] ?>"></button>
                            </form>
                        </div>
                    </div>
                </div>

            <?php
            } ?>
        </div>
        <nav>
            <ul class="pagination justify-content-center">
                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                    <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                </li>
                <?php for ($page = 1; $page <= $pages; $page++) : ?>
                    <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                <?php endfor ?>
                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                    <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                </li>
            </ul>
        </nav>
    </div>
</body>