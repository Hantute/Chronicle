<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titre ;?></title>
    </head>
    <body>
        <?php echo $Salutation;
        echo $citation; ?>
        <h5>.. Mise à jour des Archives de la bibliothéque centrale</h5>
        <h5>.. Création d'une nouvelle entrée</h5>
        <h3>.. Ajout d'une nouvelle bataille </h3>
        <?php
        
        
        echo form_open_multipart();
        echo validation_errors();
        /*if(isset($Erreur));
        {
            var_dump($Erreur);
            echo $Erreur;
        }*/
        ?>
        <fieldset>
            <legend>Veuillez entrer les paramètres de la bataille</legend>
            <p class='text-danger'><b>* Ces zones sont obligatoires pour valider le formulaire d'enregistrement de la bataille dans les archives</b></p>
            <div class='form-group_row'>
                <label for='nom_bataille_label' class='col-sm-2 col-form-label'><p class="text-danger">*</p> Nom de la bataille </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control border-success" name='nom_bataille' id='nom_bataille' required>
                    <span id='pasnom_bataille'></span>
                </div>    
            </div>
            <div class='form-group_row'>
                <label for='lieu_bataille_label' class='col-sm-2 col-form-label'><p class="text-danger">*</p> lieu de la bataille </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control border-success" name='lieu_bataille' id='lieu_bataille' required>
                    <span id='paslieu_bataille'></span>
                </div>    
            </div>
            <div class='form-group_row'>
                <label for='recit_bataille_label' class='col-sm-2 col-form-label'><p class="text-danger">*</p> Récit de la bataille </label>
                <div class="col-sm-8">
                    <input type="text-area" class="form-control border-success" name='recit_bataille' id='recit_bataille' required>
                    <span id='pasrecit_bataille'></span>
                </div>    
            </div>
            <div class='form-group_row'>
                <label for='date_debut_bataille_label' class='col-sm-2 col-form-label'><p class="text-danger">*</p> date du début de la bataille </label>
                <div class="col-sm-8">
                    <input type="date" class="form-control border-success" name='date_debut_bataille' id='date_debut_bataille' required>
                    <span id='pasdebut_bataille'></span>
                </div>    
            </div>
            <div class='form-group_row'>
                <label for='date_fin_bataille_label' class='col-sm-2 col-form-label'><p class="text-danger">*</p> date de la fin de la bataille </label>
                <div class="col-sm-8">
                    <input type="date" class="form-control border-success" name='date_fin_bataille' id='date_fin_bataille' required>
                    <span id='pasfin_bataille'></span>
                </div>    
            </div>
            
        </fieldset>
        <button type="submit" name="envoyer" id="envoyer" value="envoyer"> Envoyer</button>
	<button type="reset" name="effacer" id="effacer" value="effacer"> Effacer</button>
        <?php echo form_close();?>
    </body>
</html>
