

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
 integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>

<!--lien vers une page css pour faire la mise en forme de la page de présentation -->
<link rel="stylesheet" href="<?php echo base_url("assets/css/Accueilbootstrap.css");?>">
 <link rel="stylesheet" href="<?php echo base_url("assets/css/Menu.css"); ?>"> 


        <?php echo form_open_multipart();
		echo validation_errors();
		if(isset($Erreurs))
		   {
		    var_dump($Erreurs);
                    echo $Erreurs;
                    }?>
       
            <fieldset>
                <legend>Merci de bien vouloir remplir les champs demandés</legend>
                <p class="text-danger"><b> * Ces zones sont obligatoires pour valider votre rapport de bataille</b></p>
                <div class="form-group row">
                    <label for="id_bataillle" class="col-sm-2 col-form-label"><a class="text-danger">*</a> Nom de la bataille:</label>
                        <div class="col-sm-4">
                            <select name="id_bataille" id="id_bataille" class="form-control">
				<option selected disabled> Sélectionnez une bataille</option>
                                    <?php
					foreach($bataille as $rowb): ?>
					<option value="<?= $rowb->id_bataille?>"><?= $rowb->lieu_bataille?></option>
                                    <?php endforeach; ?>
                            </select>
                            <span id="pasbataille"></span>
                        </div>
                </div>
                <div class="form-group row">
                    <label for="id_vaisseau_label" class="col-sm-2 col-form-label"><a class="text-danger">*</a> Nom du Vaisseau:</label>
                    <div class="col-sm-4" >
                        <select name="id_vaisseau" id="id_vaisseau" class="form-control">

			</select>

                            <span id="pasvaisseau"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Rapport" class="col-sm-2 col-form-label"><a class="text-danger">*</a> Rapport de combat du vaisseau pour cette bataille:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control border-success" name="Rapport" id="Rapport" required>
                        <span id="pasrapport"></span>
                    </div>
                </div>
                <div for="date_combat" id="date_combat" name="date_combat">

                </div>
            </fieldset>
            <button type="submit" name="envoyer" id="envoyer">Archiver le rapport</button>
            <button type="reset" name="effacer" id="effacer">effacer le rapport</button>
            <?php form_close();?>
            
            <script>
                $("#id_vaisseau_label").hide();
                $("id_vaisseau").hide();
                $("#id_bataille").change(function ()
                    {
                        $("id_vaisseau").show();
                        let id_bataille = $("#id_bataille").val();
                            $("#id_vaisseau").load("http://localhost/Ci_FilRouge/index.php/Participe/Choix_vaisseauP/"+id_bataille);
                            $("#date_combat").load("http://localhost/Ci_FilRouge/index.php/Participe/Selection_date/"+id_bataille);

                    });
            </script>
                       
