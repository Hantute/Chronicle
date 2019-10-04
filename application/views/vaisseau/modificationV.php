<?php
if (!defined('BASEPATH')) exit ('No direct script access allowed');
?>
              <h1 class="text-center"> Quels sont les modifications que vous souhaitez effectuer ?</h1>
              <?php echo form_open_multipart();
                    echo validation_errors();
                    if(isset($Erreurs))
                    {
                        var_dump($Erreurs);
                        echo $Erreurs;
                    }?>

              <fieldset>
                <legend>Veuillez rentrer les données nécéssaires pour définir les améliorations que vous désirez faire sur votre vaisseau de combat</legend>
      						<p class="text-danger"><b>* Ces données sont obligatoires pour confirmer que votre navire répond aux caractéristiques demandés</b></p>

                      <div class="form-group row">
                        <label for="id_vaisseau" class="col-sm-2 col-form-label">Matricule du vaisseau </label>
                        <div class="col-sm-6">
                          <input type="input" class="form-control border-success" name="id_vaisseau" id="id_vaisseau" value="<?= $modif->id_vaisseau; ?>" required>
                          <span id="pasvaisid"></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nom_vaisseau" class="col-sm-2 col-form-label">Nom du vaisseau </label>
                        <div class="col-sm-6">
                          <input type="input" class="form-control border-success" name="nom_vaisseau" id="nom_vaisseau" value="<?= $modif->nom_vaisseau; ?>" required>
                          <span id="pasvaisnom"></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="chantier_de_construction" class="col-sm-2 col-form-label">Chantier de construction du vaisseau </label>
                        <div class="col-sm-6">
                          <input type="input" class="form-control border-success" name="chantier_de_construction" id="chantier de construction" value="<?= $modif->chantier_de_construction; ?>" required>
                          <span id="paschantier"></span>
                        </div>
                      </div>
                      <legend> Date donné en suivant le calendrier spatial universel actuellement en cours</legend>
                      <div>
                        <p> Date de construction de la coque du vaisseau : <?php echo $modif->date_construction_modele; ?></p>
                      </div>
                      <div>
                        <p> Date de lancement du vaisseau : <?php echo $modif->date_lancement; ?></p>
                      </div>
                      <div>
                        <p> Date d'activation du vaisseau, intégration dans un groupe de combat: <?php echo $modif->date_activation; ?></p>
                      </div>
                      <div>
                        <p> Date de modernisation/remodelage vaisseau: <?php echo $modif->mise_a_jour; ?></p>
                      </div>
                      <div class="form-group row">
                        <label for="armement" class="col-sm-2 col-form-label">Armement du vaisseau </label>
                        <div class="col-sm-6">
                          <input type="input" class="form-control border-success" name="armement" id="armement" value="<?= $modif->armement; ?>" required>
                          <span id="pasarme"></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="protection" class="col-sm-2 col-form-label">Système de défense du vaisseau </label>
                        <div class="col-sm-6">
                          <input type="input" class="form-control border-success" name="protection" id="protection" value="<?= $modif->protection; ?>" required>
                          <span id="pasprotect"></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="generateur" class="col-sm-2 col-form-label">Module de génération d'energie et système de propulsion du vaisseau </label>
                        <div class="col-sm-6">
                          <input type="input" class="form-control border-success" name="generateur" id="generateur" value="<?= $modif->generateur; ?>" required>
                          <span id="pasenergie"></span>
                        </div>
                      </div>
                      <!--<div class="form-group row">
                        <label for="id_statut" class="col-sm-2 col-form-label">Statut actuelle du vaisseau et de son équipage</label>
                        <div class="col-sm-6">
                          <input type="input" class="form-control border-success" name="id_statut" id="id_statut" value="<?//= $statut->nom_statut; ?>" required>
                          <span id="pasvaisid"></span>
                        </div>
                      </div>-->
              </fieldset>
                  <h2> Le vaisseau va être remodelé et remis à niveau</h2>

                  <input type="submit" name="modifier" id="modifier" value="modifier" ></button>
                	<input type="reset" name="effacer" id="effacer" value="effacer"></button>
                		</form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>
