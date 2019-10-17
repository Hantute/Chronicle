<?php
if (!defined ('BASEPATH')) exit ('No direct script access allowed');
?>
<!-- Page de view spécifique au Header, appeller pour faire l'entête de la page appeler -->

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="<?php echo $titre; ?>" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Page d'Accueil</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
 integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!-- lien vers une page css pour faire la mise en forme de la page de présentation -->
 <link rel="stylesheet" href="<?php echo base_url("assets/css/Accueilbootstrap.css");?>">
 <link rel="stylesheet" href="<?php echo base_url("assets/css/Menu.css"); ?>">
</head>
<body>
	<header>
	<div><?php echo $titre; ?></div>
	</header>
  <nav id="navbar" class="navbar navbar-expand-sm bg-info navbar-info" role="navigation">

      <!-- Barre de navigation qui devient un bouton quand la taille de l'écran change Toggler/collapsibe Button -->

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav" id="MENU">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Client/Accueil')?>" >Accueil</a>
            <ul >
              <li class="nav-item"><a class="nav-link" href="" >Lieu</a></li>
              <li class="nav-item"><a class="nav-link" href="" >Quadrants</a></li>
              <li class="nav-item"><a class="nav-link" href="" >Zayin-Mëm</a></li>
              <li class="nav-item"><a class="nav-link" href="" >Le Secteur Mercuriadum</a></li>
            </ul>
        </li>

        <li class="nav-item">
          <a href="#">Les vaisseaux</a>
            <ul >
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url("Vaisseau/liste") ?>" >Récit de bataille</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Rapport de combats</a>
              </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#">Les produits</a>
              <ul >
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url("Produit/liste") ?>" >Catalogue de produits</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">les maquettes</a>
                </li>
              </ul>
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

<link src="<?php echo base_url("assets/js/onglet.js");?>">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
crossorigin="anonymous">
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
crossorigin="anonymous">
</script>
