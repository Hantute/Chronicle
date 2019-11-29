
    	<!-- Carroussel d'image controlée -->

    	<div class="container-fluid">
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
								<select name="id_type" id="id_type" class="form-control" required>
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
                                                                    <select name="id_classe" id="id_classe" class="form-control" required>
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
                                                            <label for="classe_label" class="col-sm-2 col-form-label" id="id_flotte_label">* Flotte</label> 
                                                            <div class="col-sm-4">
                                                                <select name="id_flotte" id="id_flotte" class="form-control" required>
                                                                    <option selected disabled> Sélectionnez le nom de la flotte que vous désirez rejoindre</option>
                                                                    <?php foreach($flotte as $rowf): ?>
                                                                    <option value="<?= $rowf->id_flotte ?>"><?php echo $rowf->nom_flotte; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div> 
                                                
                                                        <div class="form-group row">
                                                            <label for="classe_label" class="col-sm-2 col-form-label" id="id_groupe_de_combat_label">* groupe de combat</label> 
                                                            <div class="col-sm-4" >
                                                                <select name="id_groupe" id="id_groupe" name="id_groupe" class="form-control" required>
                                                                    
                                                                </select>
                                                                
                                                            </div>
                                                        </div>    

						 	<div class="form-group row">
						 		<label for="id_systeme_label" class="col-sm-2 col-form-labl"><a class="text-danger">*</a>chantier de construction:</label>
						 		<div class="col-sm-4">
						 			<select name="id_systeme" id="id_systeme" class="form-control" required>
                                                                            <option selected disabled> Sélectionnez le nom de la planète ou se trouve le chantier</option>
                                                                            <?php foreach ($chantier as $rowCh): ?>
                                                                            <option value="<?= $rowCh->id_systeme ?>"><?php echo $rowCh->nom_planete_capitale ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>    
						 			<span id="passysteme"></span>
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
						 			<input type="file" class='input-file btn btn-dark photo_vaisseau' name="photo_vaisseau" id="photo_vaisseau">
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
                                $("#id_groupe_de_combat_label").hide();
                                $("#id_groupe").hide();
                                
                                $("#id_flotte").change(function ()
                                        {
                                               $("#id_groupe_de_combat_label").show();
                                               $("#id_groupe").show();
                                               let id_flotte = $("#id_flotte").val();
                                               console.log(id_flotte);
                                               $("#id_groupe").load("http://localhost/CI_FilRouge/index.php/Groupe_de_combat/choixGroupe/" + id_flotte);
                                        })
		</script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		 integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		 crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		 integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		 crossorigin="anonymous"></script>
</body>
</html>
