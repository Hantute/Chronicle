<?php
defined ('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Groupe_de_combat extends CI_Controller
{
    
    
    public function choixGroupe($id)
    {
        //echo"Bonjour";
       $this->load->model('Groupe_model');
       $groupe = $this->Groupe_model->Choix($id);
       $aView["groupe"]=$groupe;
       $this->load->view("autre/groupe", $aView);
        
    }
    
    
}
