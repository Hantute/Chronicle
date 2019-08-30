

<table border='15' bgcolor=#d0ff00 text-aligne='center'>
	<tr border="10" bgcolor='#a4c2f4' width='150'>
	<th width='100'> Numéro de code du produit</th>
	<th width='250'> Nom du produit</th>
	<th width='100'> Stock du produit</th>
	<th width='100'> Prix du produit</th>
	<th width='500'> Description du produit</th>
	<th width='250'> Catégorie du produit</th>
	<th width='100'> Type de produit</th>
	<th width='100'> classe du produit</th>
	<th width='100'> Vaisseau correspondant au produit</th>
	</tr>
	<tr border='10' bgcolor=#6ff7ae width='150' text-align='center'>
	<td><?php echo $detail->id_produit;?></td>
	<td><?php echo $detail->nom_produit;?></td>
	<td><?php echo $detail->stock_produit;?></td>
	<td><?php echo $detail->prix_produit;?>€</td>
	<td><?php echo $detail->Description;?></td>
	<td><?php echo $detail->categorie_produit;?></td>
	<td><?php echo $detail->nom_type;?></td>
	<td><?php echo $detail->classe_vaisseau;?></td>
	<td><a href="<?php echo site_url("/vaisseau/detail/").$detail->id_vaisseau;?>"><?php echo $detail->nom_vaisseau;?></td>


</table>
