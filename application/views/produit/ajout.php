<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
?>


<!DOCTYPE>
<html lang="fr">
<head>
	<meta charset ="utf-8">
	<meta name="ajout" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Ajout d'un produit</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
 		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php  echo base_url("assets/css/Accueilbootstrap.css"); ?>">
</head>
	<header>
		<p style=font-size:200%> AJOUTER UN PRODUIT</p>
	</header>
			<nav>
			<a href="<?php echo site_url("Produits/liste"); ?>">Liste des produits</a>
			</nav>	
		<div class="container-fluid">
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
							<div class="form-group row>
								<label for="nom_produit" class="col-sm-2 col-form-label"><a class="text-danger">*</a> Nom du produit:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control border-success" name="nom_produit" id="nom_produit" required>
									<span id="pasnom"></span>
								</div>
							</div>	
							<div class="form-group row>
								<label for="stock_produit" class="col-sm-2 col-form-label"><a class="text-danger">*</a> Quantité en stock du produit:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control border-success" name="stock_produit" id="stock_produit" required>
									<span id="passtock"></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="categorie_produit" class="col-sm-2 col-form-label">*catégorie du produit :</label>
									<div class="col-sm-8">	
										<select class="col-sm-4 col-form-control" name="categorie_produit" id="categorie_produit" required>
											
										
										
										</select>
									</div>
							</div>
							<div class="form-group row">
								<label for="type_produit" class="col-sm-2 col-form-label">* Type de produit</label>
								<div class="col-sm-8">
									<select class="col-sm-4 col-form-control" name="type_produit" id="type_produit">
										<?php foreach($type as $row)
										{
										    echo '<option value='.$row->id_type.'>'.$row->nom_type.'</option>'."\n";
										}
										?>
									</select>
								<span id="pastype"></span>
								</div>
							</div>
							<div class="form-group row>
								<label for="prix_produit" class="col-sm-2 col-form-label"><a class="text-danger">*</a> Prix du produit:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control border-success" name="prix_produit" id="prix_produit" required>
									<span id="pasprix"></span>
								</div>
							</div>
							<div class="form-group row>
								<label for="Description" class="col-sm-2 col-form-label"></a> Description du produit:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control border-success" name="Description" id="Description" >
									<span id="pasnom"></span>
								</div>
							</div>					
				</fieldset>
		
			
		</div>
</html>