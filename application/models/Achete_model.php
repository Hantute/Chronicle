<?php
defined ('BASEPATH') OR exit('No script access allowed');

class Achete_model extends CI_Model
{
    
    public function ajoutA($data)
    {
    $this->db->insert('achete',$data);        
    }  
    
    public function listeA($id_client)
    {
        $requete=$this->db->query("SELECT * FROM achete WHERE id_client=?",array($id_client));
        $facture=$requete->result();
        return $facture;
    }
    
  
}


