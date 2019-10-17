<?php
if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Produit_model extends CI_Model
{


        public function liste()
        {
            $requete = $this->db->query(" SELECT * FROM produit
              JOIN vaisseau ON produit.id_vaisseau = vaisseau.id_vaisseau");
            $aliste = $requete->result();
            return $aliste;
        }


        public function detail($id_produit)
        {
            $requete = $this->db->query ("SELECT * FROM produit
              JOIN vaisseau ON produit.id_vaisseau = vaisseau.id_vaisseau
              JOIN classe ON vaisseau.id_classe=classe.id_classe
              JOIN type ON classe.id_type=type.id_type
              WHERE id_produit=?", array($id_produit));
            $adetail = $requete->row();
            return $adetail;
        }

        public function ProduitVaisseau($id_vaisseau)
        {
          $requete = $this->db->query("SELECT * FROM produit
            WHERE id_vaisseau=?", array($id_vaisseau));
          $ProduitVaisseau = $requete->result();
          return $ProduitVaisseau;

        }

        public function ajout()
        {
            $Date = date ("Y-m-d");
            $data = $this->input->post();
            //$name=$_FILES["photo_produit"]["name"];
            //$extension = pathinfo($name,PATHINFO_EXTENSION);
            unset($data["envoyer"]);
            unset($data['id_type']);
            unset($data['id_classe']);
            $data["date_ajout"]=$Date;
            //$data["photo_produit"]=$extension;
            $this->db->insert('produit',$data);
            //return $extension;
        }

        public function modification()
        {
            $Date = date("Y-m-d H:i:s");
            $data = $this->input->post();
            unset($data['modifier']);
            $id= $this->input->post('id_produit');
            $this->db->where('id_produit',$id);
            $this->db->update('produit', $data);
        }

        public function Categorie($categorie_produit)
        {
          $requete = $this->db->query("SELECT * FROM produit
          JOIN vaisseau ON produit.id_vaisseau = vaisseau.id_vaisseau
          WHERE id_categorie=?", array($categorie_produit));
          $categorie = $requete->result();
          return $categorie;
        }

}
