

<div class="row" id="corps">
    <div class="col-sm-6 col-lg-8" id="tableau">
            <p>
              <h2>Liste des batailles recencées entre les colonies et l'empire des Vespides</h2>
            </p>
    </div>
</div><br />


                                          
                    <a href=".site_url('Vaisseau/ajout/').">Ajouter un nouveau vaisseau à la flotte </a><br/>
                         <?php $compteur=1; ?> 

               
        <?php foreach($Fliste as $rowf)
        { ?>   
 <div class='row'>       
    <div class='col-1'></div> 
        <div class='col-10' id='flotte<?php echo $compteur;?>'>
            <center> 
            <?php $compteur ++; ?>
            <tr border='10' bgcolor='#6ff7ae' width='150' text-aligne='center'>
            Nom de la flotte : <?php echo $rowf->nom_flotte ; ?><br/>
            Role dans la Marine coloniale : <?php echo $rowf->role_flotte; ?><br /></center>
            
            
            <?php foreach($Gliste as $rowg)
            { ?>
                
                    
                 <?php if($rowf->id_flotte == $rowg->flotte_id_flotte)
                { ?>
                <div class='row'> 
                    <div class='col-3' id='groupe<?php echo $rowg->id_groupe ;?>' >    
                    <tr border='10' bgcolor='#6ff7ae' width='150' text-aligne='center'>
                    <?php   echo $rowg->nom_groupe."<br />\n";
                            echo $rowg->mission."<br />\n";
                            echo $rowg->base_groupe."<br />\n"; 
                    ?>
                    </div>
                        
                            <div class='col-9 justify-content-around'>
                                <table border='5' bgcolor=#d0ff00 text-align='center'>
                                    <TR border='10' bgcolor='#a4c2f4' width='250'>
                                        <TH width='75'>Matricule du vaisseau</TH>
                                        <TH width='150'>Type de vaisseau</TH>
                                        <TH width='100'>Classe du vaisseau</TH>
                                        <TH width='100'>nom du vaisseau</TH>
                                        <TH width='100'>chantier de construction</TH>
                                        <TH width='100'>date de mise en service</TH>
                                         <TH width='150'>modernisation</TH>
                                    </TR>
                                    <br>
                                            <?php foreach ($Vliste as $rowv)
                                            {
                                                if($rowv->id_groupe == $rowg->id_groupe)
                                                { ?>
                                                    <tr border='10' bgcolor='#6ff7ae' width='150' text-aligne='center'>
                                                    <td width='75' text-align='center'><?php echo $rowv->id_vaisseau ;?></td>
                                                    <td width='150' text-align='center'><?php echo $rowv->nom_type ;?></td>
                                                    <td width='100' text-align='center'><?php echo $rowv->classe_vaisseau;?></td>
                                                    <td width='100' text-align='center'><?php echo "<a href=".site_url("Vaisseau/detail/").$rowv->id_vaisseau.">".$rowv->nom_vaisseau."</td>\n";?>
                                                    <td width='100' text-align='center'><?php echo $rowv->chantier_de_construction ; ?></td>
                                                    <td width='100' text-align='center'><?php echo $rowv->date_activation; ?></td>
                                                    <td width='150' text-align='center'><?php echo "<a href=".site_url("Vaisseau/modification/").$rowv->id_vaisseau.">Se mettre à quai à ".$rowv->chantier_de_construction."</td>\n";?>
                                                    </tr>
                                            <?php  }
                                            }?>
                                </table>
                            </div>
                    </div>                
                <?php } 
            }
         ?>        
        
        </div>
    <div class="col-1"></div>
</div>
	<?php } 
        ?>		
	</body>
</html>
