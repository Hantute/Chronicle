<?php
defined('BASEPATH') OR exit ('No direct script access allowed');


class Classe_model extends CI_Model
{
    public function Classe($id_classe)
    {
        $requete = $this->db->query("SELECT * FROM Classe JOIN type ON classe.id_type = type.id_type WHERE id_classe=?", array($id_classe));
        $classe = $requete->row();
        return $classe;
    }
   
    public function liste($id_type)
    {
        $requete = $this->db->query("SELECT * FROM classe
        JOIN type ON classe.id_type= type.id_type WHERE id_type=?", array($id_type));
        $classe = $requete->result();
        return $classe;
    }
}
?>