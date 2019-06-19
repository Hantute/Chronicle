<?php
if (!defined ('BASEPATH')) exit ('No direct script access allowed');
?>

<!DOCTYPE>
<html lang="fr">
<head>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,shrink-t-fit=no">
	<title>Creation d'un compte client</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
 	integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 	
	 <!-- Lien CSS est en dessous de bootstrap et pas au dessus -->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/Jarditoubootstrap.css"); ?>">
</head>
<body>
	<header>
	<p style=font-size:200%> Création d'un compte client</p>
	
	</header>
		<nav>
		<a href="<?php echo site_url("Client/Accueil");?>">Accueil</a>
		<a href="<?php echo site_url("Client/ConnexionClient");?>">Se Connecter</a>
		</nav>
	<div class="container-fluid">
		<h1><i> SALVE CIVIS</i>: "Bonjour citoyen"</h1>
		<h3><i>vos iustus facis impletione officiorum civilium, Vos volo ut fiat miles ? </i>:" Vous voulez faire votre devoir de citoyens, vous voulez être un soldat ?"</h3>
		<?php echo $citation;?>
		<?php echo form_open();?>
			<?php  echo validation_errors();?>
    		<fieldset>
    			<legend>Merci de bien vouloir remplir les champs demandés</legend>
    			<p class="text-danger"><b> * Ces zones sont obligatoires pour valider votre formulaire d'inscription en tant que soldat dans notre armée</b></p>
    					
    						<div class="form-group row">
    							<label for="nom" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>Nom :</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control border-success" name="nom_client" id="nom_client" required>
    								<span id="pasnom"></span>
    							</div>
    						</div>	
    						<div class="form-group row">
    							<label for="nom" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>Prenom :</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control border-success" name="prenom_client" id="prenom_client" required>
    								<span id="pasprenom"></span>
    							</div>
    						</div>		
    						<div class="form-group row">
    							<label for="nom" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>Pseudo :</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control border-success" name="pseudo_client" id="pseudo_client" required>
    								<span id="paspseudo"></span>
    							</div>
    						</div>		
    						<div class="form-group row">
    							<label for="nom" class="col-sm-2 col-form-labl">Date de naissance :</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control border-success" name="date_naissance_client" id="date_de_naissance_client">
    								<span id="pasdate"></span>
    							</div>
    						</div>		
    						<div class="form-group row">
    							<label for="nom" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>Mot de Passe :</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control border-success" name="mot_de_passe" id="mot_de_passe" required>
    								<span id="pascode"></span>
    							</div>
    						</div>	
    						<div class="form-group row">
    							<label for="nom" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>e_mail :</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control border-success" name="e_mail_client" id="e_mail_client" required>
    								<span id="pasemail"></span>
    							</div>
    						</div>	
    		</fieldset>	
				<button type="submit" name="envoyer" id="envoyer" value="envoyer"> Envoyer</button>
				<button type="reset" name="effacer" id="effacer" value="effacer"> Effacer</button>
				<p><i>gratias ago tibi, MILES </i>: Merci, SOLDAT</p>
		</form>				
	</div>
<!-- <link rel="stylesheet" href="http://localhost/ci/assets/css/??.css">	-->	
</body>
</html>



