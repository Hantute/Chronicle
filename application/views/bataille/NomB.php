
<option selected disabled> Sélectionnez un nom de bataille</option>
    <?php
    foreach ($Nom as $row):?>
	<option><?= $row->nom_bataille?></option>
    <?php endforeach; ?>


