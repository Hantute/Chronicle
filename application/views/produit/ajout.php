			<h1 class="text-center"> Ajouter un nouveau produit</h1>
					<?php echo form_open_multipart();
                        echo validation_errors();
                        if (isset($sErreurs))
                        {
                            var_dump($sErreurs);
                            echo $sErreurs;
                        } ?>

				<fieldset>
					<legend> Caractéristique du produit à ajouter au catalogue</legend>
						<p class="text-danger"><b>* Ces zones sont obligatoires pour valider le formulaire d'intégration du produit dans le catalogue</b></p>
						<div class="form-group row">
							<label for="id_categorie_label" class="col-sm-2 col-form-label">*catégorie du produit :</label>
								<div class="col-sm-8">
									<select class="col-sm-4 col-form-control" name="id_categorie" id="id_categorie" required>
                                                                            <option selected disabled> Selectionner une catégorie de produit</option>
											<?php foreach ($listeCat as $rowC): ?>
                                                                                        <option value="<?php echo $rowC->id_categorie ?>"><?= $rowC->nom_categorie ?></option>
                                                                                        <?php endforeach; ?>
									</select>
								</div>
						</div>
						<div class="form-group row">
							<label for="id_type" class="col-sm-2 col-form-label">* Type de vaisseau</label>
							<div class="col-sm-8">
								<select class="col-sm-4 col-form-control" name="id_type" id="id_type">
									<option>
										Selectionner un type de vaisseau
									</option>
									<?php foreach ($ajout as $T):?>
											<option value="<?= $T->id_type ?>"><?= $T->nom_type ?>
											</option>
									<?php endforeach; ?>
								</select>
							<span id="pastype"></span>
							</div>
						</div>
							<div class="form-group row">
								<label for="id_classe_label" class="col-sm-2 col-form-label" id="id_classe_label">* Classe du vaisseau</label>
								<div class="col-sm-8">
									<select class="col-sm-4 col-form-control" name="id_classe" id="id_classe">
										<?php foreach ($classe as $C):?>
												<option value="<?= $C->id_classe ?>"><? = $C->nom_classe ?>
												</option>
										<?php endforeach; ?>
									</select>
								<span id="pasclasse"></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="id_vaisseau_label" class="col-sm-2 col-form-label" id="id_vaisseau_label">* Nom du vaisseau</label>
								<div class="col-sm-8">
									<select class="col-sm-4 col-form-control" name="id_vaisseau" id="id_vaisseau">
										<?php foreach ($vaisseau as $V):?>
												<option value="<?= $V->id_vaisseau ?>"><? = $V->nom_vaisseau ?>
												</option>
										<?php endforeach; ?>
									</select>
								<span id="pasvaisseau"></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="nom_produit_label" class="col-sm-2 col-form-label"><a class="text-danger">*</a> Nom du produit:</label>
								<div class="col-sm-6">
									<input type="text" class="form-control border-success" name="nom_produit" id="nom_produit" required>
									<span id="pasnom"></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="stock_produit" class="col-sm-2 col-form-label"><a class="text-danger">*</a> Quantité en stock du produit:</label>
								<div class="col-sm-6">
									<input type="text" class="form-control border-success" name="stock_produit" id="stock_produit" required>
									<span id="passtock"></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="prix_produit" class="col-sm-2 col-form-label"><a class="text-danger" >*</a> Prix du produit:</label>
								<div class="col-sm-6">
									<input type="text" class="form-control border-success" name="prix_produit" id="prix_produit" value='XXX,XX' required>€
									<span id="pasprix"></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="Description" class="col-sm-2 col-form-label"></a> Description du produit:</label>
								<div class="col-sm-8">
									<input type="text-area" class="form-control border-success" name="Description" id="Description" >
									<span id="pasnom"></span>
								</div>
							</div>
				</fieldset>
						<button type="submit" name="envoyer" id="envoyer" value="envoyer" >envoyer</button>
						<button type="reset" name="effacer" id="effacer" value="effacer">effacer</button>

		</div>
		<script>
				$("#id_classe_label").hide();
				$("#id_classe").hide();
				$("#id_vaisseau_label").hide();
				$("#id_vaisseau").hide();

				$("#id_type").change(function ()
					{
								$("#id_classe_label").show();
								$("#id_classe").show();
								let id_type = $("#id_type").val();
								//console.log(id_type);
								//console.log($T->id_type);
								$("#id_classe").load("http://localhost/Ci_FilRouge/index.php/Produit/classe_produit/" + id_type);
					});

					$("#id_classe").change(function ()
						{
									$("#id_vaisseau_label").show();
									$("#id_vaisseau").show();
									let id_classe = $("#id_classe").val();
									//console.log(classe_vaisseau);
									//console.log($C->id_classe);
									$("#id_vaisseau").load("http://localhost/Ci_FilRouge/index.php/Produit/vaisseau_produit/" + id_classe);
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
