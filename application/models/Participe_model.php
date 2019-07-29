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

}
