<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
//var_dump($liste);
//echo('bonjour');
?>

<!DOCTYPE>
<html lang="fr">
	<head>
	<meta charset="utf-8">
	<title>Liste des rapports de combats</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
 	integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!--  <link rel="stylesheet" href="<?php  //echo base_url("assets/css/XX.css");?>"> -->
	</head>
	<body>
		<header>
			<div>
				<p style="font-size:250%" align=center>ARCHIVES DES RAPPORTS DE COMBAT</p>
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
            				<a class="nav-link" href="<?php echo site_url("Vaisseau/ajout") ?>">ajouter un vaisseau</a>
            			</li>
            			<li class="nav-item">
            				<a class="nav-link" href="">Rapport de combats</a>
            			</li>
            			<li class="nav-item">
            				<a class="nav-link" href="">Catalogue de produits</a>
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
        	<div class="container-fluid">
        			<?php if($this->session->user):?>
        				<p> <?php echo $Salutation."<br>".$this->session->user->prenom_client." ".$this->session->user->nom_client;?> !<br></p>
        			<?php else: ?>
        				<p><?php echo $Salutation;?></p><br />     
        			<?php endif; ?>
        			<?php echo $citation; ?>	
        			<br />
        			
        	<table border='5' bgcolor=#d0ff00 text-align='center'>
            	<TR border='10' bgcolor='#a4c2f4' width='250'>
            	<TH width='75'>Matricule du vaisseau</TH>
            	<TH width='75'>Type de vaisseau</TH>
            	<TH width='75'>Classe du vaisseau</TH>
            	<TH width='75'>nom du vaisseau</TH>
            	<TH width='75'>chantier de construction</TH>
            	<TH width='75'>date de mise en service</TH>
            	<TH width='75'>groupe de combat</TH>
            	<TH width='75'>flotte </TH>
    			</TR>
    			<br>
    			<?php 
    			foreach ($liste as $row)
    			{    
    			    echo "<tr border='10' bgcolor='#6ff7ae' width='150' text-aligne='center'>\n";
    			    echo "<td width='75' text-align='center'>".$row->id_vaisseau."</td>\n";
    			    echo "<td width='75' text-align='center'>".$row->nom_type."</td>\n";
    			    echo "<td width='75' text-align='center'>".$row->classe_vaisseau."</td>\n";
    			    echo "<td width='75' text-align='center'><a href=".site_url("Vaisseau/detail/").$row->id_vaisseau.">".$row->nom_vaisseau."</td>\n";
    			    echo "<td width='75' text-align='center'>".$row->chantier_de_construction."</td>\n";
    			    echo "<td width='75' text-align='center'>".$row->date_activation."</td>\n";
    			    echo "<td width='75' text-align='center'>"/*.$row->nom_groupe*/."</td>\n";
    			    echo "<td width='75' text-align='center'>"/*.$row->nom_flotte*/."</td>\n";
    			    echo"</tr>";
    			}
			
			?>
        	
        	</table>
        	</div>	
	</body>	
</html>