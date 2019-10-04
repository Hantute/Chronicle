            TEST PRESENTATION VAISSEAU
            
            <div class="row">
                <div id='nom_vaisseau' class='col-12 text-center text-primary'><center><h5>CSM 00<?php echo $detail->id_vaisseau ?></h5><h1><i><?php echo $detail->nom_vaisseau; ?></i></h1></center></div>
                <div class='row'>
                    <div class="col-2 text-center">Produits Dérivés
                    <table border='5' bgcolor=#d0ff00 text-align='center'>
                        <?php foreach ($ProduitVaisseau as $row){?>
                             <tr border='5' border-radius:5px bgcolor='white' width ='150' text-align='center'>
                            <td width='1000' text-align='left'><?php echo "<a href=".site_url("/produit/detail/").$row->id_produit.">".$row->categorie_produit. ' : ' .$row->nom_produit ;?></td></td>
                            </tr>
                         <?php } ?>
                    </table>
                    </div>
                    <div class="col-8  text-center" >CENTRE
                                <h3><a href='<?php echo site_url("/vaisseau/liste#flotte").$Flotte->id_flotte ;?>'><?php echo $Flotte->nom_flotte ;?></h3>
                                <h3><a href='<?php echo site_url("/vaisseau/liste#groupe").$detail->id_groupe ;?>'><?php echo $Groupe->nom_groupe ;?></a> </h3>

                        <div class="row">
                            <div class="col-4">DROITE 1
                                <h3><?php echo $detail->nom_type ?></h3>
                                classe :<h3><?php echo $detail->classe_vaisseau ?></h3>
                            </div>
                            <div class="col-4">CENTRE 1
                                <h3>Chantier Spatial de <?php echo $detail->chantier_de_construction ?></h3>
                            </div>
                            <div class="col-4">GAUCHE 1
                                <h5>Date de lancement :<?php echo $detail->date_activation ?></h5>
                                <h5>Dernière modernisation :<?php echo $detail->mise_a_jour ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">TOTAL</div>
                            <a><img src="<?php echo base_url('/assets/img/vaisseauspatial.jpg') ?>" id="imagevaisseau" name="image représentant le vaisseau selectionner"> </a>
                        </div>
                        <div class="row"> 
                            <div class="col-4">DROITE 2
                                <h4> Armement: </h4><h5><?php echo $detail->armement ;?></h5>
                            </div>
                            <div class="col-4">CENTRE 2
                                <h4> Protection : </h4><h5><?php echo $detail->protection ;?></h5>
                            </div>
                            <div class="col-4">GAUCHE 2
                                <h4> Générateur/Propulsion : </h4><h5><?php echo $detail->generateur ;?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-2" text-align="center">Archives Militaires
                        <div class='row'>
                            <?php foreach($rapport as $rowr)
                            { ?>
                                <table border='5' border-radius='5px' bgcolor='blue' width='150' text-align='center'>
                                    <tr>
                                        <th>rapport</th>
                                        <th>engagement</th>
                                        <th>repli</th>
                                    </tr>
                                    <tr>
                                        <td width='50' text-align='center'><?php //echo $rowr->Rapport ; ?></td>
                                        <td width='50' text-align='center'><?php echo $rowr->date_participation ; ?></td>
                                        <td width='50' text-align='center'><?php echo $rowr->date_repli ; ?></td>
                                    </tr>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>    
            </div>
  <!-- FERMETURE DIV CONTAINER -->              
    </div>
</body>
</html>
