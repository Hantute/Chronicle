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
}






 ?>
