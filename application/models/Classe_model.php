<?php
defined('BASEPATH') OR exit ('No direct script access allowed');


class Classe_model extends CI_Model
{
    public function Classe($id)
    {
        $requete = $this->db->query("SELECT * FROM classe WHERE id_type=?", array($id));
        $classe = $requete->result();
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
