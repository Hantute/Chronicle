<?php
//var_dump($_SESSION);
if (!defined ('BASEPATH')) exit ('No direct script access allowed');

?>
<!-- Page de view spécifique au Header, appeller pour faire l'entête de la page appeler -->

<DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="<?php echo $titre; ?> " content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo  $titre; ?></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
 integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<!-- lien vers une page css pour faire la mise en forme de la page de présentation -->
 <link rel="stylesheet" href="<?php echo base_url("assets/css/Accueilbootstrap.css");?>">
 <link rel="stylesheet" href="<?php echo base_url("assets/css/Menu.css"); ?>"> 
</head>
<body>
    <header>
	<div>
            <h1>LES CHRONICLES COLONIALES DISPARUES</h1>
        </div>
    </header>
    <div class="row">
        <div class="col-sm-6"> 
            <nav id="navbar" class="navbar navbar-default navbar-fixed-top navbar-expand-sm bg-info navbar-info" role="navigation">
              <!-- Barre de navigation qui devient un bouton quand la taille de l'écran change Toggler/collapsibe Button -->
                <button class="navbar-toggler pull-left" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav" id="MENU">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('Client/Accueil')?>" >Accueil</a>
                            <ul>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Client/Accueil#Lieu')?>" >Lieu</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Client/Accueil#Quadrants')?>" >Quadrants</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Client/Accueil#Zayin')?>" >Zayin-Mëm</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Client/Accueil#Secteur')?>" >Le Secteur Mercuriadum</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#">Bibliothéques</a>
                            <ul id="SMenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("Bataille/RecitB") ?>" > Récits romancés de Bataille </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("Bataille/ListeB") ?>" > Archives des Rapports de combats </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url("Vaisseau/listeV") ?>" >Effectifs </a>
                            <ul >
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Vaisseau/listeV#flotte1')?>" >Dragon</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Vaisseau/listeV#flotte2')?>" >Mythe</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Vaisseau/listeV#flotte3')?>" >Antique</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Vaisseau/listeV#flotte4')?>" >Angélique</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Vaisseau/listeV#flotte5')?>" >Infernale</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Vaisseau/listeV#flotte6')?>" >héroique</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url("Produit/liste") ?>">Les produits</a>
                            <ul >
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("Produit/liste") ?>" >Catalogue</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("Produit/categorie/1")?>">les Maquettes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("Produit/categorie/2")?>">les Dessins</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("Produit/categorie/3")?>">les Figurines</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("Produit/categorie/4")?>">les Livres</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("Produit/categorie/5")?>">Autres</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
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
        </div>
        <?php if($this->session->user):?>
        <div class="col-sm-6" id='navbarPanier'>
            <nav id="navPanier" class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header navbar-right" id="PANIER">
                        <button type="button" class="navbar-toggle collapsed" id='buttonPanier' data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">PANIER
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class='nav navbar-nav'>
                            <li class='active' id='AFFICHE'><span class='sr-only'>
                                (current)</span></li>
                        </ul>
                    </div>
                </div>    
            </nav>
        </div>
        <?php endif ?>
    </div>    
<div class="container-fluid">
    <?php if($this->session->user):?>
        <p> <?php echo $Salutation."<br>"; ?>
        Bonjour Capitaine <?php echo $this->session->user->prenom_client." ".$this->session->user->nom_client; ?> <br> </p>
    <?php else: ?>
        <p> <?php echo $Salutation;?></p>
    <?php endif;?> 
    <?php echo $citation; ?>                      
<!-- Carroussel d'image controlée -->
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
    </div>
<!-- Modal gérant les ajout de nouveaux vaisseau -->
<div id='ModaPanier' class='modal fade bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true' data-backdrop="false">
    <div class='modal-dialog modal-lg' role="document" >
        <!-- Modal content -->
        <div class='modal-content' id='PanierModif'>
            
        </div>        
    </div>
</div>

<link src="<?php echo base_url('assets/js/onglet.js')?>">
<link src="<?php echo base_url('assets/css/GestionModal.css')?>">

<script>
    $("#buttonPanier").click(function()
    {
        console.log("BONJOUR");
        $('#AFFICHE').load("http://localhost/CI_FilRouge/index.php/Panier/listePanier");
    });
    /*$("#PANIER").mouseleave(function()
    {
        console.log('BONSOIR');
        $('#AFFICHE').empty();
    });*/
    
    
</script>    