
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
                            $("#id_vaisseau").load("http://localhost/Ci_FilRouge/index.php/Participe/Choix_vaisseau/"+id_bataille);
                            $("#date_combat").load("http://localhost/Ci_FilRouge/index.php/Participe/Selection_date/"+id_bataille);

                    });
            </script>
                       


		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		 integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		 crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		 integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		 crossorigin="anonymous"></script>
