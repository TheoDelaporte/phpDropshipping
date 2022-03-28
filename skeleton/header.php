<div class="header">
    <div class="menu-circle"></div>
    <div class="header-menu">
        <a class="menu-link is-active" href="#">Textile</a>
        <a class="menu-link notify" href="#">Déco</a>
        <a class="menu-link" href="#">Informatique</a>
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
                <?php echo $_SESSION['email']; ?>
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