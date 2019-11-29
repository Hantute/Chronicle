
    <div class="row" id='panier'>
        <div class='col-12'>
            <div class='row'>
                <div class='col-2'>Référence</div>
                <div class='col-2'>Quantité</div>
                <div class='col-2'>Prix Unitaire</div>
                <div class='col-2'>Prix total du Produit</div>
                <div class='col-2'></div>
                <div class='col-2'></div>         
            </div>  
            <?php 
            $total=0;
            $nb_article=count($_SESSION['panier']['idProd']);

            for($cpt=0; $cpt<$nb_article; $cpt++)
            {
                $total= $total+$_SESSION['panier']['prixTot'][$cpt];
                ?>
            <div class='row ChoixProd' id="<?= $_SESSION['panier']['idProd'][$cpt] ?>"> 
                <div class='col-2'><?php echo ($_SESSION['panier']['idProd'][$cpt]); ?></div>
                <div class='col-2'><?php echo ($_SESSION['panier']['qte'][$cpt]); ?></div>
                <div class='col-2'><?php echo ($_SESSION['panier']['prixUnit'][$cpt]); ?>€</div>
                <div class='col-2'><?php echo ($_SESSION['panier']['prixTot'][$cpt]); ?>€</div>
                <div class='col-2'><button type='button' class='btn btn-info btn-lg BTNDetail' data-toggle='modal' data-target='#ModaPanier'>Modifier</button></div>
                <div class='col-2'><button type='button' class='btn btn-info btn-lg BTNSupp' value='<?= $cpt ?>' <a href="<?php echo site_url('Panier/supprim_article/').$_SESSION['panier']['idProd'][$cpt]; ?>">Retirer</a></div>
            </div>    
                <?php
            }
            ?>
            <br>
            <div class='row'>
                <div class='col-4'></div>
                <div class='col-2'>Prix total:</div>
                <div class='col-2'><?= $total;?>€</div>
                <div class='col-4'><button><a href='<?= site_url('Panier/vider_panier');?>'>Vider le panier</button></div>
            </div>
        </div>
    </div>
 
 <script>
     $('.ChoixProd').mouseover(function()
     {
         $id=$(this).attr('id');
         //console.log($id);
     
        $('.BTNDetail').click(function()
        {
            //$id=$(this).attr('id');
            //console.log($id);
            $('#PanierModif').load("http://localhost/CI_FilRouge/index.php/Panier/DetailPanier/"+$id);
        });  

        $('.BTNSupp').click(function()
        {
            //$id=$(this).attr('val');
            //console.log($id);
            $('#PanierModif').load("http://localhost/CI_FilRouge/index.php/Panier/supprim_article/"+$id);
        });
    });
     //->view('panier/Detail/'+$id);
 </script>    