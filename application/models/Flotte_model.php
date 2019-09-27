<?php

defined("BASEPATH") OR exit ("No direct script access allowed");

/**
 *
 */
class Flotte_model extends CI_Model
{

  public function Liste()
  {
    $requete = $this->db->query("SELECT * FROM flotte");
    $flotte = $requete->result();
    return $flotte;
  }
  
  public function ChoixFlotte($id)
  {
      $requete = $this->db->query("SELECT * FROM flotte WHERE id_flotte=?",array($id));
      $flotte= $requete->row();
      return $flotte;
  }        
}
?>
