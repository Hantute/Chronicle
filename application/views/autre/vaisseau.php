<?php 
var_dump($vaisseau);
var_dump($choix);
echo 'TEST01';

// On fait un tri pour récupérer les vaisseaux n'ayant pas encore fait de rapport de cette bataille.
// On fait une première boucle pour choisir tout les vaisseaux de la liste.
// Si le vaisseau à déja fait un rapport, $id prend la valeur de l'id du vaisseau, sinon, il reste à 0.
// Ensuite, on ne prend que les vaisseaux dont $id ne correspond pas à l'id du vaisseau.
foreach ($vaisseau as $V){
    $id=0;
        foreach($choix as $C)
        {           
            if($V->id_vaisseau == $C->id_vaisseau)
                {
                echo "Bonjour";
                $id= $id + $V->id_vaisseau;
                var_dump($id);
                var_dump($V);
                }
        }        
        if($V->id_vaisseau!= $id)
        {
            echo "Bonsoir";
            var_dump($id);
            echo "<option value=".$V->id_vaisseau. ">". $V->nom_vaisseau. "</option>"; 
        } 
} ?>

                    