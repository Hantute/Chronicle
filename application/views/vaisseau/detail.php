
            <div>

              <!-- A refaire de manière plus jolie et moins sous la forme d'un tableau -->
            	<table border='5' bgcolor=#d0ff00 text-align='center'>
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
                	<TH width='75'>Flotte </TH>
                	<TH width='75'>Equipage </TH>
                	<TH width='75'>Escadrille</TH>
                	</TR>
                	<br>
                	<?php
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
                	    echo"</tr>";
                	?>
            	</table>
            </div> <br />
            <div>
                <table border='5' bgcolor=#d0ff00 text-align='center'>
                    <?php foreach ($ProduitVaisseau as $row){
                        echo "<tr border='10' bgcolor='#6ff7ae' width ='150' text-aligne='center'>\n";
                        echo "<td width='1000' text-align='center'><a href=".site_url("/produit/detail/").$row->id_produit.">".$row->categorie_produit. ' : ' .$row->nom_produit . "</td>\n</td>";
                        echo "</tr>";
                      } ?>
                </table>
            </div>
          </div>
	</body>
</html>
