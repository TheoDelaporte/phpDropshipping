<div class="header">
    <a href='../index.php'>
        <img class="" src="../img/logo_clickshop.png" style="margin-right: 195px;" height="55" width="55" alt="">
    </a>
    <div class="header-menu">
        <a class="menu-link" href="catalogue-technologie.php">Technologie</a>
        <a class="menu-link notify" href="catalogue-deco.php">Déco</a>
        <a class="menu-link" href="catalogue-textile.php">Textile</a>
        <a class="menu-link notify" href="a-propos.php">Nous contacter</a>
    </div>
    <div class="search-bar">
        <input type="text" placeholder="Search" />
    </div>
    <div class="header-profile">
        <!-- tester si l'utilisateur est connecté -->
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['email'])) { ?>
            <div class="header-profile">
                <div style="color: white;"><?= $_SESSION['email']; ?></div>
                <a href="mon-compte.php?id=modifier">
                    <img class="profile-img" src="../img/moncompte2.png" alt="" />
                </a>
            </div>
        <?php } else { ?>
            <div class="header-profile">
                <a href="login.php">
                    <img class="profile-img" src="../img/moncompte.png" alt="" />
                </a>
            </div>
            <?php }
        $url = $_SERVER['SCRIPT_NAME'];
        if ($url !== '/pages/login.php') {
            if ($url !== '/pages/sign-in.php') {
                if ($url !== '/pages/mon-compte.php') {
            ?>
                    <ul class="navbar-right">
                        <li><a href="#" id="cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
        <?php
                }
            }
        }
        ?>
    </div>
</div>

<?php
if ($url !== '/pages/login.php') {
    if ($url !== '/pages/sign-in.php') {
        if ($url !== '/pages/mon-compte.php') {
            include '../pages/panier.php';
        }
    }
}
?>