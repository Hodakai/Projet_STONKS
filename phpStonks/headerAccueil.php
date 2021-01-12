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
        <link href="../cssStonks/header.css" type="text/css" rel="stylesheet">
        <title><?php echo $tittle ?></title>
    </head>
    <body>
    <header>
        <div class="barreNav">
            <a class="btnBGC" href="../MainStonks/Accueil.php"><i class="fas fa-coin fa-4x"></i></a>
            <h1>BGC</h1>
            <h3><?php echo $tittle?></h3>
            <div id="toggle"><i class="fas fa-align-justify fa-2x"></i></div>
            <nav>
                <ul>
                    <li><a href="../MainStonks/VentesEnCoursUser.php">Ventes en cours</a></li>
                    <li><a href="#">Ventes à venir</a></li>
                    <li><a href="#">Ventes terminées</a></li>
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