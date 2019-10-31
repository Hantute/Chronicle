
		<?php if($this->session->user && $this->session->user->id_autorisation == "1"){?>
		<a href="<?php echo site_url("Produit/ajoutP")?>">ajouter un produit</a><br />
                <?php } ?>


        	<table border='5' bgcolor=#d0ff00 text-align='center' id='tableau'>
                    <tr border='10' bgcolor='#a4c2f4' width='250'>
                        <th width='400'>Image </th>
                        <th width="75">Code </th>
                        <th width='150'>Nom </th>
                        <th width='100'>Prix à l'unité</th>
                        <th width='100'>Categorie </th>
                        <th witdh='100'>Stock</th>
                        <th witdh='100'>Commande</th>
                        <th width='100'>facture</th>
			<?php
                            if ($this->session->user->id_autorisation == "1")
                            {?>
                                <th width='100'>Modifier un produit</th>";
                                <th width='100'>Supprimer un produit</th>";
                            <?php 
                            }
                            ?>
                    </tr>
                    <br>
                    <?php
                    foreach ($liste as $row)
                    {
                        $facture=0;
                        $id=$row->id_produit;
                        $prix=$row->prix_produit;
                        $limite=$row->stock_produit;
                        $qtot=0;
                        $Prixtot=0;?>
                        <tr border='10' bgcolor='#6ff7ae' width='150' id='<?php echo $id ;?>' class='click' value='<?php echo $id ;?>' text-align='center'>
                            <td width='400' text-align='center' ><?php echo $row->photo_vaisseau ;?></td>
                            <td><input disabled width='75' class='col-8' text-align='center' id='id<?php echo $id ; ?>' value='<?php echo $id ; ?>' ></td>
                            <td width='100' text-align='center'><?php echo"<a href=".site_url("produit/detail/").$id.">".$row->nom_produit ;?></a></td>
                            <td><input disabled width='100' class='col-10' text-align='center' id='prix<?php echo $id ; ?>' value='<?php echo $row->prix_produit ;?>'> €</td>
                            <td width='100' text-align='center'><?php echo $Categorie->nom_categorie ;?></td>
                            <td width='100' text-align='center'><?php echo $limite ;?></td>
                            <td width='100' text-align='center'><select id="quantite<?php echo $id ; ?>" class='commande'>
                                <?php 
                                for($cpt=0; $cpt<=$limite;$cpt++)
                                { ?>
                                    <option value='<?php echo $cpt ;?>'><?php echo $cpt ;?></option>
                                <?php } ?>
                                    </select>        
                            </td>
                            <td class='facturation' ><input disabled class='col-8' width='100' text-align='center' id='facture<?php echo $id ; ?>' value='<?php echo $facture ;?>'> €</td> 
                                <?php if ($this->session->user->id_autorisation == "1")
				{ ?>
                                    <td width='100' text-align='center'><?php echo "<a href=".site_url("/produit/modification/").$row->id_produit.">";?>modification</a></td>
                                    <td width='100' text-align='center'><?php echo "<a href=".site_url("/produit/suppression/").$row->id_produit.">" ;?>suppression</a></td>
				<?php } ?>
                                    <td><button class='click2' id='<?= $id ;?>'>Ajout</button></td>
                        </tr>
			<?php 
                        $Max=$row->id_produit;
                        $MaxId = $Max+1;
                        }                        
			?>
                        
                        <tr border="10" bgcolor='#6ff7a' width='150' id='resultat' text-align='center'>
                            <TH width='400' hidden='TRUE'></TH>
                            <TH width="75" hidden='TRUE'></TH>
                            <TH width='150' hidden='TRUE'></TH>
                            <TH width='100' hidden='TRUE'></TH>
                            <TH width='100' hidden='TRUE'> </TH>
                        </tr>
        	</table>
            <div class='row'>
                <div class="col-6"></div>
                <div class="col-5">
                    <table>
                        <th width="100">TOTAL :</th>
                        <th width='100'><input disabled class='col-8'  id='QttTot' text-align='center' value='<?php echo $qtot ?>'></th>
                        <th width='100'><input disabled class='col-8' id='Prixtotal' text-align='center' value='<?php echo $Prixtot ?>'>€</th>
                    </table>
                </div>    
            </div>        
                    
            <input disabled id='maxid' value='<?php echo $MaxId; ?>' hidden="TRUE">  
            <div class='row'>
                <div id='PANIER'>
                    BONJOUR
                </div>
            </div>
<script>
    
    $(".click").click(function()
    {
       $id=$(this).attr('id');
    });
    
    $(".commande").change(function()
    {
        //console.log($id);
        let $prix= $("#prix"+$id).val();
        //console.log ($prix);
        let $quantite = $("#quantite"+$id).val();
        $facture= $prix*$quantite;
        //console.log($facture);
        $("#facture"+$id).appendTo("#facture"+$id).val($facture);
    });
    
    $("#tableau").click(function()
    {
        let $MaxId= $('#maxid').val();
        //console.log($MaxId);
        $i=1;
        $Prixtot = 0;
        $Qttot=0;
        for($i=1;$i<$MaxId;$i++)
        {
            $prixqtt = $("#facture"+$i).val();
            //console.log($prixqtt);
            $Prixtot= parseInt($Prixtot) + parseInt($prixqtt);
            //console.log($Prixtot);
            $qtt=$("#quantite"+$i).val();
            $Qttot = parseInt($Qttot) + parseInt($qtt);
        }
        //console.log($Prixtot);
        $("#Prixtotal").appendTo("#Prixtotal").val($Prixtot);
        $("#QttTot").appendTo("#QttTot").val($Qttot);
    }); 
        
    $(".click2").click(function()
    {
        //var DATA='btn-click';
        $idProd=$(this).attr('id');
        let $prixU = $("#prix"+$id).val();
        let $facture= $("#facture"+$id).val();
        let $qte = $("#quantite"+$id).val();
        
        console.log($idProd);
        console.log($prixU);        
        console.log($facture);        
        console.log($qte);
        
        var panier=[];
        
        // Envoyer les donnés id et qte en ajax avec un $_POST
        panier['$idProd']=$idProd;
        panier.prixU=$prixU;
        panier.facture=$facture;
        panier.qte=$qte;
        console.log(panier);
        console.log(panier.id);
                 
        $('#PANIER').load("http://localhost/CI_FilRouge/index.php/Panier/ajout/"+$idProd +"/"+$qte);
    });
</script>    