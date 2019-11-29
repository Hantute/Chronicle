    <?php
    if($this->session->user && $this->session->user->id_autorisation == "1")
    { ?>
        <a href="<?php echo site_url("Produit/ajoutP"); ?>">ajouter un produit</a><br />
    <?php
    } ?>     
<div class='row '>
    <div class='col-md-8 offset-md-2 justify-content-around card-group'>
        <?php
        foreach ($liste as $row)
        {   
            $facture=0;
            $id=$row->id_produit;
            $prix=$row->prix_produit;
            $limite=$row->stock_produit;
            $qtot=0;
            $Prixtot=0;
        ?>
        <div class="flip-box">
            <div class='flip-box-inner click2' id='<?= $id; ?>'>
                <div class='flip-box-front'>
                    <div class='card' style='width: 18rem'>
                        <img src="<?php echo base_url('assets/img/vaisseauspatial.jpg');?>" class='card-img-top' alt='....'>
                        <h5 class='card-title' id='<?= $row->id_produit;?>'><?= $row->nom_produit ;?></h5>
                        <h6 class='card-text'><?= $Categorie->nom_categorie ;?></h6>    
                    </div>
                </div>
                <div class="flip-box-back">
                    <p class='card-text'><?= $row->Description ;?></p>
                    <div class='row justify-content-around'>
                        <div class='col-1'>
                            <select id="quantite<?php echo $id ; ?>" class='commande'>
                                <?php 
                                for($cpt=0; $cpt<=$limite;$cpt++)
                                { ?>
                                    <option value='<?php echo $cpt ;?>'><?php echo $cpt ;?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                        <h6 class='card-text justify-content-around' id="Prix<?php echo $id;?>" value='<?= $row->prix_produit;?>'><?= $row->prix_produit;?>€</h6>   
                    </div>
                    <br/>
                    <button>Commander</button>
                </div>
            </div>
        </div>
        <?php 
        } ?>
    </div> 
</div>         
       
        
<!--<input disabled id='maxid' value='<?php //echo $MaxId; ?>' hidden="TRUE">  -->
<script>
    $(".click2").click(function()
    {
        $idProd=$(this).attr('id');
        let $qte = $("#quantite"+$idProd).val();
        
        console.log($idProd);      
        console.log($qte);

        $('#AFFICHE').load("http://localhost/CI_FilRouge/index.php/Panier/ajout/"+$idProd +"/"+$qte);
    }); 
</script>    