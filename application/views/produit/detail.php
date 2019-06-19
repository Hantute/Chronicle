<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>

<!DOCTYPE>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="Catalogue de produit" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Détail du produit</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
 		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
		<link rel="stylesheet" href="<?php echo base_url("assets/css/Accueilbootstrap.css"); ?>">
	</head>
<body>
	<header>
		<div>
			<img src="<?php  echo base_url("assets/img/quaistation3.jpg");?>" class="img-fluid" id="img1"
			alt="image de la galaxie M87 responsive" title=" image de la galaxie M87 responsive">
				<p style="font-size:250%" align="center"> CATALOGUE DES PRODUITS</p> 
		</div>	
	</header>
		<nav id="navbar" class="navbar navbar-expand-sm bg-info navbar-info">
	
        <!-- Barre de navigation qui devient un bouton quand la taille de l'écran change Toggler/collapsibe Button -->
    	
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        	<span class="navbar-toggler-icon"></span>
            </button>	
        	<div class="collapse navbar-collapse" id="collapsibleNavbar">
        		<ul class="navbar-nav">
        			<li class="nav-item">
        				<a class="nav-link" href="<?php echo site_url('Client/Accueil')?>" >Accueil</a>
        			</li>
        			<li class="nav-item">
        				<a class="nav-link" href="<?php echo site_url("Produit/liste")?>">Catalogue de produits</a>
        			</li>
        			<li class="nav-item">
        			<?php //var_dump($this->session->user); die();?>
        				<?php  if ($this->session->user):?>
        					<a class="nav-link" href="<?php echo site_url("Client/Modification/"). $this->session->user->id_client?>">Mon Compte</a>
        				<?php else:?>
        					<a class="nav-link" href="<?php  echo site_url("Client/Inscription")?>">Inscription</a>
        				<?php endif;?>
        			</li>
        			<li class="nav-item">
        				<?php if($this->session->user):?>
    					<a class="nav-link" href="<?php echo site_url("Client/Deconnexion")?>" tabindex="-1" aria-disabled="true"><?= $this->session->user->pseudo_client ?></a>
    				<?php else: ?>
    					<a class="nav-link" href="<?php echo site_url("Client/Connexion")?>" tabindex="-1" aria-disabled="true">Connexion</a>
    				<?php endif;?>	
        			</li>
        		</ul>
        	</div> 
    	</nav>

<table border='15' bgcolor=#d0ff00 text-aligne='center'>
	<tr border="10" bgcolor='#a4c2f4' width='150'>
	<th width='100'> Numéro de code du produit</th>
	<th width='250'> Nom du produit</th>
	<th width='100'> Stock du produit</th>
	<th width='100'> Prix du produit</th>
	<th width='500'> Description du produit</th>
	<th width='250'> Catégorie de produit</th>
	<th width='100'> Type de produit</th>
	<th width='100'> Vaisseau correspondant au produit</th>
	</tr>
	<tr border='10' bgcolor=#6ff7ae width='150' text-align='center'>
	<td><?php echo $detail->id_produit;?></td>
	<td><?php echo $detail->nom_produit;?></td>
	<td><?php echo $detail->stock_produit;?></td>
	<td><?php echo $detail->prix_produit;?>€</td>
	<td><?php echo $detail->Description;?></td>
	<td><?php echo $detail->categorie_produit;?></td>
	<td><?php echo $detail->type_produit;?></td>
	<td><a href="<?php echo site_url("/vaisseau/detail/").$detail->id_vaisseau;?>"><?php echo $detail->nom_vaisseau;?></td>
	
	
</table>


</body>
</html>