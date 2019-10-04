    <h1 class="text-center text-light"> Récits romancés des différentes batailles entre les Colonies et l'empire des Vespides</h1>
    <div class="row">
        <div class="col-1"></div>
            <div class="recit col-10" id="Bataille<?php //echo $rowB->id_bataille ?>">
                <?php foreach($RecitB as $rowB)
                {?>
                    <div class='row'>
                        <div class='col-3'></div>
                        <div class='col-6'><center><h2><?php echo $rowB->nom_bataille ;?></h2><br/><h5><?php echo $rowB->lieu_bataille ;?></h5><br/></center></div>
                        <div class='col-3'></div>
                    </div>
                    <div class='row'>
                        <div class='col-2'></div>
                        <div class='col-8'><center><?php echo $rowB->date_debut_bataille;?> AU <?php echo $rowB->date_fin_bataille; ?></center></div>
                        <div class='col-2'></div>
                    </div>
                    <div class='row'>
                        <div class='col-2'></div>
                        <div class='col-8 text-light' ><center><?php echo $rowB->recit_bataille."<br/>"; ?></center></div>
                        <div class='col-2'></div>
                    </div>    
                <?php } ?>                      
            </div>
        <div class="col-1"></div>              
    </div>