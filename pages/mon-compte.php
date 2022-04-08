<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Mon compte</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../assets/login/style.css" />
    <link rel="stylesheet" href="../assets/mon-compte/style.css" />
    <link rel="icon" type="image/png" sizes="16x16" href="../img/logo_clickshop.png">
</head>
<?php
include "../skeleton/backgroundvideo.php";
?>
<div class="app" style="width:100%;">
    <?php
    include "../skeleton/header.php";
    include "../confBd/config.php";
    $stmt = $db_pdo->prepare("Select * from user where email = :email");
    $stmt->bindParam(':email', $_SESSION['email']);
    $stmt->execute();
    $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($datas as $row) {
        $email = $row['email'];
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $adresse = $row['adresse'];
        $CP = $row['postal'];
        $tel = $row['tel'];
        $id = $row['id'];
    }
    ?>

    <body class="align">

        <div class="app-card-compte">
            <nav class="navbar navbar-expand-lg navbar-dark bg-grey">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="mon-compte.php?id=modifier">Modifier mon compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mon-compte.php?id=commande">Mes commandes</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <?php
            if ($_GET['id'] == 'modifier') {
            ?>
                <div class="gridcompte">
                    <form action=" ../majCompte.php" method="POST" class="form login">

                        <div class="container">
                            <div class="bloc1" style="margin-left:0px">
                                <div class="form__f">
                                    <label for="email"><svg class="icon">
                                            <use xlink:href="#icon-user"></use>
                                        </svg><span class="hidden">Adresse mail</span></label>
                                    <input autocomplete="email" id="email" type="text" name="email" class="form__input" placeholder="Email" value="<?php echo $email; ?>" required />
                                </div>
                                <div class="form__f">
                                    <label for="nom"><svg class="icon">
                                            <use xlink:href="#icon-lock"></use>
                                        </svg><span class="hidden">nom</span></label>
                                    <input id="nom" type="text" name="nom" class="form__input" placeholder="Nom" value="<?php echo $nom; ?>" required />
                                </div>
                                <div class="form__f">
                                    <label for="prenom"><svg class="icon">
                                            <use xlink:href="#icon-lock"></use>
                                        </svg><span class="hidden">prenom</span></label>
                                    <input id="prenom" type="text" name="prenom" class="form__input" placeholder="Prenom" value="<?php echo $prenom; ?>" required />
                                </div>
                            </div>

                            <div class="bloc2" style="margin-right:-300px">
                                <div class="form__f">
                                    <label for="adresse"><svg class="icon">
                                            <use xlink:href="#icon-lock"></use>
                                        </svg><span class="hidden">adresse</span></label>
                                    <input id="adresse" type="text" name="adresse" class="form__input" placeholder="Adresse" value="<?php echo $adresse; ?>" required />
                                </div>
                                <div class="form__f">
                                    <label for="CP"><svg class="icon">
                                            <use xlink:href="#icon-lock"></use>
                                        </svg><span class="hidden">Code postal</span></label>
                                    <input id="CP" type="text" name="CP" class="form__input" placeholder="Code postal" value="<?php echo $CP; ?>" required />
                                </div>
                                <div class="form__f">
                                    <label for="tel"><svg class="icon">
                                            <use xlink:href="#icon-lock"></use>
                                        </svg><span class="hidden">Numéro de téléphone</span></label>
                                    <input id="tel" type="text" name="tel" class="form__input" placeholder="Numéro de téléphone" value="<?php echo $tel; ?>" required />
                                </div>
                            </div>
                            <div class="form__field">
                                <input autocomplete="id" id="id" type="hidden" name="id" class="form__input" placeholder="id" value="<?php echo $id; ?>" required />
                            </div>

                        </div>
                        <div class="form__field">
                            <input type="submit" name="connexion" value="Modifer mes informations" />
                        </div>


                    </form>

                </div>
                <a class="menu-link notify" href="../deconnexion.php">
                    <div class="form__field">
                        <input class="btn btn-secondary" type="button" name="connexion" value="Me deconnecter" />
                    </div>
                </a>


            <?php
            } elseif ($_GET['id'] == 'commande') {
                $stmt = $db_pdo->prepare("Select * from commande where mailClient = :email");
                $stmt->bindParam(':email', $_SESSION['email']);
                $stmt->execute();
                $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
                <div class="">
                    <table class="table table-hover table-sm" style="color: white;">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Date commande</th>
                                <th scope="col">Total Commande</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($datas as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $row['idCommande'] ?></th>
                                    <td><?= $row['dateCommande'] ?></td>
                                    <td><?= $row['prixTotal'] . ' €' ?></td>
                                    <td><a class="btn btn-primary" href="mon-compte.php?idCommande=<?= $row['idCommande'] ?>">Détails</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } elseif ($_GET['idCommande'] == $_GET['idCommande']) {
                $stmtProduit = $db_pdo->prepare("Select * from produits where idProduit = :idProduit");
                $stmt = $db_pdo->prepare("Select * from details_commande where idCommande = :idCommande");
                $stmt->bindParam(':idCommande', $_GET['idCommande']);
                $stmt->execute();
                $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
                <div class="">
                    <table class="table table-hover table-sm" style="color: white;">
                        <thead>
                            <tr>
                                <th scope="col">Libellé</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">Prix unité</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($datas as $row) {
                                $stmtProduit->bindParam(':idProduit', $row['idProduit']);
                                $stmtProduit->execute();
                                $data = $stmtProduit->fetch(PDO::FETCH_ASSOC);
                            ?>
                                <tr>
                                    <th scope="row"><?= $data['libelleProduit'] ?></th>
                                    <td><?= $row['qteProduit'] ?></td>
                                    <td><?= $data['prixHT'] . ' €' ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>
        </div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
        <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
    </symbol>
    <symbol id="icon-lock" viewBox="0 0 1792 1792">
        <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
    </symbol>
    <symbol id="icon-user" viewBox="0 0 1792 1792">
        <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
    </symbol>
</svg>
</body>
</div>