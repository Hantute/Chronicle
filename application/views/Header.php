<?php

?>
<!-- Page de view spécifique au Header, appeller pour faire l'entête de la page appeler -->

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name=" " content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php  title ?></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
 integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!-- lien vers une page css pour faire la mise en forme de la page de présentation 
 <link rel="stylesheet" href=".css"> -->
</head>
<body>
	<header>
	<div></div>
	</header>
		<nav id="navbar" class="navbar navbar-expand-sm bg-info navbar-info">
	
        <!-- Barre de navigation qui devient un bouton quand la taille de l'écran change Toggler/collapsibe Button -->
    	
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    	<span class="navbar-toggler-icon"></span>
        </button>	
    	<div class="collapse navbar-collapse" id="collapsibleNavbar">
    		<ul class="navbar-nav">
    			<li class="nav-item">
    				<a class="nav-link" href="">Accueil</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link" href="">Récit de bataille</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link" href="">Rapport de combats</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link" href="">Catalogue de produits</a>
    			</li>
    			<li class="nav-item">
    				<?php  if ($this->session->user):?>
    					<a class="nav-link" href="<?php echo site_url("")?>">Mon Compte</a>
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
    	    	
    	<!-- Carroussel d'image controlée -->
    	</nav>
			<div class="container-fluid">
					<?php if($this->session->user):?>
        				<p> <?php echo $Salutation."<br> ".$this->session->user->prenom_client." ".$this->session->user->nom_client; ?> !<br>
        			<?php else: ?>
        				<p> <?php echo $Salutation;?>
        			<?php endif;?><br>	
              		<?php echo $citation; ?>
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    				<div class="carousel-inner">
    					<div class="carousel-item active">
    					<img class="d-block w-100" src="" id="img2"
    					alt="First slide" title=" responsive" >
    				</div>
    					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
       						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
        					<span class="sr-only">Previous</span>
      					</a>
      					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        					<span class="carousel-control-next-icon" aria-hidden="true"></span>
        					<span class="sr-only">Next</span>
      					</a>
				</div>