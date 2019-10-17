
        <div class="row" id="corps">
          <div class="col-sm-6 col-lg-8" id="tableau">
            <p>
              <h2>Liste des batailles recencés entre les colonies et l'empire des Vespides</h2>
            </p>
          </div>
        </div><br />

        <div class="col-sm-12">
            
        <?php
        /*
        echo "<a href=".site_url('Participe/ajoutP').">Archiver un rapport de combat </a><br/>";
        
        foreach($bataille as $rowb)
        {
            foreach($flotte as $rowf)
            {
                foreach($groupe as $rowg)
                {
                    foreach($vaisseau as $rowv)
                    {
                        foreach($participe as $rowp)
                        {
                            if($rowb->id_bataille == $rowp->id_bataille && $rowp->id_vaisseau == $rowv->id_vaisseau && $rowg->id_groupe == $rowv->id_groupe && $rowf->id_flotte == $rowg->flotte_id_flotte)   
                            {  
                                echo "Lieu de la bataille : ".$rowb->lieu_bataille."\n<br />";
                                echo "date de début d'engagement : ".$rowb->date_debut_bataille ." - ".$rowb->date_fin_bataille."\n<br />";
                                echo "statut de la bataille : ". $rowb->statut_bataille."\n<br />";
                                echo "<div id='flotte'.$rowf->id_flotte.>";
                                echo "".$rowf->nom_flotte."<br />\n";
                                echo"</div>";
                                echo "<div id='groupe'>.$rowg->nom_groupe.<br />";
                                echo"</div>";
                                echo"<div id='table'>";
                                echo "<table border='5' bgcolor='#d0ff00' text-align='center'>";
                                    echo "<TR border='10' bgcolor='#a4c2f4' width='1500'>";
                                        echo "<TH width='250'>Nom du vaisseau</TH>";
                                        echo "<TH width='350'>Date début engagement dans la bataille</TH>";
                                        echo "<TH width='350'>Date de désengagement du vaisseau</TH>";
                                    echo "</TR>";
                                    echo "<br />";
                                    echo "<TR border='10' bgcolor='#a4c2f4' width='1500'>\n";
                                        echo "<TD width='250' text-align='center'>".$rowp->nom_vaisseau."</TD>\n";
                                        echo "<TD width='350' text-align='center'>".$rowp->date_participation."</TD>\n";
                                        echo "<TD width='350' text-align='center'>".$rowp->date_repli."</TD>\n";
                                    echo "</TR>";
                                echo "</table>";
                                echo"</div>";        
                            }
                        }    
                        
                    }
                    
                }
                    
            }
        }   
         *
         */             
        ?>                
        </div>
               <div class="col-sm-12">
            
               <br/>
               <br>
        <?php
        /*($bataille as $rowb)($flotte as $rowf)($groupe as $rowg)($vaisseau as $rowv)($participe as $rowp)
         * 
         */
        echo "<center>TEST <br/></center>";
        echo "<a href=".site_url('Participe/ajoutP').">Archiver un rapport de combat </a><br/>";

        ?>                
               </div>