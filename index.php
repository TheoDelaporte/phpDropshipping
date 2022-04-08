<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>ClickOnline</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./style.css">
  <link rel="icon" type="image/png" sizes="16x16" href="img/logo_clickshop.png">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="video-bg">
    <video width="320" height="240" autoplay loop muted>
      <source src="https://assets.codepen.io/3364143/7btrrd.mp4" type="video/mp4">

    </video>
  </div>
  <!--<div class="dark-light">
    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
     <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" /></svg>
   </div>-->
  <div class="app" style="width:100%;">
    <div class="header">
      <a href='index.php'>
        <img class="" src="img/logo_clickshop.png" style="margin-right: 195px;" height="55" width="55" alt="">
      </a>
      <div class="header-menu">
        <a class="menu-link is-active" href="pages/catalogue-technologie.php">Technologie</a>
        <a class="menu-link notify" href="pages/catalogue-deco.php">Déco</a>
        <a class="menu-link" href="pages/catalogue-voiture.php">Accessoires automobile</a>
        <a class="menu-link notify" href="pages/a-propos.php">Nous contacter</a>
      </div>
      <!-- <div class="search-bar">
        <input type="text" placeholder="Rechercher">
      </div> -->

      <!-- tester si l'utilisateur est connecté -->
      <?php
      session_start();
      if (isset($_SESSION['email'])) { ?>
        <div class="header-profile">
          <div style="color: white;">
            <?php echo $_SESSION['email']; ?>
          </div>
          <a href="pages/mon-compte.php?id=modifier">
            <img class="profile-img" src="img/moncompte2.png" alt="" />
          </a>
        </div>
      <?php } else { ?>
        <div class="header-profile">
          <a href="pages/login.php">
            <img class="profile-img" src="img/moncompte.png" alt="" />
          </a>
        </div>
        <?php }
      $url = $_SERVER['SCRIPT_NAME'];
      if ($url !== '/pages/login.php') {
        if ($url !== '/pages/sign-in.php') {
        ?>
          <ul class="navbar-right">
            <li><a href="#" id="cart"><i class="fa fa-shopping-cart"></i></a></li>
          </ul>
      <?php
        }
      }
      ?>

    </div>
    <?php
    if ($url !== '/pages/login.php') {
      if ($url !== '/pages/sign-in.php') {
        include 'pages/panier.php';
      }
    }
    ?>
    <div class="wrapper">

      <div class="main-container">

        <div class="content-wrapper">
          <div class="content-wrapper-header">
            <div class="content-wrapper-context">
            </div>
            <img class="content-wrapper-img" src=" " alt="">
          </div>

          <div class="content-section">
            <div class="content-section-title">Nos nouveautés</div>
            <div class="apps-card">
              <div class="app-card">
                <span>
                  iPhone 11
                </span>
                <div class="app-card__subtext">
                  <center><img src="img/iphone.png" style="text-align:center;" height="150" width="150"></center>
                </div>
                <div class="app-card-buttons">
                  <a href="stripe-checkout/create-checkout-session.php?submitDirect=<?= 'price_1KiIldC2HVmN5XNHaqbebZ8c' ?>&prix=<?= 800 ?>&email=<?= $_SESSION['email'] ?>" class="content-button status-button">Commander</a>
                  <form action="pages/produit.php" method="GET">
                    <button type="submit" style="background: transparent;border: none !important;font-size:0;" name="produit" value="<?= 'price_1KiIldC2HVmN5XNHaqbebZ8c' ?>">
                      <div class="menu"></div>
                    </button>
                  </form>
                </div>
              </div>
              <div class="app-card">
                <span>
                  Ruban Led 1m
                </span>
                <div class="app-card__subtext">
                  <center><img src="img/rubanled.png" style="text-align:center;" height="150" width="150"></center>
                </div>
                <div class="app-card-buttons">
                  <a href="stripe-checkout/create-checkout-session.php?submitDirect=<?= 'price_1KiImxC2HVmN5XNHX0jWjXbm' ?>&prix=<?= 7 ?>&email=<?= $_SESSION['email'] ?>" class="content-button status-button">Commander</a>
                  <form action="pages/produit.php" method="GET">
                    <button type="submit" style="background: transparent;border: none !important;font-size:0;" name="produit" value="<?= 'price_1KiImxC2HVmN5XNHX0jWjXbm' ?>">
                      <div class="menu"></div>
                    </button>
                  </form>
                </div>
              </div>
              <div class="app-card">
                <span>
                  Clavier logitech
                </span>
                <div class="app-card__subtext">
                  <center><img src="img/clavierlogitech.png" style="text-align:center;" height="150" width="150"></center>
                </div>
                <div class="app-card-buttons">
                  <a href="stripe-checkout/create-checkout-session.php?submitDirect=<?= 'price_1KixhgC2HVmN5XNHuump5ZZl' ?>&prix=<?= 50 ?>&email=<?= $_SESSION['email'] ?>" class="content-button status-button">Commander</a>
                  <form action="pages/produit.php" method="GET">
                    <button type="submit" style="background: transparent;border: none !important;font-size:0;" name="produit" value="<?= 'price_1KixhgC2HVmN5XNHuump5ZZl' ?>">
                      <div class="menu"></div>
                    </button>
                  </form>
                </div>
              </div>
              <div class="app-card">
                <span>
                  Enjoliveur 15" rouge
                </span>
                <div class="app-card__subtext">
                  <center><img src="img/enjoliveur1.png" style="text-align:center;" height="150" width="150"></center>
                </div>
                <div class="app-card-buttons">
                  <a href="stripe-checkout/create-checkout-session.php?submitDirect=<?= 'price_1KlvsmC2HVmN5XNH6SmNFk0A' ?>&prix=<?= 20 ?>&email=<?= $_SESSION['email'] ?>" class="content-button status-button">Commander</a>
                  <form action="pages/produit.php" method="GET">
                    <button type="submit" style="background: transparent;border: none !important;font-size:0;" name="produit" value="<?= 'price_1KlvsmC2HVmN5XNH6SmNFk0A' ?>">
                      <div class="menu"></div>
                    </button>
                  </form>
                </div>
              </div>
              <div class="app-card">
                <span>
                  Appareil photo Canon
                </span>
                <div class="app-card__subtext">
                  <center><img src="img/canon.png" style="text-align:center;" height="150" width="150"></center>
                </div>
                <div class="app-card-buttons">
                  <a href="stripe-checkout/create-checkout-session.php?submitDirect=<?= 'price_1KixhKC2HVmN5XNHIJ8t6J4l' ?>&prix=<?= 450 ?>&email=<?= $_SESSION['email'] ?>" class="content-button status-button">Commander</a>
                  <form action="pages/produit.php" method="GET">
                    <button type="submit" style="background: transparent;border: none !important;font-size:0;" name="produit" value="<?= 'price_1KixhKC2HVmN5XNHIJ8t6J4l' ?>">
                      <div class="menu"></div>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="overlay-app"></div>
  </div>
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="./script.js"></script>

</body>

</html>