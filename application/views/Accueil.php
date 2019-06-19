<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="accueil" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Battle of the thousands stars</title>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
 integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
 
 	<!-- lien vers une page css pour faire la mise en forme de la page de présentation  -->
 <link rel="stylesheet" href="<?php echo base_url("assets/css/Accueilbootstrap.css");?>">
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
    				<a class="nav-link" href="<?php echo site_url('Client/Accueil')?>" >Accueil</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link" href="<?php echo site_url("Vaisseau/liste") ?>" >Récit de bataille</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link" href="">Rapport de combats</a>
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
				<div class="row" id="corps">
				<div class="col-sm-6 col-lg-8" id="texte">
					<section>
					<h1 style="font-size:175%"><b>Accueil</b></h1>
						<article>
							<h2 style="font-size:125%"><b>L'Univers</b></h2>
								<h3>Lieu</h3>
									<p> Nous nommons notre galaxie Astrae-luminaris (M87).</p>
									<p> Il s'agit d'une galaxie elliptique supergéante.</p>
									<p> Il est composé de plusieurs milliers d'amas globulaires répartis un peu partout dans notre galaxie, et de plus d'un milliards d'étoiles.</p>
									<p> En son centre, se trouve un gigantesque trou noir supermassif, propulsant un jet de plasma visible depuis toute les planètes du secteur Zayin-Mëm.</p>
									<p> Elle est divisé en plusieurs "quadrants" regroupant des systèmes et parfois des amas globulaires proche les unes des autres.</p>
									<p> La plupart des étoiles sont considérés comme de vieilles étoiles, contenant peu ou pas d'élément métallique.</p>
									
								<h3>Quadrants</h3>
									<p> Pour améliorer notre comprehension de l'univers et faciliter l'enregistrement et la diffusion des données récoltés, notre galaxie fut divisé en plusieurs quadrants définies par nos chercheurs.</p>
									<p> Actuellement, il y en aurait environ une centaine, nombre qui peux augmenter, de taille et contenance diverse mais possédant généralement un point commun, le fait qu'il y ai un un grand nombre d'étoiles dans une petite zone (à l'echelle d'une galaxie).</p>
									<p> Certains quadrants sont quasi inconnus, alors que d'autres, comme celui nommée "Zayin-Mëm" est parfaitement connue par nos scientifiques.</p>
									
								<h3>Zayin-Mëm</h3>
									<p> Le quadrant Zayin-Mëm est composé d'environ 500 000 systèmes solaires.</p>
									<p> Il est très favorable à la vie vus qu'on estime qu'il pourrait y avoir plus de 10 000 planétes ou lunes possédant des caractéristiques favorable à l'apparition ou l'installation de formes de vie.</p>
									<p> Il est aussi extrêmement riche en minéraux, métaux et ressources de luxes.</p> 
									<P> Il est divisé en secteurs pouvant regrouper des milliers de systèmes solaires ou parfois des civilisations.</P>
									
								<h3>Le Secteur Mercuriadum</h3>	
									
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
</body>
</html>

