<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
?>

<!DOCTYPE>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="modification d'un produit" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Modifier un produit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/Accueilbootstrap.css"); ?>">
</head>
<body>
  <header>
    <p style=font-size:200%>Modifier un produit</p>
  </header>
      <nav>
        <a href="<?php echo site_url("Produit/liste"); ?>">Liste des produits</a>
      </nav>
    <div class="container-fluid">
        <h1 class="text-center">Modifier/Actualiser un produit</h1>
            <?php echo form_open_multipart();
                    echo validation_errors();
                      if (isset ($sErreurs))
                      {
                        var_dump($sErreurs);
                        echo $sErreurs;
                      }  ?>

        <fieldset>
          <legend> Caractéristique du produit à modifier/actualiser</legend>
            <p class="text-danger"><b>* Ces zones sont obligatoires pour valider le formulaire de modification du produit</b></p>
                <div class="form-group row">
                  <label for="nom_produit" class="col-sm-2 col-form-label"><a class="text-danger" value="<?php echo $modif->nom_produit;?> ">*</a>Nom du produit :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control border-success" name="nom_produit" value="<?php echo $modif->nom_produit;?>" required />
                    <span id="pasnom"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="stock_produit" class="col-sm-2 col-form-label"><a class="text-danger">*</a>Quantité en stock/réserve :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control border-success" name="stock_produit" value="<?php echo $modif->stock_produit;?> "required />
                    <span id="passtock"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="prix_produit" class="col-sm-2 col-form-label"><a class="text-danger">*</a>Prix de vente à l'unité :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control border-success" name="prix_produit" value="<?php echo $modif->prix_produit;?> "required />
                    <span id="pasprix"></span>
                  </div>

                  <!--  Zone pour la modification de la catégorie-->

                </div>
                <div class="form-group row">
                  <label for="Description" class="col-sm-2 col-form-label">Description du produit :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control border-success" name="Description" value="<?php echo $modif->Description;?> "required />
                    <span id="pasdes"></span>
                  </div>
                </div>

        </fieldset>
        <h2> Le produit va être mis à jour</h2>

        <input type="submit" name="modifier" id="modifier" value="modifier" ></button>
        <input type="reset" name="effacer" id="effacer" value="effacer"></button>
          </form>
    </div>
</body>
</html>
