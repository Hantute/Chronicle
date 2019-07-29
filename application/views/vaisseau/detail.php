<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
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
    <p style="font-size:250%" align=center>DETAIL DU VAISSEAU</p>
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
            	<TH width='400'>Représentation graphique</TH>
            	<TH width='50'>Matricule</TH>
            	<TH width='50'>Type</TH>
            	<TH width='50'>Classe</TH>
            	<TH width='50'>Nom</TH>
            	<TH width='75'>Chantier de construction</TH>
            	<TH width='75'>Date de mise en service</TH>
              <TH width='75'>Date de dernière modernisation</TH>
            	<TH width='300'>Armement</TH>
            	<TH width='300'>Protection </TH>
            	<TH width='300'>Générateur </TH>
            	<TH width='75'>Groupe de combat </TH>
            	<TH width='75'>Flotte </TH>
            	<TH width='75'>Equipage </TH>
            	<TH width='75'>Escadrille</TH>
            	</TR>
            	<br>
            	<?php
            	    echo "<tr border='10' bgcolor='#6ff7ae' width='150' text-aligne='center'>\n";
            	    echo "<td width='400' text-align='center'>".$detail->photo_vaisseau."</td>\n";
            	    echo "<td width='50' text-align='center'>".$detail->id_vaisseau."</td>\n";
            	    echo "<td width='50' text-align='center'>".$detail->nom_type."</td>\n";
            	    echo "<td width='50' text-align='center'>".$detail->classe_vaisseau."</td>\n";
            	    echo "<td width='50' text-align='center'>".$detail->nom_vaisseau."</td>\n";
            	    echo "<td width='75' text-align='center'>".$detail->chantier_de_construction."</td>\n";
            	    echo "<td width='75' text-align='center'>".$detail->date_activation."</td>\n";
                  echo "<td width='75' text-align='center'>".$detail->mise_a_jour."</td>\n";
            	    echo "<td width='300' text-align='center'>".$detail->armement."</td>\n";
            	    echo "<td width='300' text-align='center'>".$detail->protection."</td>\n";
            	    echo "<td width='300' text-align='center'>".$detail->generateur."</td>\n";
            	    echo "<td width='75' text-align='center'><a href".site_url("groupe/liste/").$detail->id_groupe.">".$detail->id_groupe."</td>\n";
            	    echo "<td width='75' text-align='center'><a href".site_url("flotte/liste/").$detail->id_groupe.">".$detail->id_groupe."</td>\n";
            	    echo "<td width='75' text-align='center'><a href=".site_url("/personnel/liste/").$detail->id_vaisseau.">Liste des effectifs</td>\n";
            	    echo "<td width='75' text-align='center'><a href=".site_url("/escadrille/liste/").$detail->id_vaisseau.">Groupe Aérien</td>\n";
            	    echo"</tr>";

            	?>

        	</table>
        	</div>
	</body>
</html>
