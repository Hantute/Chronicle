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
							<label for="categorie_produit" class="col-sm-2 col-form-label">*catégorie du produit :</label>
								<div class="col-sm-8">
									<select class="col-sm-4 col-form-control" name="categorie_produit" id="categorie_produit" required>
											<option value="maquette">Maquette</option>
											<option value="dessin">Dessin</option>
											<option value="figurine">Figurine</option>
											<option value="livre">Livre</option>
											<option value="autres">Autres</option>
									</select>
								</div>
						</div>
						<div class="form-group row">
							<label for="type_produit" class="col-sm-2 col-form-label">* Type de vaisseau</label>
							<div class="col-sm-8">
								<select class="col-sm-4 col-form-control" name="type_produit" id="type_produit">
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
								<label for="classe_produit" class="col-sm-2 col-form-label" id="classe_label">* Classe du vaisseau</label>
								<div class="col-sm-8">
									<select class="col-sm-4 col-form-control" name="classe_produit" id="classe_produit">
										<?php foreach ($classe as $C):?>
												<option value="<? = $C->id_classe ?>"><? = $C->classe_vaisseau ?>
												</option>
										<?php endforeach; ?>
									</select>
								<span id="pasclasse"></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="id_vaisseau" class="col-sm-2 col-form-label" id="id_vaisseau_label">* Nom du vaisseau</label>
								<div class="col-sm-8">
									<select class="col-sm-4 col-form-control" name="id_vaisseau" id="id_vaisseau">
										<?php foreach ($vaisseau as $V):?>
												<option value="<? = $V->id_vaisseau ?>"><? = $V->nom_vaisseau ?>
												</option>
										<?php endforeach; ?>
									</select>
								<span id="pasclasse"></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="nom_produit" class="col-sm-2 col-form-label"><a class="text-danger">*</a> Nom du produit:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control border-success" name="nom_produit" id="nom_produit" required>
									<span id="pasnom"></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="stock_produit" class="col-sm-2 col-form-label"><a class="text-danger">*</a> Quantité en stock du produit:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control border-success" name="stock_produit" id="stock_produit" required>
									<span id="passtock"></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="prix_produit" class="col-sm-2 col-form-label"><a class="text-danger">*</a> Prix du produit:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control border-success" name="prix_produit" id="prix_produit" required>
									<span id="pasprix"></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="Description" class="col-sm-2 col-form-label"></a> Description du produit:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control border-success" name="Description" id="Description" >
									<span id="pasnom"></span>
								</div>
							</div>
				</fieldset>
						<button type="submit" name="envoyer" id="envoyer" value="envoyer" >envoyer</button>
						<button type="reset" name="effacer" id="effacer" value="effacer">effacer</button>

		</div>
		<script>
				$("#classe_label").hide();
				$("#classe_produit").hide();
				$("#id_vaisseau_label").hide();
				$("#id_vaisseau").hide();

				$("#type_produit").change(function ()
					{
								$("#classe_label").show();
								$("#classe_produit").show();
								let id_type = $("#type_produit").val();
								//console.log(id_type);
								//console.log($T->id_type);
								$("#classe_produit").load("http://localhost/Ci_FilRouge/index.php/Produit/classe_produit/" + id_type);
					});

					$("#classe_produit").change(function ()
						{
									$("#id_vaisseau_label").show();
									$("#id_vaisseau").show();
									let id_classe = $("#classe_produit").val();
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
