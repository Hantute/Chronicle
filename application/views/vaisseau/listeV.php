

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
             <div class='row tableau'>       
                <div class='col-1'></div>
                    <div class='FLOTTE col-10 justify-content-around ' id='flotte<?php echo $compteur;?>'  value='<?php echo $rowf->id_flotte;?>'>
                        <center><?= $rowf->id_flotte?> flotte de combat coloniale: <br/> <?php echo $rowf->nom_flotte ; ?><br/></center>     
                        <?php foreach($Gliste as $rowg)
                        {                   
                            if($rowf->id_flotte == $rowg->id_flotte)
                            { ?>
                            <div class='GROUPE row justify-content-around tableau'  id='GB<?php echo $rowg->id_groupe ;?>' value='<?php echo $rowg->id_groupe;?>'> 
                                <div class='Groupe col-3 justify-content-around '  value="<?php echo $rowg->id_groupe ;?>" >    
                            <?php   echo $rowg->nom_groupe."<br />\n";
                                    echo $rowg->base_groupe."<br />\n"; 
                            ?>
                                </div>
                                <div class='tableauV col-9 justify-content-around' id='Groupe<?php echo $rowg->id_groupe ;?>'>
                                </div><br>    
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