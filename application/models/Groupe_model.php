<?php
defined("BASEPATH") OR exit ("No direct script access allowed");

/**
 *
 */
class Groupe_model extends CI_Model
{

  public function liste()
  {
    // code...
    $requete =$this->db->query ("SELECT * FROM groupe_de_combat ");
    $Gliste = $requete->result();
    return $Gliste;
  }
  
  public function Choix($id)
  {
      $requete = $this->db->query("SELECT * FROM groupe_de_combat WHERE flotte_id_flotte=?", array($id));
      $groupe = $requete->result();
      return $groupe;
  }
  
  public function ChoixVaisseau($id)
  {
      $requete = $this->db->query("SELECT * FROM groupe_de_combat WHERE id_groupe=?", array($id));
      $choixVaisseau = $requete->row();
      return $choixVaisseau;
  }        
}






 ?>
