

<div class="row" id="corps">
    <div class="col-sm-6 col-lg-8" id="tableau">
            <p>
              <h2>Liste des batailles recencées entre les colonies et l'empire des Vespides</h2>
            </p>
    </div>
</div><br />                        
    <a href="<?php echo site_url('Vaisseau/ajoutV');?>">Ajouter un nouveau vaisseau à la flotte </a><br/>
    <?php $compteur=0; ?> 
            
        <?php foreach($Fliste as $rowf)
        { ?> 
            <?php $compteur ++; ?>
             <div class='row' >       
                <div class='col-1'></div> 
                    <div class='FLOTTE col-10' id='flotte<?php echo $compteur;?>'  value='<?php echo $rowf->id_flotte;?>'>
                        <center> 
                        
                        Nom de la flotte : <?php echo $rowf->nom_flotte ; ?><br/>     
                        <?php foreach($Gliste as $rowg)
                        {                   
                            if($rowf->id_flotte == $rowg->id_flotte)
                            { ?>
                            <div class='GROUPE row'  id='GB<?php echo $rowg->id_groupe ;?>' value='<?php echo $rowg->id_groupe;?>'> 
                                <div class='Groupe col-3'  value="<?php echo $rowg->id_groupe ;?>" >    
                                <?php   echo $rowg->nom_groupe."<br />\n";
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
            $("#GB"+$id).mouseleave(function(){
                $("#GB"+$id).empty("#Groupe"+$id);
            })
            
            $('.tableauV').hover(function()
            {
                //console.log($id);
                if($id !==0){
                    //console.log("AU REVOIR");
                    $(".tableauV").mouseleave(function(){
                        $("#Groupe"+$id).empty("#Groupe"+$id);
                    });
                }
                
            });
            
</script>