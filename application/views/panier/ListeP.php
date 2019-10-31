<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
 integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <script
src="https://code.jquery.com/jquery-3.4.1.min.js" 
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous">
 </script>

    <div class="row" id='panier'>
        <div class='col-12'>
            <div class='row'>
                <div class='col-2'></div>
                <div class='col-2'>Référence</div>
                <div class='col-2'>Quantité</div>
                <div class='col-2'>Prix Unitaire</div>
                <div class='col-2'>Prix total du Produit</div>
                <div class='col-2'></div>
            </div>  
            <?php 
            //var_dump($ajoute);
            //var_dump($Achat);
            $total=0;
            $nb_article=count($_SESSION['panier']['idProd']);
            //var_dump($nb_article);
            for($cpt=0; $cpt<$nb_article; $cpt++)
            {
                $total= $total+$_SESSION['panier']['prixTot'][$cpt];
                ?>
            <div class='row'>
                <div class='col-2'><?php //if(!isset($ajoute)){ echo ($ajoute);}?> </div>
                <div class='col-2'><?php echo ($_SESSION['panier']['idProd'][$cpt]); ?></div>
                <div class='col-2'><?php echo ($_SESSION['panier']['qte'][$cpt]); ?></div>
                <div class='col-2'><?php echo ($_SESSION['panier']['prixUnit'][$cpt]); ?>€</div>
                <div class='col-2'><?php echo ($_SESSION['panier']['prixTot'][$cpt]); ?>€</div>
                <div class='col-2'></div>
            </div>    
                <?php
            }
            //var_dump($total);
            ?>
            <br>
            <div class='row'>
                <div class='col-6'></div>
                <div class='col-2'>Prix total:</div>
                <div class='col-2'><?= $total;?>€</div>
            </div>
        </div>
    </div>    
