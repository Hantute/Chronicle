<script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>


<a class='text-danger'>ATTENTION la date est en modèle anglo-saxon: AAAA-MM-JJ</a>
<?php
    foreach ($selection_date as $row):
         ?>
          <div for="date_combat" id="date_combat" name="date_combat">


        <label for="date_debut_combat" class="col-sm-2"><a class="text-primary">Date de début de la bataille :</a> </label>
            <text for="date_debut" class="col-sm-3 text-danger" id="date_debut" name="date_debut"><?php echo $row->date_debut_bataille; ?> </text>
        <label for="date_fin_combat" class="col-sm-2"><a class="text-primary">Date de fin de la bataille :</a> </label>
            <text for="date_fin" class="col-sm-3 text-danger" id="date_fin" name="date_fin"><?php echo $row->date_fin_bataille; ?></text>
            <div class="form-group row">
                    <label for="date_participation" class="col-sm-2 col-form-label"><a class="text-danger">*</a>Date d'engagement:</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control border-success" name="date_participation" id="date_participation" value="<?php echo $row->date_debut_bataille;; ?>"required>
                        <span id="pasdatepart"></span>
                    </div>
                    <label for="date_repli" class="col-sm-2 col-form-label"><a class="text-danger">*</a>Date de repli ou destruction :</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control border-success" name="date_repli" id="date_repli" value="<?php echo $row->date_fin_bataille; ?>"required>
                        <span id="pasdaterepli"></span>
                    </div>
                </div>

            <!-- faire tout cela en controleur php et renvoyer les données ou un message d'erreurs sur la page -->
            <script>
                $debut= $("#date_participation").val();
                $fin= $("#date_repli").val();
                console.log($debut);
                console.log($fin);

            $("#date_participation").change(function()
            {
                let $engagement = $("#date_participation").val();
                let $repli= $("#date_repli").val();
                console.log($engagement);
                console.log($repli);
                console.log($debut);
                console.log($fin);

                
                if($debut<$engagement && $engagement<$fin){
                    console.log("bonjour01");
                    
                }
                else
                {
                    console.log("bonjour02");
                    $engagement=$debut;
                    console.log($engagement);
                    $("#date_participation").appendTo("#date_participation").val($engagement);
                }
            });
            $("#date_repli").change(function()
            {
                let $engagement = $("#date_participation").val();
                let $repli= $("#date_repli").val();
                if($engagement<$repli && $repli<$fin){
                    $repli=$repli;
                    console.log("bonjour03");
                    console.log($fin);
                    console.log($repli);
                }
                else
                {
                    $repli=$fin;
                    console.log("bonjour04");
                    console.log($repli);
                    $("#date_repli").appendTo("#date_repli").val($repli);
                }
            });
            </script>

        <?php endforeach; ?>
   </div>
