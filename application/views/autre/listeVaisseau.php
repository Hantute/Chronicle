
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
        <table border='5' bgcolor=#d0ff00 text-align='center'>
            <tr border='10' bgcolor='#a4c2f4' width='250'>
                <th width='75'>Matricule du vaisseau</th>
                <th width='150'>Type de vaisseau</th>
                <th width='100'>Classe du vaisseau</th>
                <th width='100'>nom du vaisseau</th>
                <th width='100'>chantier de construction</th>
                <th width='100'>date de mise en service</th>
                <th width='150'>modernisation</th>
            </tr>
            <br>
            <?php foreach ($GroupeV as $rowv)
                       {?>
                           
                                    <tr border='10' bgcolor='#6ff7ae' width='150' text-aligne='center'>
                                        <td width='75' text-align='center'><?php echo $rowv->id_vaisseau ;?></td>
                                        <td width='150' text-align='center'><?php echo $rowv->nom_type ;?></td>
                                        <td width='100' text-align='center'><?php echo $rowv->classe_vaisseau;?></td>
                                        <td width='100' text-align='center'><?php echo "<a href=".site_url("Vaisseau/detail/").$rowv->id_vaisseau.">".$rowv->nom_vaisseau."</td>\n";?></td>
                                        <td width='100' text-align='center'><?php echo $rowv->chantier_de_construction ; ?></td>
                                        <td width='100' text-align='center'><?php echo $rowv->date_activation; ?></td>
                                        <td width='150' text-align='center'><?php echo "<a href=".site_url("Vaisseau/modification/").$rowv->id_vaisseau.">Se mettre à quai à ".$rowv->chantier_de_construction ;?></td>
                                    </tr>
                         <?php  
                        } ?>
        </table>

