<?php

include '../config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>CodePen - HTML/CSS responsive (product page)</title>
  <link href="https://fonts.googleapis.com/css?family=Oswald:400,600" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./style.css">

</head>

<body>

  <?php



  $stmt = $db_pdo->prepare('SELECT * FROM produit');
  $stmt->execute();
  $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($datas as $row) { ?>
  <?php } ?>


  <!-- partial:index.partial.html -->
  <div class="container">
    <!--   https://www.jerecho.com/codepen/nike-product-page/ -->
    <div class="product-image">
      <div class="iphone" style="width:600px; height:600px" ;>
        <?php echo '<img src="data:image/gif;base64,' . $datas . '" />' ?> </div>
      <div class="dots">
        <a href="#!" class="active"><i>1</i></a>
        <a href="#!"><i>2</i></a>
        <a href="#!"><i>3</i></a>
        <a href="#!"><i>4</i></a>
      </div>
    </div>

    <div class="product-details">
      <header>
        <h1 class="title"><?php echo ($row['titre']); ?></h1>
        <div class="price">
          <span class="current"><?php echo ($row['prix']); ?></span>
        </div>
        <div class="rate">
          <a href="#!" class="active">★</a>
          <a href="#!" class="active">★</a>
          <a href="#!" class="active">★</a>
          <a href="#!">★</a>
          <a href="#!">★</a>
        </div>
      </header>
      <article>
        <h5>Description</h5>
        <p><?php echo ($row['description']); ?></p>
      </article>
      <div class="controls">
        <div class="color">
          <h5>color</h5>
          <ul>
            <li><a href="#!" class="colors color-bdot1 active"></a></li>
            <li><a href="#!" class="colors color-bdot2"></a></li>
            <li><a href="#!" class="colors color-bdot3"></a></li>
            <li><a href="#!" class="colors color-bdot4"></a></li>
            <li><a href="#!" class="colors color-bdot5"></a></li>
          </ul>
        </div>
        <div class="size">
          <h5>size</h5>
          <a href="#!" class="option">(UK 8)</a>
        </div>
        <div class="qty">
          <h5>qty</h5>
          <a href="#!" class="option">(1)</a>
        </div>
      </div>
      <div class="footer">
        <button type="button">
          <img src="http://co0kie.github.io/codepen/nike-product-page/cart.png" alt="">
          <span>add to cart</span>
        </button>
        <a href="#!"><img src="http://co0kie.github.io/codepen/nike-product-page/share.png" alt=""></a>
      </div>
    </div>

  </div>

  <a href="https://www.youtube.com/watch?v=qGOxPVHfZuE" target="_blank" title="Watch me speed code this" style="position: fixed; bottom: 10px; right: 10px"><img src="http://co0kie.github.io/codepen/youtube.png" alt=""></a>
  <!-- partial -->
  <script src="./script.js"></script>

</body>

</html>