<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

/** \brief      Contient toute les fonctions se rapportant à la table categorie.
 *  \class      [categorie] de la BDD chronicle
 *  \brief      Création de la class parente categorie extension de la classe CI_model chargé de gérer toute les functions se rapportant à la table categorie de la BDD chronicle
 *  \details    Elle est composé de 7 fonctions "public": listeCM() , listeSubCatM();
 *  @author     AHantute
 *  \date       11/10/2019
 */

class Categorie_model extends CI_Model
{
    public function listeCat()
    {
        $requete=$this->db->query("SELECT * FROM categorie ");
        $listecCat=$requete->result();
        return $listecCat; 
    }
    
    public function listeCM()
    {
        $requete=$this->db->query("SELECT * FROM categorie WHERE derive_categorie = '0'");
        $listecCat=$requete->result();
        return $listecCat;
    }
    
//******************************************************************************    
    public function listeSubCM($id)
    {
        $requete=$this->db->query("SELECT * FROM categorie WHERE derive_categorie =?", array($id));
        $listeSubCat=$requete->result();
        return $listeSubCat;
    }

//******************************************************************************    
    public function DetailCat($id)
    {
        $requete=$this->db->query("SELECT * FROM categorie WHERE id_categorie =?", array($id));
        $DetailCat=$requete->row();
        return $DetailCat;
    }
    
}


