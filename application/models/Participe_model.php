<?php
defined ("BASEPATH") OR exit ("No direct script access allowed");

class Participe_model extends CI_Model
{

    public function liste()
    {
      $requete = $this->db->query ("SELECT * FROM participe JOIN vaisseau ON vaisseau.id_vaisseau = participe.id_vaisseau");
      $aparticipe = $requete->result();
      return $aparticipe;
    }

    public function rapport()
    {
      $requete = $this->db->query("SELECT * FROM participe JOIN vaisseau ON vaisseau.id_vaisseau = participe.id_vaisseau");
      $arapport = $requete->result();
      return $arapport;
    }

    public function ajout() 
    {
        $data = $this->input->post();
        unset ($data["envoyer"]);
        var_dump($data);
        $this->db->insert ('participe', $data);
    }
    
    
    public function Choix_vaisseau($id)
    {
        $requete = $this->db->query("SELECT * FROM participe WHERE id_bataille=?", array($id));
        $choix = $requete->result();
        return $choix;   
    }
    
}
