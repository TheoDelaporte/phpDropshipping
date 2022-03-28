<?php

include '../config.php';


// récupérer tous les utilisateurs
$sql = "SELECT * FROM produit";

try {
    $pdo = new PDO($titre, $description, $prix, $image);
    $stmt = $pdo->query($sql);

    if ($stmt === false) {
        die("Erreur");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
