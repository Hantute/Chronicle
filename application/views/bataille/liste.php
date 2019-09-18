<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        echo "<center>TEST <br/></center>";
        echo "<a href=".site_url('Participe/ajoutP').">Archiver un rapport de combat </a><br/>";
$bataille=0;
foreach ($archives as $rowa ) {
    if($bataille!=$rowa->id_bataille){
                                echo "Lieu de la bataille : ".$rowa->lieu_bataille."\n<br />";
                                echo "date de début d'engagement : ".$rowa->date_debut_bataille ." -  date fin d'engagement : ".$rowa->date_fin_bataille."\n<br />";
                                echo "statut de la bataille : ". $rowa->statut_bataille."\n<br />";
                                echo "<div id='flotte'.$rowa->id_flotte.>";
                                echo "".$rowa->nom_flotte."<br />\n";
                                echo"</div>";
                                $bataille=$rowa->id_bataille;
                                echo "<div id='groupe'>.$rowa->nom_groupe.<br />";
                                echo"</div>";
                                echo"<div id='table'>";
                                echo "<table border='5' bgcolor='#d0ff00' text-align='center'>";
                                    echo "<TR border='10' bgcolor='#a4c2f4' width='1500'>";
                                        echo "<TH width='250'>Nom du vaisseau</TH>";
                                        echo "<TH width='350'>Date début engagement dans la bataille</TH>";
                                        echo "<TH width='350'>Date de désengagement du vaisseau</TH>";
                                    echo "</TR>";
                                    echo "<br />";
                                    foreach ($archives as $row) 
                                    {
                                            if($row->id_bataille == $bataille)
                                            {
                                                echo "<TR border='10' bgcolor='#a4c2f4' width='1500'>\n";
                                                    echo "<TD width='250' text-align='center'>".$row->nom_vaisseau."</TD>\n";
                                                    echo "<TD width='350' text-align='center'>".$row->date_participation."</TD>\n";
                                                    echo "<TD width='350' text-align='center'>".$row->date_repli."</TD>\n";
                                                echo "</TR>";
                                            }
                                    }        
                                echo "</table>";
                                echo"</div>"; 
    }                         
}

