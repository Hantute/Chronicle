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

        public function detail($id_vaisseau)
        {
            $requete = $this->db->query("SELECT * FROM vaisseau
                       JOIN classe ON vaisseau.id_classe=classe.id_classe
                       JOIN type ON classe.id_type=type.id_type WHERE id_vaisseau=?", array($id_vaisseau));
            $detail = $requete->row();
            return $detail;
        }

        public function statut($id_vaisseau)
        {
          $requete = $this->db->query("SELECT * FROM vaisseau
          JOIN statut ON statut.id_statut = vaisseau.id_statut WHERE vaisseau.id_vaisseau=?", array($id_vaisseau));
          $Vstatut = $requete->row();
          return $Vstatut;
        }

        public function Vaisseau($id)
        {
          $requete = $this->db->query("SELECT * FROM vaisseau WHERE id_classe=?", array($id));
          $vaisseau = $requete->result();
          return $vaisseau;
        }

        public function VaisseauNom($id)
        {
          $requete = $this->db->query("SELECT * FROM vaisseau WHERE id_classe=?", array($id));
          $vaisseau = $requete->result();
          return $vaisseau;
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
            unset($data["id_type"]);
            $data["id_statut"] = 4;

            $data["date_lancement"]=$date;
            $data["date_construction_modele"]=$date2;
            $data["date_activation"]=$date3;

            //$data["photo_vaisseau"] = $photo;
            $this->db->insert('vaisseau',$data);
            //return $photo;
        }

        public function modification($id_vaisseau)
        {
          $data = $this->input->post();
          var_dump($id_vaisseau);

          $Date=date("Y-m-d H:i:s");
          unset($data["id_vaisseau"]);
          unset($data["modifier"]);
          $data["mise_a_jour"] = $Date;

          var_dump($data);
          var_dump($id_vaisseau);

          //$id = $this->input->get("id_vaisseau");
          $this->db->WHERE('id_vaisseau', $id_vaisseau);
          $this->db->UPDATE('vaisseau',$data);
        }
}
?>
