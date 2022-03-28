<?php


$bdd = "dropshipping";
$user = "root";
$pass = "";
$host = "localhost";


//Use Pdo instead
try {
    $db_pdo = new PDO("mysql:host=$host;dbname=$bdd", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $db_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Echec : ' . $e->getMessage();
}
