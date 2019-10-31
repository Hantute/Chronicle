<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<h4 class='modal-title'>Rapport de combat du <?php echo $VaisseauV->nom_vaisseau ;?></h4>
                <p> <?php
                    {
                    echo $RapportP->rapport;
                    }
                ?></p>
<link rel="stylesheet" href="<?php echo base_url("assets/css/GestionModal.css");?>">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
crossorigin="anonymous">
</script>


