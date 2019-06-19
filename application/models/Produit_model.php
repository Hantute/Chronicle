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
            JOIN vaisseau ON produit.id_vaisseau = vaisseau.id_vaisseau WHERE id_produit=?", array($id_produit));
            $adetail = $requete->row();
            return $adetail;
        }
    
    
        public function ajout()
        {
            $Date = date ("Y-m-d");
            $data = $this->input->post();
            //$name=$_FILES["photo_produit"]["name"];
            //$extension = pathinfo($name,PATHINFO_EXTENSION);
            unset($data["envoyer"]);
            $data["date_ajout"]=$Date;
            //$data["photo_produit"]=$extension;
            //$this->db->insert('produit',$data);
            //return $extension;
        }
    
        public function modification()
        {
            $Date = date("Y-m-d H:i:s");
            $data = $this->input->post();
            unset($data["modifier"];
            $id= $this->input->post('id_produit');
            $this->db->where('id_produit',$id);
            $this->db->update('produit', $data);
            
        }
    
}