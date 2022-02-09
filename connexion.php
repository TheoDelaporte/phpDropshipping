<?php
session_start();
if (isset($_POST['email']) && isset($_POST['password'])) {
    include 'confBd/config.php';
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $email = mysqli_real_escape_string($db, htmlspecialchars($_POST['email']));
    $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));

    if ($email !== "" && $password !== "") {
        $requete = "SELECT count(*) FROM user where 
              email = '" . $email . "' and motDePasse = '" . $password . "' ";
        $exec_requete = mysqli_query($db, $requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if ($count != 0) // nom d'utilisateur et mot de passe correctes
        {
            $_SESSION['email'] = $email;
            echo "<script>
            window.location.href='index.php';
            alert('Vous vous êtes bien connecté !');
            
            </script>";
        } else {
            // EMAIL OU MDP INCORRECT
            echo "<script>
            window.location.href='pages/login.php';
            alert('Email ou mot de passe incorrect !');
            
            </script>";
        }
    } else {
        // EMAIL OU MDP VIDE
        echo "<script>window.onload = function() {
        alert('Email ou mot de passe vide !');
        window.location.href='pages/login.php';
        }
        </script>";
    }
} else {
    header('Location: pages/login.php');
}
mysqli_close($db); // fermer la connexion
