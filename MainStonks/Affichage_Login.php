<?php
require_once "../phpStonks/footer.php";
mon_footer("Login");
session_start();

$token = rand(0, 1000000);
$_SESSION["token"] = $token;

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../cssStonks/login.css" type="text/css">
    <title>Login</title>
</head>
<header>
    <div class="Barre">
        <p>
            Login BGC
        </p>
    </div>
</header>
<body>
    <h1>Veuillez vous connecter</h1>
<div class="panneauLogin">

    <form action="../actions/login.php" method="post">
        <div class="form-group">
            <input type="hidden" value="<?php echo $token ?>" name="token">
        <label for="user">Entrez votre Nom d'utilisateur</label>
    <input  alt="Username" name="Username" id="user" type="text" required>
        </div>
        <br>
        <div class="form-group">
        <label for="pass"> Entrez votre Mot de passe</label>
    <input alt="Mdp" name="Mdp" id="pass" type="password" required>
        </div>
        <br><br>
        <input type="submit" class="btn btn-outline-primary">

        <a href="../MainStonks/Register.php" class="btn btn-sm btn-primary">Creer un compte</a>

    </form>
</div>
</body>
</html>
