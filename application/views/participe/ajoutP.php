
        <?php echo form_open_multipart();
		echo validation_errors();
		if(isset($Erreurs))
		   {
                    echo $Erreurs;
                    }?>
            <fieldset>
                <legend>Merci de bien vouloir remplir les champs demandés</legend>
                <p class="text-danger"><b> * Ces zones sont obligatoires pour valider votre rapport de bataille</b></p>
                <div class="form-group row">
                    <label for="id_bataillle_label" class="col-sm-2 col-form-label"><a class="text-danger">*</a> lieu de la bataille:</label>
                    <div class="col-sm-4">
                        <select name="id_bataille" id="id_bataille" class="form-control">
                            <option selected disabled> Sélectionnez un système</option>
                            <?php
                                foreach($bataille as $rowb): ?>
				<option value="<?= $rowb->id_bataille?>"><?= $rowb->lieu_bataille?></option>
                            <?php endforeach; ?>
                        </select>
                        <span id="pasbataille"></span>
                    </div>
                </div>
                <div class='form-group row'>
                    <label for='nom_bataille_label' id='nom_bataille_label' class='col-sm-2 col-form-label'><a class='text-danger'>*</a>Nom de la Bataille</label>
                    <div class='col-sm-4'>
                        <select name='nom_bataille' id='nom_bataille' class='form-control'>        
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_vaisseau_label" id="id_vaisseau_label" class="col-sm-2 col-form-label"><a class="text-danger">*</a> Nom du Vaisseau:</label>
                    <div class="col-sm-4" >
                        <select name="id_vaisseau" id="id_vaisseau" class="form-control">
			</select>
                        <span id="pasvaisseau"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Rapport" class="col-sm-2 col-form-label"><a class="text-danger">*</a> Rapport de combat du vaisseau pour cette bataille:</label>
                    <div class="col-sm-8">
                        <textarea type="input" class="form-control border-success" name="Rapport" id="Rapport" required></textarea>
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
                $("#id_vaisseau").hide();
                $("#nom_bataille_label").hide();
                $("#nom_bataille").hide();
                $("#id_bataille").change(function ()
                    {
                        $("#id_vaisseau_label").show();
                        $("#id_vaisseau").show();
                        $("#nom_bataille_label").show();
                        $("#nom_bataille").show();
                        let id_bataille = $("#id_bataille").val();
                            $("#nom_bataille").load("http://localhost/ci_FilRouge/index.php/Bataille/nom_batailleB/"+id_bataille);
                            $("#id_vaisseau").load("http://localhost/Ci_FilRouge/index.php/Participe/Choix_vaisseauP/"+id_bataille);
                            $("#date_combat").load("http://localhost/Ci_FilRouge/index.php/Participe/Selection_date/"+id_bataille);

                    });
            </script>
                       
