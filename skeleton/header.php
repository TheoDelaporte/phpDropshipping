<div class="header">
    <div class="menu-circle"></div>
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
        session_start();
        if (isset($_SESSION['email'])) { ?>
            <div class="header-profile">
                <div style="color: black;"><?= $_SESSION['email']; ?></div>
                <a href="mon-compte.php">
                    <img class="profile-img" src="../img/moncompte2.png" alt="" />
                </a>
            </div>
        <?php } else { ?>
            <div class="header-profile">
                <a href="login.php">
                    <img class="profile-img" src="../img/moncompte.png" alt="" />
                </a>
            </div>
        <?php } ?>

    </div>
</div>