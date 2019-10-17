<?php
if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Vaisseau_model extends CI_Model
{

        public function liste()
        {
            $requete = $this->db->query("SELECT * FROM vaisseau
            JOIN classe ON vaisseau.id_classe=classe.id_classe
            JOIN type ON classe.id_type=type.id_type");
            $Vliste= $requete->result();
            return $Vliste;
        }

//******************************************************************************        
        public function detail($id_vaisseau)
        {
            $requete = $this->db->query("SELECT * FROM vaisseau
                       JOIN classe ON vaisseau.id_classe=classe.id_classe
                       JOIN type ON classe.id_type=type.id_type WHERE id_vaisseau=?", array($id_vaisseau));
            $detail = $requete->row();
            return $detail;
        }

//******************************************************************************
        public function statut($id_vaisseau)
        {
          $requete = $this->db->query("SELECT * FROM vaisseau
          JOIN statut ON statut.id_statut = vaisseau.id_statut WHERE vaisseau.id_vaisseau=?", array($id_vaisseau));
          $Vstatut = $requete->row();
          return $Vstatut;
        }

//******************************************************************************        
        public function Vaisseau($id)
        {
          $requete = $this->db->query("SELECT * FROM vaisseau WHERE id_classe=?", array($id));
          $vaisseau = $requete->result();
          return $vaisseau;
        }

//******************************************************************************        
        public function VaisseauNom($id)
        {
          $requete = $this->db->query("SELECT * FROM vaisseau WHERE id_classe=?", array($id));
          $vaisseau = $requete->result();
          return $vaisseau;
        }

//******************************************************************************        
        public function ajout($data)
        {
            //$photo=$_FILES["photo_vaisseau"]["name"];
            unset($data["envoyer"]);
            unset($data["id_type"]);
            unset($data["id_flotte"]);

            $Date = date("Y-m-d");
            $data["date_activation"]=$Date;
            
            //$data["photo_vaisseau"] = $photo;
            $this->db->insert('vaisseau',$data);
            //return $photo;
        }

//******************************************************************************        
        public function modification($id_vaisseau)
        {
          $data = $this->input->post();
          var_dump($id_vaisseau);

          $Date=date("Y-m-d H:i:s");
          unset($data["id_vaisseau"]);
          unset($data["modifier"]);
          $data["mise_a_jour"] = $Date;

          $this->db->WHERE('id_vaisseau', $id_vaisseau);
          $this->db->UPDATE('vaisseau',$data);
        }

//******************************************************************************        
        public function choix_vaisseau()
        {
            $requete = $this->db->query ("SELECT * FROM vaisseau");
            $choix_vaisseau = $requete->result();
            return $choix_vaisseau;
        }

//******************************************************************************        
        public function Groupe_Vaisseau($id)
        {
            $requete = $this->db->query("SELECT * FROM vaisseau 
                JOIN classe ON vaisseau.id_classe=classe.id_classe
                JOIN type ON classe.id_type=type.id_type
                WHERE id_groupe=?",array($id));
            $GroupeV= $requete->result();
            return $GroupeV;
        }
        
}

?>
