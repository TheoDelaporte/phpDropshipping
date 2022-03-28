<?php

include 'confBd/config.php';

$stmt = $db_pdo->prepare("UPDATE user
SET email = :email, nom = :nom, prenom = :prenom, adresse = :adresse, postal = :cp, tel= :tel
WHERE id = :id");
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':nom', $_POST['nom']);
$stmt->bindParam(':prenom', $_POST['prenom']);
$stmt->bindParam(':adresse', $_POST['adresse']);
$stmt->bindParam(':cp', $_POST['CP']);
$stmt->bindParam(':tel', $_POST['tel']);
$stmt->bindParam(':id', $_POST['id']);
$stmt->execute();

echo "<script>
            window.location.href='index.php';
            alert('Votre compte a bien été modifié !');
            
            </script>";
