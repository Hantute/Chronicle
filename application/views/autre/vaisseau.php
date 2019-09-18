<?php foreach ($vaisseau as $V){
    $id=0;
        foreach($choix as $C)
        {
            if($V->id_vaisseau != $C->id_vaisseau)
                {
                $id= $id + $V->id_vaisseau;
                var_dump($id);
                }
        }        
        if($V->id_vaisseau!= $id)
        {
            var_dump($id);
            echo "<option value=".$V->id_vaisseau. ">". $V->nom_vaisseau. "</option>"; 
        } 
} ?>

                    