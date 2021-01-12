<?php
require_once "../phpStonks/footer.php";
mon_footer("Register");
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../cssStonks/login.css" type="text/css">
    <title>Register</title>
</head>
<header>
    <div class="Barre">
        <p>
            Register BGC
        </p>
    </div>
</header>
<body>
<h1>Veuillez enregistrer</h1>
<div class="panneauLogin">
    <form action="../actions_client/action_ajout_user.php" method="post">
        <div class="form-group">
            <label for="user"> Entrez votre Nom d'utilisateur</label>
            <input  alt="username" name="Username" id="user" type="text" required>
        </div>
        <br>
        <div class="form-group">
            <label for="pass"> Entrez votre Mot de passe</label>
            <input alt="motdepasse" name="MDP" id="pass" type="password" required>
        </div>
        <br><br>
        <input type="submit" class="btn btn-outline-primary">



    </form>
</div>
</body>
</html>
