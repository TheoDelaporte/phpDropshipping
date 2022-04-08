<head>
    <meta charset="UTF-8" />
    <title>Contact</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../assets/login/style.css" />
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../openStreetMap/style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/logo_clickshop.png">
    <style>
        #maCarte {
            height: 60vh;
        }
    </style>
</head>
<div class="app" style="width:100%">
    <?php
    include "../skeleton/header.php";
    include '../confBd/config.php';
    $Search = "select libelle, longitude, latitude from info where id=1";
    ?>

    <body class="align">
        <div class="background" style="display:flex;">
            <div class="app-card-map">
                <div class="contact" id="contact">
                    <div class="container">

                        <div class="connecter">Contactez-nous</div>
                        <div id="map-canvas">
                            <?php
                            include '../openStreetMap/index.php';
                            ?>
                        </div>

                        <br>

                        <div class="text-map">
                            <div class="telephone">
                                <p class="p">03.22.49.51.78</p>
                            </div>
                            <div class="carre">
                                <div class="icontel">
                                    <svg class="icon">
                                        <use xlink:href="#icon-tel"></use>
                                    </svg>
                                </div>
                            </div>

                        </div>



                        <br>
                        <div class="text-map">
                            <div class="mail">
                                <p class="p">contact@clickonline.com</p>
                            </div>
                            <div class="carre">
                                <div class="iconmail">
                                    <svg class="icon">
                                        <use xlink:href="#icon-envelope"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" class="icons">
            <symbol id="icon-envelope" viewBox="0 0 20 20">
                <path d="M17.388,4.751H2.613c-0.213,0-0.389,0.175-0.389,0.389v9.72c0,0.216,0.175,0.389,0.389,0.389h14.775c0.214,0,0.389-0.173,0.389-0.389v-9.72C17.776,4.926,17.602,4.751,17.388,4.751 M16.448,5.53L10,11.984L3.552,5.53H16.448zM3.002,6.081l3.921,3.925l-3.921,3.925V6.081z M3.56,14.471l3.914-3.916l2.253,2.253c0.153,0.153,0.395,0.153,0.548,0l2.253-2.253l3.913,3.916H3.56z M16.999,13.931l-3.921-3.925l3.921-3.925V13.931z"></path>
            </symbol>
            <symbol id="icon-tel" viewBox="0 0 20 20">
                <path d="M13.372,1.781H6.628c-0.696,0-1.265,0.569-1.265,1.265v13.91c0,0.695,0.569,1.265,1.265,1.265h6.744c0.695,0,1.265-0.569,1.265-1.265V3.045C14.637,2.35,14.067,1.781,13.372,1.781 M13.794,16.955c0,0.228-0.194,0.421-0.422,0.421H6.628c-0.228,0-0.421-0.193-0.421-0.421v-0.843h7.587V16.955z M13.794,15.269H6.207V4.731h7.587V15.269z M13.794,3.888H6.207V3.045c0-0.228,0.194-0.421,0.421-0.421h6.744c0.228,0,0.422,0.194,0.422,0.421V3.888z"></path>
            </symbol>
        </svg>
    </body>

    </html>