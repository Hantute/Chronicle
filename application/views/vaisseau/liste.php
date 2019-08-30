
    			<?php

          foreach($Fliste as $rowf)
          {
            echo "<div id='flotte'.$rowf->id_flotte.>";
             echo "<tr border='10' bgcolor='#6ff7ae' width='150' text-aligne='center'>\n";
             echo "<td width='75' text-align='center'>".$rowf->nom_flotte."</td>\n";
             echo "<td width='75' text-align='center'>".$rowf->role_flotte."</td><br />\n";

              foreach($Gliste as $rowg)
              {
                if($rowf->id_flotte == $rowg->flotte_id_flotte)
                {
                   echo "<tr border='10' bgcolor='#6ff7ae' width='150' text-aligne='center'>\n";
                   echo "<td width='75' text-align='center'>".$rowg->nom_groupe."</td>\n";
                   echo "<td width='75' text-align='center'>".$rowg->mission."</td>\n";
                   echo "<td width='75' text-align='center'>".$rowg->base_groupe."</td><br />\n";

                   echo "<table border='5' bgcolor=#d0ff00 text-align='center'>
                         <TR border='10' bgcolor='#a4c2f4' width='250'>
                             <TH width='75'>Matricule du vaisseau</TH>
                             <TH width='75'>Type de vaisseau</TH>
                             <TH width='75'>Classe du vaisseau</TH>
                             <TH width='75'>nom du vaisseau</TH>
                             <TH width='75'>chantier de construction</TH>
                             <TH width='75'>date de mise en service</TH>
                             <!-- <TH width='75'>groupe de combat</TH> -->
                             <!-- <TH width='75'>flotte </TH> -->
                             <TH width='75'>modernisation</TH>
                  </TR>
                  <br>";
                			foreach ($Vliste as $rowv)
                			{
                        if($rowv->id_groupe == $rowg->id_groupe)
                        {
                			    echo "<tr border='10' bgcolor='#6ff7ae' width='150' text-aligne='center'>\n";
                			    echo "<td width='75' text-align='center'>".$rowv->id_vaisseau."</td>\n";
                			    echo "<td width='75' text-align='center'>".$rowv->nom_type."</td>\n";
                			    echo "<td width='75' text-align='center'>".$rowv->classe_vaisseau."</td>\n";
                			    echo "<td width='75' text-align='center'><a href=".site_url("Vaisseau/detail/").$rowv->id_vaisseau.">".$rowv->nom_vaisseau."</td>\n";
                			    echo "<td width='75' text-align='center'>".$rowv->chantier_de_construction."</td>\n";
                			    echo "<td width='75' text-align='center'>".$rowv->date_activation."</td>\n";
            							echo "<td width='75' text-align='center'><a href=".site_url("Vaisseau/modification/").$rowv->id_vaisseau.">Se mettre à quai à ".$rowv->chantier_de_construction."</td>\n";
                			    echo"</tr>";
                        }
                      }
                  echo "</table>";
                }
        			}
              echo "</div>";
          }
			?>
        	</div>
	</body>
</html>
