<?php 
$nb_art = count($_SESSION['panier']['idProd']);

/* On parcoure le tableau de session pour modifier l'article précis */
for($i=0; $i<$nb_art; $i++)
{
    if($_SESSION['panier']['idProd'][$i]==$Produit->id_produit)
    { 
?>
<div class='click3' id='<?= $Produit->id_produit ;?>'>
        <div class='modal-header'>
            <h4 class='modal-title'>Modifier la commande de la <?= $Categorie->nom_categorie ?> du <?= $Produit->nom_produit ;?></h4>
            <button type='button' class='close'  data-dismiss='modal'>&Ll;</button>
        </div>
        <div class='modal-body' id='PanierModif' value="<?= $Produit->id_produit ?>">
            <?php if($this->session->user->id_autorisation=='1')
            {?>
            <p>Référence produit :<?= $Produit->id_produit ;?> </p> 
            <?php }
            ?>
            <p> Description : <?= $Produit->Description ;?></p>
            <p>Stock disponible :<?= $Produit->stock_produit ;?>    Quantité désirée : <input type="number" id='qte' value="<?= $_SESSION['panier']['qte'][$i] ;?>" min='0' max='<?= $Produit->stock_produit ;?>'></p>
            <p> Prix Unitaire :<?= $Produit->prix_produit ;?>€</p>
            <p> Vaisseau correspondant : <?= $Produit->nom_vaisseau ;?></p>
        </div>
        <div class='modal-footer'>
            <button type='button' class='btn btb-default' data-dismiss='modal' id='valider'>valider</button>
            <button type='button' class='btn btb-default' data-dismiss='modal'>Close</button>
        </div>
</div>
<?php
    } 
}
?>
<script>
    $(".click3").click(function()
    {
        $idProd=$(this).attr('id');
        let $qte = $("#qte").val();
        
        console.log($idProd);      
        console.log($qte);

        $('#AFFICHE').load("http://localhost/CI_FilRouge/index.php/Panier/modif_qte/"+$idProd +"/"+$qte);
    }); 
</script>    
