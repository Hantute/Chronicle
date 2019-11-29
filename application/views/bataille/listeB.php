<?php

//echo "<a><img src=".base_url('/assets/img/Archives.png')." id='imageArchive' name='image des archives' class='archives' ></img></a>"; 


        //echo "<center>TEST <br/></center>";
        //echo "<a href=".site_url('/Participe/ajoutP').">Archiver un rapport de combat </a><br/>";
$bataille=0; ?>
<div class='row'>
    <div class='col-12'>
        <button type='button' class='btn2 btn-info btn-lg' id='myBtnA' data-toggle='modal' data-target='#myModal2'>Archiver un rapport de combat</button> 
    </div>
</div>
<div class='row justify-content-around'>
    <?php    
    foreach ($archives as $rowa ) {
        //var_dump($archives);
        if($bataille!=$rowa->id_bataille){
            $bataille=$rowa->id_bataille;
    ?>
            <div class='col-12 text-danger justify-content-around'>
                <center><h3><a><?php echo $rowa->nom_bataille ;?></a></h3></center>
                <center><h4><a>Lieu de la bataille : <?php echo $rowa->lieu_bataille ;?></a></h4></center>
                <?php foreach ($systeme as $rowS){
                    if ($rowa->id_systeme_bataille == $rowS->id_systeme){?>
                        <center><h3><a><?php echo $rowS->nom_systeme ;?></a></h3></center>    
                    <?php }
                }?>
                
                <div class='row justify-content-around'>
                    <div class='col-6'><center><h4><a>date de début d'engagement : <?php echo $rowa->date_debut_bataille ?></a></h4></center></div>
                    <div class='col-6'><center><h4><a>date fin d'engagement : <?php echo $rowa->date_fin_bataille ;?></a></h4></center></div>
                </div>  
            </div>    
    <div class='col-1'></div>
    <div class='col-10'>
        <div class="row justify-content-around">
            <div class="col-12">
                <div class="row">
                    <div class="col-4"></div>
                    <div class='col-4 text-primary justify-content-around'><center><a id='flotte<?php echo $rowa->id_flotte;?>'><?php echo $rowa->nom_flotte; ?></a></center><br /></div>
                    <div class='col-4'></div>
                </div>
            </div>
        </div>    
            <div class='row'>
                <div class="col-2">
                    <center><a id='Groupe<?php echo $rowa->id_groupe;?>' class='groupe' value='<?php echo $rowa->id_groupe;?>'><?php echo $rowa->nom_groupe; ?></a></center> 
                </div>                    
                <div class='col-10' id='GROUPE<?php echo $rowa->id_groupe;?>'  >
                    <table border='5' bgcolor='#d0ff00' text-align='center' id='table<?php echo $rowa->id_groupe;?>' class='tableauGroupe'>
                        <tr border='10' bgcolor='#a4c2f4' width='1500'>
                            <th width='250'>Nom du vaisseau</th>
                            <th width='350'>Date début engagement dans la bataille</th>
                            <th width='350'>Date de désengagement du vaisseau</th>
                            <th width='200'>Consultation </th>
                        </tr>
                        <br/>
                 <?php  foreach ($archives as $row) 
                            {
                                if($row->id_bataille == $bataille)
                                    { ?>
                                        <tr border='10' bgcolor='#a4c2f4' width='1500' class='Choixvaisseau' value='<?php echo $row->id_participe ;?>'>
                                            <td width='250' text-align='center' id='<?php echo $row->id_vaisseau ?>'><?php echo $row->nom_vaisseau ;?></td>
                                            <td width='350' text-align='center'><?php echo $row->date_participation ;?></td>
                                            <td width='350' text-align='center'><?php echo $row->date_repli ; ?></td>
                                            <td width='200' text-align='center'>
                                                <!-- Trigger the modal with a button -->
                                                <button type='button' class='btn btn-info btn-lg' id='myBtn<?php echo $row->id_participe ?>' data-toggle='modal' data-target='#myModal'>
                                                    RAPPORT DE COMBAT</button></td>
                                                    <!-- Modal -->
                                        

                                        </tr>
                              <?php }
                            } ?>        
                    </table>
                </div>
            </div>
        </div>

    <div class='col-1'></div>
    
    <?php  }                         
    } ?>
</div>
<!-- Modal gérant les rapport de batailles spécifique à chaque bataille et vaisseau -->
<div  class='modal' id='myModal' data-keyboard='false' data-backdrop='false'>
    <div class='modal-dialog modal-lg' role="document">
            <!-- Modal content -->
        <div class='modal-content'  >
            <div class='modal-header'>    
                <button type='button' class='close' data-dismiss='modal'>&Ll;</button>
            </div>
            <div class='modal-body' id='intModal'>
                
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btb-default' data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>    
</div>
<!-- Modal gérant les ajout de nouveaux vaisseau -->
<div id='myModal2' class='modal' data-keyboard='false' data-backdrop='false' role='dialog'>
    <div class='modal-dialog modal-lg' role="document">
            <!-- Modal content -->
        <div class='modal-content'>
            <div class='modal-header'>
                <h4 class='modal-title'>Ajout d'un rapport de bataille</h4>
                <button type='button' class='close' data-dismiss='modal'>&Ll;</button>
            </div>
            <div class='modal-body' id='modal_ajout'>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btb-default' data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(".btn").click(function(){
            //$('.modal').modal({backdrop:'static'});
        });
    });
    $('.tableauGroupe').hide();
    $(".groupe").mouseenter(function()
    {
        $id= parseInt($(this).attr('value'));
        $IDV=0;
        for($i=0;$i<13;$i++)
        {
            if($i=== $id)
            {
                $('#table'+$id).show();
                $('#GROUPE'+$id).show(); 
                $('.Choixvaisseau').hover(function(){
                    $IDV=parseInt($(this).attr('value'));
                    console.log('id_participe');
                    console.log($IDV);
                    $('#myBtn'+$IDV);
                });
                $('#GROUPE'+$id).mouseleave(function()
                {
                    console.log("fermeture");
                    $('#GROUPE'+$id).hide();
                });
                
                $('.btn').click(function()
                {
                    console.log('lecture rapport');
                    $('#intModal').load("http://localhost/CI_FilRouge/index.php/Participe/RapportP/"+$IDV);
                });
                   
            }
        }
    });
    
    
    
    
    $('#myBtnA').click(function()
    {
        $('#modal_ajout').load("http://localhost/CI_FilRouge/index.php/Participe/ajoutP");
    });
    
 
</script>    
    
