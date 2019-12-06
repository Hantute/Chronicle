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
    							<label for="prenom" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>Pseudo :</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control border-success" name="pseudo_client" id="pseudo_client" required>
    								<span id="paspseudo"></span>
    							</div>
    						</div>
    						<div class="form-group row">
    							<label for="motdepasse" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>Mot de Passe :</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control border-success" name="mot_de_passe" id="motdepasse" value="Il faut mettre un signe spécifique -(_^*+\/\#à dans votre mot de passe" required>
    								<span id="pascode"></span>
    							</div>
    						</div>
    						<div class="form-group row">
    							<label for="email" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>e_mail :</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control border-success" name="e_mail_client" id="email" required>
    								<span id="pasemail"></span>
    							</div>
    						</div>
    		</fieldset>
				<button type="submit" name="envoyer" id="envoyer" value="envoyer"> Envoyer</button>
				<button type="reset" name="effacer" id="effacer" value="effacer"> Effacer</button>
				<p><i>gratias ago tibi, MILES </i>: Merci, SOLDAT</p>
		</form>
	</div>
</body>
</html>
