<head>
    <meta charset="UTF-8" />
    <title>Contact</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../assets/login/style.css" />
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../openStreetMap/style.css">
    <style>
        #maCarte {
            height: 60vh;
        }
    </style>
</head>
<div class="app">
    <?php
    include "../skeleton/header.php";
    include '../confBd/config.php';
    $Search = "select libelle, longitude, latitude from info where id=1";
    ?>

    <body class="align">
        <div class="contact" id="contact">
            <div class="container">
                <div class="col-md-offset-1 col-md-10">
                    <h2>Nous contacter<i class="fa fa-paper-plane-o"></i></h2>
                    <div id="map-canvas">
                        <?php
                        include '../openStreetMap/index.php';
                        ?>
                    </div>
                </div>
                <form method="post" action="contact.php" name="contactform" id="contactform">
                    <div class="col-md-offset-1 col-md-5">
                        <fieldset>
                            <input name="nom" type="text" id="name" size="30" placeholder="Nom">
                            <br>
                            <input name="email" type="text" id="email" size="30" placeholder="Email">
                            <br>
                            <input name="tel" type="text" id="phone" size="30" placeholder="Téléphone">
                            <br>
                            <input name="human" type="text" id="human" size="30" placeholder="Je ne suis pas un robot, Quel est le résultat de 2+2 ?">
                            <br>
                        </fieldset>
                    </div>
                    <div class="col-md-5">
                        <fieldset>
                            <textarea name="comments" cols="40" rows="20" id="comments" placeholder="Message"></textarea>
                        </fieldset>
                    </div>
                    <div class="col-md-offset-1 col-md-10">
                        <fieldset>
                            <button type="submit" class="btn btn-lg" id="submit" value="Submit">Envoyer un message</button>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>

    </body>

    </html>