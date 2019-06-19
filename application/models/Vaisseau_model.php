<?php
if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Vaisseau_model extends CI_Model
{
  
        public function liste()
        {
            $requete = $this->db->query("SELECT * FROM vaisseau 
            JOIN classe ON vaisseau.id_classe=classe.id_classe 
            JOIN type ON classe.id_type=type.id_type");
            $aliste= $requete->result();
            return $aliste;
        }
        
        public function detail($id_vaisseau)
        {
            $requete = $this->db->query("SELECT * FROM vaisseau
                       JOIN classe ON vaisseau.id_classe=classe.id_classe
                       JOIN type ON classe.id_type=type.id_type WHERE id_vaisseau=?", array($id_vaisseau));
            $detail = $requete->row();
            return $detail;
        }
        
        public function ajout()
        {
            $aleatoire = rand(1300,1500);
            $jour = rand(06,28);
            $mois = rand(03,12);
            $jour2 = rand(01,28);
            $mois2 = rand(01,12);
            $jour3 = rand(01,28);
            $mois3 = rand(01,12);
            $date =($aleatoire."-".$mois."-".$jour);
            $date2 = (($aleatoire-$jour).'-'.$mois2."-".$jour2);
            $date3 = (($aleatoire+$mois).'-'.$mois3."-".$jour3);
            
            $data = $this->input->post();
            //$photo=$_FILES["photo_vaisseau"]["name"];
            unset($data["envoyer"]);
            
            $data["date_lancement"]=$date;
            $data["date_construction_modele"]=$date2;
            $data["date_activation"]=$date3;
            
            //$data["photo_vaisseau"] = $photo;
            $this->db->insert('vaisseau',$data);
            //return $photo;
        }
        
        
}
?>

