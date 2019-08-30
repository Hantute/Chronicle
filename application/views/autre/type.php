<?php foreach ($type_produit as $T):?>
    <option value="<? = $T->id_type ?>"><? = $T->nom_type ?>
    </option>
<?php endforeach; ?>
