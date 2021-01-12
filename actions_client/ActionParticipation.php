<?php
/*$topuser   qui aura    $id_user


$choix -> $ide_user

analyse du choix avec les boucles.

reperer si il devient topuser ou non ou egal

secu choixnomber*:





si choix > topuser alors $statusUser -> id_user = il gagne, vert
si choix = topuser alors $tatusUser -> id_user = orange egalité
si choix < topuser alors $StatusUser -> id_user = rouge, vous etes toujours derrierer un autre utilisateur, vous perdez pour l'instant.

actualisation de la page a chaque submit. */


?>

<?php
$TopUser = 100;
$Choix = filter_input(INPUT_POST,"ChoixUser");


 if ($Choix < $TopUser){
     echo "vous êtes toujours derriere le premier de cet enchère";
     //mettre #id_user en mode perdant (insigne rouge) de l'enchère -> #id
     //header("location:../MainStonks/ParticiperEnchere.php");
 }
 else if ($Choix > $TopUser){
     echo "vous êtes en tête";
     //mettre #id_user en mode gagnant (insigne vert) de l'enchere -> #id

     //header("location:../MainStonks/ParticiperEnchere.php");
 }
 else {
     echo "vous êtes a égalité avec le numero 1 de cet enchère";
     //header("location:../MainStonks/ParticiperEnchere.php");
     //mettre #id_user en mode égalité(insigne orange) de l'enchère -> #id
 }




?>