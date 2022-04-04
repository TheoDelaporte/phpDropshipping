<?php
/* Variables */
$bdd = "projetToufik";
$user = "homestead";
$pass = "secret";
$host = "localhost";

//Legacy Connect
$db = mysqli_connect($host, $user, $pass, $bdd) or die("Impossible de se connecter à la base de donn�es $bdd");
mysqli_select_db($db, $bdd);


//Use Pdo instead
try {
    $db_pdo = new PDO("mysql:host=$host;dbname=$bdd", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $db_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Echec : ' . $e->getMessage();
}

// Masquer les erreurs deprecated qui correspondent à un avertissement si l'on passe sur une version php plus récente.
// error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting(0);
