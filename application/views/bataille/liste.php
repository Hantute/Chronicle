<?php

//echo "<a><img src=".base_url('/assets/img/Archives.png')." id='imageArchive' name='image des archives' class='archives' ></img></a>"; 


        echo "<center>TEST <br/></center>";
        echo "<a href=".site_url('/Participe/ajoutP').">Archiver un rapport de combat </a><br/>";
$bataille=0; ?>
<div class='row'>
    <div class='col-12'>
        <button type='button' class='btn btn-info btn-lg' id='myBtnA' data-toggle='modal' data-target='#Modal_Ajout'>Archiver un rapport de combat</button>                                                 
        <div class='modal fade' role='dialog'>
            <div class='modal-dialog modal-lg'>
                <!-- Modal content -->
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h4 class='modal-title'>Ajout d'un rapport de combat</h4>
                        <button type='button' class='close' data-dismiss='modal'>&Ll;</button>
                    </div>
                    <div class='modal-body' id='Modal_Ajout'>
                    <p> </p>
                    </div>
                    <div class='modal-footer'>
                    <button type='button' class='btn btb-default' data-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php    
    foreach ($archives as $rowa ) {
        if($bataille!=$rowa->id_bataille){
            $bataille=$rowa->id_bataille;
    ?>
            <div class='col-12 text-danger'>
                <center><h3><a>Lieu de la bataille : <?php echo $rowa->lieu_bataille ;?></a></h3></center>
                <div class='row'>
                    <div class='col-6'><center><h4><a>date de début d'engagement : <?php echo $rowa->date_debut_bataille ?></a></h4></center></div>
                    <div class='col-6'><center><h4><a>date fin d'engagement : <?php echo $rowa->date_fin_bataille ;?></a></h4></center></div>
                </div>  
                    <h4><a>statut de la bataille : <?php echo $rowa->statut_bataille ;?></a></h4>
            </div>
    <div class='col-12'>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-4"></div>
                    <div class='col-8 text-primary'><a id='flotte<?php echo $rowa->id_flotte;?>'><?php echo $rowa->nom_flotte; ?></a><br /></div>
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
                                        <tr border='10' bgcolor='#a4c2f4' width='1500' class='Choixvaisseau' value='<?php echo $row->id_vaisseau ;?>'>
                                            <td width='250' text-align='center' id='<?php echo $row->id_vaisseau ?>'><?php echo $row->nom_vaisseau ;?></td>
                                            <td width='350' text-align='center'><?php echo $row->date_participation ;?></td>
                                            <td width='350' text-align='center'><?php echo $row->date_repli ; ?></td>
                                            <td width='200' text-align='center'>
                                                <!-- Trigger the modal with a button -->
                                                <button type='button' class='btn btn-info btn-lg' id='myBtn' data-toggle='modal' data-target='#myModal<?php echo $row->id_vaisseau;?>'>
                                                    RAPPORT DE COMBAT</button></td>
                                                    <!-- Modal -->
                                        <div id='myModal<?php echo $row->id_vaisseau ?>' class='modal fade' role='dialog'>
                                            <div class='modal-dialog modal-lg'>
                                                <!-- Modal content -->
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h4 class='modal-title'>Rapport de combat du <?php echo $row->nom_vaisseau ;?></h4>
                                                        <button type='button' class='close' data-dismiss='modal'>&Ll;</button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <p> <?php echo $row->Rapport; ?></p>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btb-default' data-dismiss='modal'>Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                       </div>


                                        </tr>
                              <?php }
                            } ?>        
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <?php  }                         
    } ?>
</div>
<script>
   $(document).ready(function(){
        $("#myBtn").click(function(){
            $('#myModal').modal({backdrop:'static'});
        });
    });
    
    $('.tableauGroupe').hide();
    $(".groupe").mouseenter(function()
    {
        $id= parseInt($(this).attr('value'));
        for($i=0;$i<13;$i++)
        {
            if($i=== $id){
                console.log('bonjour');
                console.log($id);
                $('#table'+$id).show();
                console.log($('#Groupe'+$id));
                //$('.Choixvaisseau').hover(function(){
                  //  $IDV=parseInt($(this).attr('value'));
                  //  console.log("Vaisseau"+$IDV);
                //})
                //$('#GROUPE'+$id).mouseleave(function()
                //{
                  //$('.tableauGroupe').hide();;  
                //});
            }
        }
    });
    
    $('#myBtnA').click(function()
    {
        $('#Modal_Ajout').load("http://localhost/CI_FilRouge/index.php/Participe/ajoutP");
    })
    
 
</script>    
    
