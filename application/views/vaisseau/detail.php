
            <!--<div>

              <!-- A refaire de manière plus jolie et moins sous la forme d'un tableau -->
            	<!--<table border='5' bgcolor=#d0ff00 text-align='center'>
                	<TR border='10' bgcolor='#a4c2f4' width='250'>
                	<TH width='75'>Matricule</TH>
                	<TH width='75'>Type</TH>
                	<TH width='75'>Classe</TH>
                	<TH width='75'>Nom</TH>
                	<TH width='75'>Chantier de construction</TH>
                	<TH width='75'>Date de mise en service</TH>
                  <TH width='75'>Date de dernière modernisation</TH>
                	<TH width='300'>Armement</TH>
                	<TH width='300'>Protection </TH>
                	<TH width='300'>Générateur </TH>
                	<!-- <TH width='75'>Groupe de combat </TH> -->
                	<!--<TH width='75'>Flotte </TH>
                	<TH width='75'>Equipage </TH>
                	<TH width='75'>Escadrille</TH>
                	</TR>
                	<br>
                	<?php/*
                	    echo "<tr border='10' bgcolor='#6ff7ae' width='150' text-aligne='center'>\n";
                	    // echo "<td width='400' text-align='center'>".$detail->photo_vaisseau."</td>\n";
                	    echo "<td width='75' text-align='center'>".$detail->id_vaisseau."</td>\n";
                	    echo "<td width='75' text-align='center'>".$detail->nom_type."</td>\n";
                	    echo "<td width='75' text-align='center'>".$detail->classe_vaisseau."</td>\n";
                	    echo "<td width='75' text-align='center'>".$detail->nom_vaisseau."</td>\n";
                	    echo "<td width='75' text-align='center'>".$detail->chantier_de_construction."</td>\n";
                	    echo "<td width='75' text-align='center'>".$detail->date_activation."</td>\n";
                      echo "<td width='75' text-align='center'>".$detail->mise_a_jour."</td>\n";
                	    echo "<td width='300' text-align='center'>".$detail->armement."</td>\n";
                	    echo "<td width='300' text-align='center'>".$detail->protection."</td>\n";
                	    echo "<td width='300' text-align='center'>".$detail->generateur."</td>\n";
                	    // echo "<td width='75' text-align='center'><a href=".site_url("groupe/liste/").$detail->id_groupe.">".$detail->id_groupe."</td>\n";
                	    echo "<td width='75' text-align='center'><a href=".site_url("vaisseau/liste#groupe").$detail->id_groupe.">".$detail->id_groupe."</td>\n";
                	    echo "<td width='75' text-align='center'><a href".site_url("/personnel/liste/").$detail->id_vaisseau.">Liste des effectifs</td>\n";
                	    echo "<td width='75' text-align='center'><a href".site_url("/escadrille/liste/").$detail->id_vaisseau.">Groupe Aérien</td>\n";
                	    echo"</tr>";*/
                	?>
            	</table>
            </div> <br />
            <div>
                <table border='5' bgcolor=#d0ff00 text-align='center'>
                    <?php/* foreach ($ProduitVaisseau as $row){
                        echo "<tr border='10' bgcolor='#6ff7ae' width ='150' text-aligne='center'>\n";
                        echo "<td width='1000' text-align='center'><a href=".site_url("/produit/detail/").$row->id_produit.">".$row->categorie_produit. ' : ' .$row->nom_produit . "</td>\n</td>";
                        echo "</tr>";
                      } */?>
                </table>
            </div>-->
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
                                <h5> Armement: <?php echo $detail->protection ?></h5>
                            </div>
                            <div class="col-4">CENTRE 2
                                <h5> Protection : <?php echo $detail->protection ?></h5>
                            </div>
                            <div class="col-4">GAUCHE 2
                                <h5> Armement : <?php echo $detail->armement ?></h5>
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
                                        <td width='50' text-align='center'><?php //echo $rowr->Rapport ?></td>
                                        <td width='50' text-align='center'><?php echo $rowr->date_participation ?></td>
                                        <td width='50' text-align='center'><?php echo $rowr->date_repli ?></td>
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
