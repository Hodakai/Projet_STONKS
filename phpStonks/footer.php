<?php
function mon_footer($login)
{

?>

    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../cssStonks/footer.css" type="text/css">
        <title><?php echo $login ?></title>
    </head>
    <body>
    </body>
    <footer>
        <div class="footer">
            <span>Axel Baudoin / Thomas Gravy</span>
            <span>Projet BGC</span>
            <a href="../actions/deconnexion.php" class="btn btn-sm btn-primary">Déconnexion</a>
        </div>
    </footer>
    </html>
<?php
}
?>
