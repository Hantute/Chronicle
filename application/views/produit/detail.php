<?php $limite=$detail->stock_produit;
$cpt=0;
$prix=$detail->prix_produit;
$facture = $prix * $cpt;
var_dump($prix);
var_dump($facture);?>

<table border='15' bgcolor=#d0ff00 text-aligne='center'>
	<tr border="10" bgcolor='#a4c2f4' width='150'>
	<th width='100'> Numéro de code du produit</th>
	<th width='250'> Nom du produit</th>
	<th width='100'> Stock</th>
	<th width='100'> Prix à l'unité</th>
	<th width='500'> Description</th>
	<th width='150'> Catégorie</th>
	<th width='100'> Type du modèle</th>
	<th width='100'> Classe du modèle</th>
        <th width='100'> Quantité commandé</th>
        <th width='100'> Prix total</th>
	<th width='100'> Détail du Vaisseau</th>
	</tr>
	<tr border='10' bgcolor=#6ff7ae width='150' text-align='center'>
	<td><?php echo $detail->id_produit;?></td>
	<td><?php echo $detail->nom_produit;?></td>
	<td><?php echo $detail->stock_produit;?></td>
        <td><input disabled class='col-10' id="prix" value="<?php echo $prix ; ?>">€</td>
	<td><?php echo $detail->Description;?></td>
	<td><?php echo $detail->categorie_produit;?></td>
	<td><?php echo $detail->nom_type;?></td>
	<td><?php echo $detail->classe_vaisseau;?></td>
        <td><select id='commande'> <?php for($cpt=0; $cpt<=$limite;$cpt++){ ?>
                                            <option value='<?php echo $cpt ;?>'><?php echo $cpt ;?></option>
                                         <?php } ?></select></td>
        <td><input disabled type='float' class='col-10' id='facture' value='<?php echo $facture ;?>'>€</td>
        <td><a href="<?php echo site_url("/vaisseau/detail/").$detail->id_vaisseau;?>"><?php echo $detail->nom_vaisseau;?></a></td>
        
</table>
<script>
    $("#commande").change(function()
        {
            console.log("bonjour");
            
            let $quantite=$("#commande").val();
            let $prix=$("#prix").val();
            console.log($quantite);
            console.log($prix);
            $facture= $prix*$quantite;
            $("#facture").appendTo("#facture").val($facture);
        
    
        });
</script>