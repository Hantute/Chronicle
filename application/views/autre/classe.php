<?php foreach ($classe as $C):
     var_dump($C);
     var_dump($C->classe_vaisseau);?>
    <option value="<?= $C->id_classe ?>"><?= $C->classe_vaisseau ?>
    </option>
<?php endforeach; ?>
