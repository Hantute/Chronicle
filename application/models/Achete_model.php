<?php
defined ('BASEPATH') OR exit('No script access allowed');

class Achete_model extends CI_Model
{
    
    public function panierA()
    {
        
    }
    
    public function ajoutA($data)
    {
    $this->db->insert('achete',$data);        
    }   
}


