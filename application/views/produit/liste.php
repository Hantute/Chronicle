
							<?php if($this->session->user && $this->session->user->id_autorisation == "1"){?>
														<a href="<?php echo site_url("Produit/ajout")?>">ajouter un produit</a><br />
													<?php } ?>


        	<table border='5' bgcolor=#d0ff00 text-align='center' id='tableau'>
        		<TR border='10' bgcolor='#a4c2f4' width='250'>
		        	<TH width='400'>Image </TH>
		        	<TH width="75">Code </TH>
		        	<TH width='150'>Nom </TH>
		        	<TH width='100'>Prix à l'unité</TH>
		        	<TH width='100'>Categorie </TH>
                                <TH witdh='100'>Stock</TH>
                                <TH witdh='100'>Commande</TH>
                                <TH width='100'>facture</TH>
							<?php
							if ($this->session->user->id_autorisation == "1")
							{
								echo"<TH width='100'>Modifier un produit</TH>";
								echo"<TH width='100'>Supprimer un produit</TH>";
							}
							?>
						</TR>
			<br>
			<?php
			foreach ($liste as $row)
			{
                            $limite=$row->stock_produit;?>
			    <tr border='10' bgcolor='#6ff7ae' width='150' text-aligne='center'>
				<td width='400' text-align='center'><?php echo $row->photo_vaisseau ;?>"</td>
				<td width='75' text-align='center'><?php echo $row->id_produit ; ?>"</td>\n";
				<td width='150' text-align='center'><?php echo"<a href=".site_url("produit/detail/").$row->id_produit.">".$row->nom_produit ;?></td>
				<td width='100' text-align='center' id='prix' value='<?php echo $row->prix_produit ;?>'><?php echo $row->prix_produit ;?>€</td>
				<td width='100' text-align='center'><?php echo $row->categorie_produit ;?></td>
                                <td width='100' text-align='center'><?php echo $limite ;?></td>
                                <td width='100' text-align='center'><select id='commande'>
                                        <?php for($cpt=0; $cpt<=$limite;$cpt++){ ?>
                                            <option value='<?php echo $cpt ;?>'><?php echo $cpt ;?></option>
                                         <?php } ?>
                                        </select>        
                                </td>
                                <td width='100' text-align='center' id='facture' value='<?php echo $facture=0 ;?>'>€</td> 
					<?php if ($this->session->user->id_autorisation == "1")
						{ ?>
                                <td width='100' text-align='center'><?php echo "<a href=".site_url("/produit/modification/").$row->id_produit.">";?>modification</a></td>
				<td width='100' text-align='center'><?php echo "<a href=".site_url("/produit/suppression/").$row->id_produit.">" ;?>suppression</td>
						<?php } ?>
					</tr>
			<?php }

			?>

        	</table>
    <script>
            $("#commande").change(function()
            {
                let $commande = $("#commande").val();
                let $prix = $("#prix").val();
                console.log($commande);
                console.log($prix);
                
                $facture=$commande * $prix;
                console.log($facture);
                $("#facture").appendTo("#facture").val($facture);
            });
    </script>