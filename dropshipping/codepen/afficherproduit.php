<?php

include '../config.php';
include '../index.html';

?>

<!DOCTYPE html>
<html>

<head>Afficher la table users</head>

<body>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
      <?php



      $stmt = $db_pdo->prepare('SELECT * FROM produit');
      $stmt->execute();
      $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($datas as $row) { ?>
        <tr>
          <td><?php echo ($row['titre']); ?></td>
          <td><?php echo ($row['description']); ?></td>
          <td><?php echo ($row['prix']); ?></td>

        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>

</html>