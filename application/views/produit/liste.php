<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
//var_dump($liste);
//echo('bonjour');
?>

<!DOCTYPE>
<html lang="fr">
	<head>
	<meta charset="utf-8">
	<meta name="Liste des produits" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Liste des produits</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
	integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/Accueilbootstrap.css");?>">
	</head>
	<body>
		<header>
			<div>
				<p style="font-size:250%" align=center>LISTE DES PRODUITS</p>
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
            				<a class="nav-link" href="<?php echo site_url("Client/Accueil") ?>">Accueil</a>
            			</li>
            			<li class="nav-item">
            				<a class="nav-link" href="<?php echo site_url("Vaisseau/liste") ?>">Récit de bataille</a>
            			</li>
            			<li class="nav-item">
            				<a class="nav-link" href="">Rapport de combats</a>
            			</li>
            			<li class="nav-item">
            				<a class="nav-link" href="<?php echo site_url("Produit/ajout")?>">ajouter un produit</a>
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
        			<?php if($this->session->user):?>
        				<p> <?php echo $Salutation."<br>".$this->session->user->prenom_client." ".$this->session->user->nom_client;?> !<br></p>
        			<?php else: ?>
        				<p><?php echo $salutation;?></p><br />
        			<?php endif; ?>
        			<?php echo $citation; ?>
        			<br />

        	<table border='5' bgcolor=#d0ff00 text-align='center'>
        	<TR border='10' bgcolor='#a4c2f4' width='250'>
        	<TH width='400'>Image du produit</TH>
        	<TH width="75">Code du produit</TH>
        	<TH width='75'>Nom du produit</TH>
        	<TH width='75'>Prix du produit</TH>
        	<TH width='75'>Stock du produit</TH>
        	<TH width='75'>Categorie des produits</TH>
			<TH width='75'>Modification du produit</TH>
			<TH width='75'>Suppression du produit</TH>
			</TR>
			<br>
			<?php
			foreach ($liste as $row)
			{
			    echo "<tr border='10' bgcolor='#6ff7ae' width='150' text-aligne='center'>\n";
			    echo "<td width='400' text-align='center'>".$row->photo_vaisseau."</td>\n";
			    echo "<td width='75' text-align='center'>".$row->id_produit."</td>\n";
			    echo "<td width='75' text-align='center'><a href=".site_url("produit/detail/").$row->id_produit.">".$row->nom_produit."</td>\n";
			    echo "<td width='75' text-align='center'>".$row->prix_produit."</td>\n";
			    echo "<td width='75' text-align='center'>".$row->stock_produit."</td>\n";
			    echo "<td width='75' text-align='center'>".$row->categorie_produit."</td>\n";
			    echo "<td width='75' text-align='center'><a href=".site_url("/produit/modification/").$row->id_produit.">modification</a></td>\n";
			    echo "<td width='75' text-align='center'><a href=".site_url("/produit/suppression/").$row->id_produit.">suppression</td>\n";

			    echo"</tr>";
			}

			?>

        	</table>
	</body>
</html>
