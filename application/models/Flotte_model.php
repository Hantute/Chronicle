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
}
?>
