<?php foreach ($vaisseau as $V):
     var_dump($V);
     var_dump($V->id_vaisseau);?>
    <option value="<?= $V->id_vaisseau ?>"><?= $V->nom_vaisseau ?>
    </option>
<?php endforeach; ?>
