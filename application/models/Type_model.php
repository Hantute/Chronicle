<?php
if (! defined('BASEPATH')) exit ('No direct script access allowed');


class Type_model extends CI_Model
{
    
            
        public function type()
        {
            $requete = $this->db->query("SELECT * FROM type
            JOIN classe ON type.id_type = classe.id_type
            JOIN vaisseau ON vaisseau.id_classe = classe.id_classe WHERE id_vaisseau=?", array($id_vaisseau));
            $atype = $requete->result();
            return $atype;
        }

        public function liste()
        {
            $requete = $this->db->query("SELECT * FROM type");
            $atype= $requete->result();
            return $atype;
        }
}