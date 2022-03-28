<?php

include '../confBd/config.php';


//par défaut, on affiche le formulaire (quand il validera le formulaire sans erreur avec l'inscription validée, on l'affichera plus)
$AfficherFormulaire = 1;
//traitement du formulaire:
if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['postal'], $_POST['tel'], $_POST['mdp'])) { //l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
    if (empty($_POST['nom'])) { //le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
        echo "Le champ nom est vide.";
    } elseif (empty($_POST['prenom'])) {
        echo "Le champ prenom est vide.";
    } elseif (empty($_POST['email'])) {
        echo "Le champ email est vide.";
    } elseif (empty($_POST['adresse'])) {
        echo "Le champ adresse est vide.";
    } elseif (empty($_POST['postal'])) {
        echo "Le champ postal est vide.";
    } elseif (empty($_POST['tel'])) {
        echo "Le champ tel est vide.";
    } elseif (empty($_POST['mdp'])) { //le champ mot de passe est vide
        echo "Le champ Mot de passe est vide.";
    } else {
        $stmt = $db_pdo->prepare("Select * from user where email = :email");
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($datas as $row) {
            $email = $row['email'];
        }
        // on va tester si l'email est déjà existant
        if (!isset($email)) {
            //toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
            //Bien évidement il s'agit là d'un script simplifié au maximum, libre à vous de rajouter des conditions avant l'enregistrement comme la longueur minimum du mot de passe par exemple
            if (!mysqli_query($db, "INSERT INTO user SET nom='" . $_POST['nom'] . "', prenom='" . $_POST['prenom'] . "', email='" . $_POST['email'] . "', adresse='" . $_POST['adresse'] . "', postal='" . $_POST['postal'] . "', tel='" . $_POST['tel'] . "',motDePasse='" . md5($_POST['mdp']) . "'")) { //on crypte le mot de passe avec la fonction propre à PHP: md5()
                echo "Une erreur s'est produite: " . mysqli_error($db); //je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
            } else {
                echo "Vous êtes inscrit avec succès !";
                //on affiche plus le formulaire
                $AfficherFormulaire = 0;
            }
        } else {
            echo "L'email inscrit est déjà utilisé !";
        }
    }
}
if ($AfficherFormulaire == 1) {
?>
    <br />
    <form method="post" action="inscription.php">
        Nom : <input type="text" name="nom">
        <br />
        Prenom : <input type="text" name="prenom">
        <br />
        Email : <input type="varchar" name="email">
        <br />
        Adresse : <input type="varchar" name="adresse">
        <br />
        Code Postal : <input type="char" name="postal">
        <br />
        Téléphone : <input type="char" name="tel">
        <br />
        Mot de passe : <input type="varchar" name="mdp">
        <br />
        <input type="submit" value="S'inscrire">
    </form>
<?php
}
?>