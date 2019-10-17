
		<h1><i> SALVE CIVIS</i>: "Bonjour citoyen"</h1>
		<h3><i>vos iustus facis impletione officiorum civilium, Vos volo ut fiat miles ? </i>:" Vous voulez faire votre devoir de citoyens, vous voulez être un soldat ?"</h3>
		<?php echo $citation;?>
		<?php echo form_open();?>
			<?php  echo validation_errors();?>
    		<fieldset>
    			<legend>Merci de bien vouloir remplir les champs demandés</legend>
    			<p class="text-danger"><b> * Ces zones sont obligatoires pour valider votre formulaire d'inscription en tant que soldat dans notre armée</b></p>

    						<div class="form-group row">
    							<label for="id_client" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>Matricule du Soldat :</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control border-success" name="id_client" id="id_client" value="<?= $this->session->user->id_client; ?>" required>
    								<span id="pasid"></span>
    							</div>
    						</div>
    						<div class="form-group row">
    							<label for="nom_client" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>Nom :</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control border-success" name="nom_client" id="nom_client" value="<?= $this->session->user->nom_client; ?>" required>
    								<span id="pasnom"></span>
    							</div>
    						</div>
    						<div class="form-group row">
    							<label for="prenom_client" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>Prenom :</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control border-success" name="prenom_client" id="prenom_client" value="<?=$this->session->user->prenom_client; ?>" required>
    								<span id="pasprenom"></span>
    							</div>
    						</div>
    						<div class="form-group row">
    							<label for="mot_de_passe" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>Mot de Passe :</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control border-success" name="mot_de_passe" id="mot_de_passe" required>
    								<span id="pascode"></span>
    							</div>
    						</div>
    						<div class="form-group row">
    							<label for="e_mail_client" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>e_mail :</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control border-success" name="e_mail_client" id="e_mail_client" value="<?= $this->session->user->e_mail_client; ?>" required>
    								<span id="pasemail"></span>
    							</div>
    						</div>
    						<div class="form-group_row" name="date" id="date">
    						<p> Date d'inscription: <?php echo $this->session->user->date_inscription_client;?></p>
    						<p> Date de dernière connexion: <?php echo $this->session->user->date_dernière_connexion;?><p>
								<p> Date de dernière modification du compte: <?php echo $this->session->user->date_modification;?><p>
    						</div>
    		</fieldset>
				<button type="submit" name="modifier" id="modifier" value="modifier"> modifier</button>
				<button type="reset" name="effacer" id="effacer" value="effacer"> Effacer</button>
				<p><i>gratias ago tibi, MILES </i>: Merci, SOLDAT</p>
		</form>
	</div>
