<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** \brief      Contient toute les fonctions se rapportant à la table categorie.
 *  \class      [categorie] de la BDD chronicle
 *  \brief      Création de la class parente categorie extension de la classe CI_Controller chargé de gérer toute les functions se rapportant à la table categorie de la BDD chronicle
 *  \details    Elle est composé de 7 fonctions "public": Accueil, liste, ajout, modif, supprime, detail, presentation
 *  @author     AHantute
 *  \date       11/10/2019
 */

class Categorie extends CI_Controller
{    
    
    public function listeC()
    {
        $this->load->model('Categorie_model');
        $listeC=$this->Categorie_model->listeCM();
        $aView['Categorie']=$listeC;
        
        $this->load->view('categorie/listeCat',$aView);
    }
    
//******************************************************************************    
    public function listeSubC($id)
    {
        $this->load->model('Categorie_model');
        $listeSubC=$this->Categorie_model->listeSubCatM($id);
        $aView['SubCategorie']=$listeSubC;
        
        $this->load->view('categorie/listeSubCat',$aView);
    }
  
    
}