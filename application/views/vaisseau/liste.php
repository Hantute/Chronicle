

<div class="row" id="corps">
    <div class="col-sm-6 col-lg-8" id="tableau">
            <p>
              <h2>Liste des batailles recencées entre les colonies et l'empire des Vespides</h2>
            </p>
    </div>
</div><br />                        
    <a href="<?php echo site_url('Vaisseau/ajout');?>">Ajouter un nouveau vaisseau à la flotte </a><br/>
    <?php $compteur=0; ?> 
            
        <?php foreach($Fliste as $rowf)
        { ?> 
            <?php $compteur ++; ?>
             <div class='row' >       
                <div class='col-1'></div> 
                    <div class='FLOTTE col-10' id='flotte<?php echo $compteur;?>'  value='<?php echo $rowf->id_flotte;?>'>
                        <center> 
                        
                        Nom de la flotte : <?php echo $rowf->nom_flotte ; ?><br/>
                        Role dans la Marine coloniale : <?php echo $rowf->role_flotte; ?><br /></center>      
                        <?php foreach($Gliste as $rowg)
                        {                   
                            if($rowf->id_flotte == $rowg->flotte_id_flotte)
                            { ?>
                            <div class='GROUPE row'  value='<?php echo $rowf->id_flotte;?>'> 
                                <div class='Groupe col-3' id='groupe<?php echo $rowg->id_groupe ;?>' value="<?php echo $rowg->id_groupe ;?>" >    
                                <?php   echo $rowg->nom_groupe."<br />\n";
                                       echo $rowg->mission."<br />\n";
                                       echo $rowg->base_groupe."<br />\n"; 
                                ?>
                                </div >
                                <div class='tableauV col-9 justify-content-around' id='Groupe<?php echo $rowg->id_groupe ;?>'>
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
                    <script>

                    $id=0;
            $(".Groupe").click(function()
            {
                $id=parseInt($(this).attr('value'));
                console.log($id);
                console.log($(this));
                $("#Groupe"+$id).load("http://localhost/CI_FilRouge/index.php/Groupe_de_combat/GroupeVaisseau/"+$id);    
            });
            
            $('.tableauV').hover(function()
            {
                
                console.log($id);
                if($id !==0){
                console.log("AU REVOIR");
                }
                
            });
            
</script>