<?php

include 'confBd/config.php';

//traitement du formulaire:
if (isset($_POST['email'], $_POST['password'])) { //l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
    if (empty($_POST['email'])) { //le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
        echo "Le champ email est vide.";
    } elseif (empty($_POST['password'])) { //le champ mot de passe est vide
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
            if (!mysqli_query($db, "INSERT INTO user SET email='" . $_POST['email'] . "', motDePasse='" . md5($_POST['password']) . "'")) { //on crypte le mot de passe avec la fonction propre à PHP: md5()
                echo "Une erreur s'est produite: " . mysqli_error($db); //je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
            } else {
                $_SESSION['email'] = mysqli_real_escape_string($db, htmlspecialchars($_POST['email']));
                echo "<script>
                window.location.href='index.php';
                alert('Vous êtes inscrit avec succès !');
                </script>";
            }
        } else {
            // EMAIL OU MDP INCORRECT
            echo "<script>
            window.location.href='pages/sign-in.php';
            alert('L'email inscrit est déjà utilisé !');
            
            </script>";
        }
    }
}
