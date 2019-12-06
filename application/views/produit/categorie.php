
<div class="row" id="corps">
  <div class="col-md-6 offset-md-3 justify-content-around" id="tableau">
    <p>
      <h2>Liste des <?= $Subcat->nom_categorie ;?> </h2>
    </p>
  </div>
</div><br />
<div class='row' id='tableau'>
    <div class='col-md-8 offset-md-2 justify-content-around card-group'>
    <?php
    foreach ($categorie as $row)
    { ?>
        <div class="card mb-3 CardProduit" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                     <img src="<?php echo base_url('assets/img/vaisseauspatial.jpg');?>" class='card-img-top' alt='....'>
                </div>
                <div class="col-md-8" >
                    <div class="card-body click3" id='<?= $row->id_produit ?>'>
                        <h5 class="card-title DetailProduit"><?= $row->nom_produit ;?></h5>
                        <p class="card-text"><?= $Subcat->nom_categorie ;?></p>
                        <p class="card-text"><?= $row->Description ;?></p>
                        <div class='row'>
                            <div class='col-5'><p class="card-text">stock : <?= $row->stock_produit ;?></p></div>
                            <div class='col-7'>quantité :
                                <select id="quantite<?php echo $row->id_produit ; ?>" class='commande'>
                                    <?php 
                                    for($cpt=0; $cpt<=$row->stock_produit;$cpt++)
                                    { ?>
                                        <option value='<?php echo $cpt ;?>'> <?php echo $cpt ;?></option>
                                    <?php
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <p class="card-text" id="Prix<?= $row->id_produit;?>" value='<?= $row->prix_produit;?>'><?= $row->prix_produit ;?>€</p>
                        <button>Commander</button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } ?>
    </div>
</div>
<script>
    $(".click3").click(function()
    {
        $idProd=$(this).attr('id');
        let $qte = $("#quantite"+$idProd).val();
        
        console.log($idProd);       
        console.log($qte);

        $('#AFFICHE').load("http://localhost/CI_FilRouge/index.php/Panier/ajout/"+$idProd +"/"+$qte);
    });
</script>