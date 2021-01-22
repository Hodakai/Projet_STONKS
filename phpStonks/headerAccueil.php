<?php
function mon_header($tittle)
{

    ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://kit.fontawesome.com/edc8d5fc95.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
                integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
                crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
              integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
              crossorigin="anonymous">
        <link rel="stylesheet" href="../Style-General.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
                crossorigin="anonymous"></script>
        <link href="../cssStonks/header.css" type="text/css" rel="stylesheet">
        <title><?php echo $tittle ?></title>
    </head>
    <body>
    <header>
        <div class="barreNav">
            <a class="btnBGC" href="../MainStonks/Accueil.php"><i class="fas fa-coin fa-4x"></i></a>
            <h1>BGC</h1>
            <h3><?php echo $tittle ?></h3>
            <div id="toggle"><i class="fas fa-align-justify fa-2x"></i></div>
            <nav>
                <ul>
                    <li><a href="../MainStonks/VentesEnCoursUser.php">Ventes en cours</a></li>
                    <li><a href="../MainStonks/VenteAVenir.php">Ventes à venir</a></li>
                    <li><a href="../MainStonks/VentePassee.php">Ventes Passées</a></li>
                </ul>
            </nav>
            <script type="text/javascript">
                function activerDesactiver() {
                    document.querySelector("header nav ul").classList.toggle("actif");
                }

                document.querySelector("#toggle").addEventListener("click", activerDesactiver);
            </script>
        </div>
    </header>
    </body>
    </html>


    <?php
} ?>