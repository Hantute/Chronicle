		<h1><i> SALVE CIVIS</i>: "Bonjour citoyen"</h1>
		<h3><i>vos iustus facis impletione officiorum civilium, Vos volo ut fiat miles ? </i>:" Vous voulez faire votre devoir de citoyens, vous voulez être un soldat ?"</h3>
		<?php echo $citation;?>
		<?php echo form_open();?>
			<?php  echo validation_errors();?>
    		<fieldset>
    			<legend>Merci de bien vouloir remplir les champs demandés</legend>
    			<p class="text-danger"><b> * Ces zones sont obligatoires pour valider votre formulaire d'inscription en tant que soldat dans notre armée</b></p>
    						<div class="form-group row">
    							<label for="nom" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>Pseudo :</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control border-success" name="pseudo_client" id="pseudo_client" required>
    								<span id="paspseudo"></span>
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
    							<label for="nom" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>Mot de Passe :</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control border-success" name="password" id="password" required>
    								<span id="paspassword"></span>
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
