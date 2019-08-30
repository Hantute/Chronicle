
							<?php if($this->session->user && $this->session->user->id_autorisation == "1"){?>
														<a href="<?php echo site_url("Produit/ajout")?>">ajouter un produit</a><br />
													<?php } ?>


        	<table border='5' bgcolor=#d0ff00 text-align='center' id='tableau'>
        		<TR border='10' bgcolor='#a4c2f4' width='250'>
		        	<TH width='400'>Image </TH>
		        	<TH width="75">Code </TH>
		        	<TH width='150'>Nom </TH>
		        	<TH width='100'>Prix </TH>
		        	<TH width='100'>Categorie </TH>
							<TH width='100'>Modifier un produit</TH>
							<TH width='100'>Supprimer un produit</TH>
						</TR>
			<br>
			<?php
			foreach ($liste as $row)
			{
			    echo "<tr border='10' bgcolor='#6ff7ae' width='150' text-aligne='center'>\n";
				    echo "<td width='400' text-align='center'>".$row->photo_vaisseau."</td>\n";
				    echo "<td width='75' text-align='center'>".$row->id_produit."</td>\n";
				    echo "<td width='150' text-align='center'><a href=".site_url("produit/detail/").$row->id_produit.">".$row->nom_produit."</td>\n";
				    echo "<td width='100' text-align='center'>".$row->prix_produit."</td>\n";
				    echo "<td width='100' text-align='center'>".$row->categorie_produit."</td>\n";
				    echo "<td width='100' text-align='center'><a href=".site_url("/produit/modification/").$row->id_produit.">modification</a></td>\n";
				    echo "<td width='100' text-align='center'><a href=".site_url("/produit/suppression/").$row->id_produit.">suppression</td>\n";
			    echo"</tr>";
			}

			?>

        	</table>
	</body>
</html>
