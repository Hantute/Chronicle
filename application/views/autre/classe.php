<option selected disabled>Selectionner une classe</option>
<?php foreach ($classe as $C):
     var_dump($C);
     var_dump($C->classe_vaisseau);?>
    <option value="<?= $C->id_classe ?>"><?= $C->nom_classe ?>
    </option>
<?php endforeach; ?>
