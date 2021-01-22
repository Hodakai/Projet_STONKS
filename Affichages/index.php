<?php
require_once "header.php";
require_once "../phpStonks/footer.php";

MyHeader("Page d'accueil admin");
?>
<div class="TitreIndex">
    <h1>Page admin GBC</h1>
</div>
<div class="Consignes">
    <p>Vous pouvez ajouter une vente grâce à l'onglet "Création de ventes"</p>
    <p>Vous pouvez ajouter un lot à une vente en recherchant la vente désirée dans la barre de recherche ou bien en la
        trouvant dans l'onglet "Voir toutes les ventes" et en cliquant sur le bouton "Ajouter un lot".</p>
    <p>Pour ajouter une enchère dans un lot, même principe, vous trouvez la vente dans laquelle se situe le lot dans
        lequel
        vous voulez placer l'enchère puis vous cliquez sur le bouton "Ajouter une enchère".</p>

</div>

<?php
mon_footer("admin");
?>
