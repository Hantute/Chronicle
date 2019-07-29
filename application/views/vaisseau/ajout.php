<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="Ajout d'un vaisseau de combat" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Formulaire d'activation d'un vaisseau</title>

		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
 	integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 	 <link rel="stylesheet" href="<?php  echo base_url("assets/css/Accueilbootstrap.css");?>">
</head>
<body>
	<header>
		<p style=font-size:200%> Activer un vaisseau de combat</p>
	</header>
		<nav id="navbar" class="navbar navbar-expand-sm bg-info navbar-info">

        <!-- Barre de navigation qui devient un bouton quand la taille de l'écran change Toggler/collapsibe Button -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    	<span class="navbar-toggler-icon"></span>
        </button>
    	<div class="collapse navbar-collapse" id="collapsibleNavbar">
    		<ul class="navbar-nav">
    			<li class="nav-item">
    				<a class="nav-link" href="<?php echo site_url('Client/Accueil')?>">Accueil</a>
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

    	<!-- Carroussel d'image controlée -->

    	<div class="container-fluid">
        			<?php if($this->session->user):?>
        				<p> <?php echo $Salutation."<br> ".$this->session->user->prenom_client." ".$this->session->user->nom_client; ?> !<br>
        			<?php else: ?>
        				<p> <?php echo $Salutation;?>
        			<?php endif;?><br>
              		<?php echo $citation; ?>

			<h1 class="text-center">Félicitation Commandant</h1>
				<?php echo form_open_multipart();
				      echo validation_errors();
				      if(isset($Erreurs))
				      {
				          var_dump($Erreurs);
				          echo $Erreurs;
				      }?>

				<fieldset>
					<legend>Veuillez rentrer les données nécéssaires pour confirmer que votre vaisseau est prêt au combat</legend>
						<p class="text-danger"><b>* Ces données sont obligatoires pour confirmer que votre navire répond aux caractéristiques demandés</b></p>

							<div class="form-group row">
							<label for="id_type" class="col-sm-2 col-form-label">* Type de vaisseau:</label>
								<div class="col-sm-4">
								<select name="id_type" id="id_type" class="form-control">
									<option selected disabled> Sélectionnez le type de vaisseau</option>
									<?php
									   foreach($ajout as $type): ?>
									   <option value="<?= $type->id_type?>"><?= $type->nom_type?></option>
									<?php endforeach; ?>
								</select>
									<span id="pastype"></span>
								</div>
							</div>
						 	<div class="form-group row">
						 	<label for="classe_label" class="col-sm-2 col-form-label" id="id_classe_label" >*Classe du vaisseau</label>
						 		<div class="col-sm-4">
						 		<select name="id_classe" id="id_classe" class="form-control">
						 			<?php  foreach ($id_classe as $classe):?>
						 				<option value="<?= $classe->id_classe ?>"><?=$classe->nom_classe ?></option>
						 			<?php endforeach;  ?>
						 		</select>
									<span id="pasclasse"></span>
						 		</div>
						 	</div>

						 	<div class="form-group row">
						 		<label for="nom_vaisseau" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>Nom du Vaisseau:</label>
						 		<div class="col-sm-4">
						 			<input type="text" class="form-control border-success" name="nom_vaisseau" id="nom_vaisseau" required>
						 			<span id="pasnom"></span>
						 		</div>
						 	</div>

						 	<div class="form-group row">
						 		<label for="chantier_de_construction" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>chantier de construction:</label>
						 		<div class="col-sm-4">
						 			<input type="text" class="form-control border-success" name="chantier_de_construction" id="chantier_de_construction" required>
						 			<span id="paschantier"></span>
						 		</div>
						 	</div>
						 	<div class="form-group row">
						 		<label for="armement" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>armement:</label>
						 		<div class="col-sm-4">
						 			<input type="text" class="form-control border-success" name="armement" id="armement" required>
						 			<span id="pasarme"></span>
						 		</div>
						 	</div>
						 	<div class="form-group row">
						 		<label for="protection" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>protection:</label>
						 		<div class="col-sm-4">
						 			<input type="text" class="form-control border-success" name="protection" id="protection" required>
						 			<span id="pasprotection"></span>
						 		</div>
						 	</div>
						 	<div class="form-group row">
						 		<label for="generateur" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>générateur d'energie et de propulsion:</label>
						 		<div class="col-sm-4">
						 			<input type="text" class="form-control border-success" name="generateur" id="generateur" required>
						 			<span id="pasgenerateur"></span>
						 		</div>
						 	</div>
						 	<div class="form-group row">
						 		<label for="photo_vaisseau" class="col-sm-2 col-form-labl">image du Vaisseau:</label>
						 		<div class="col-sm-4">
						 			<input type="file" name="photo_vaisseau" id="photo_vaisseau">
						 			<span id="pasnom"></span>
						 		</div>
						 	</div>

				</fieldset>
				<h2> Merci d'avoir répondu au questionnaire</h2>
			<button type="submit" name="envoyer" id="envoyer" value="envoyer"> envoyer</button>
			<button type="reset" name="effacer" id="effacer" value="effacer">effacer</button>
		</div>
	</form>
		<script>
				$("#id_classe_label").hide();
				$("#id_classe").hide();

				$("#id_type").change(function ()
					{
								$("#id_classe_label").show();
								$("#id_classe").show();
								let id_type = $("#id_type").val();
								//console.log(id_type);
								//console.log($T->id_type);
								$("#id_classe").load("http://localhost/Ci_FilRouge/index.php/Vaisseau/classe_vaisseau/" + id_type);
					});
		</script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		 integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		 crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		 integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		 crossorigin="anonymous"></script>
</body>
</html>
