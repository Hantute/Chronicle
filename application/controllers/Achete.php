<?php
defined ('BASEPATH') OR exit ("No direct script access allowed");

/** 
 * Class Achete
 * 
 * Permet de générer les functions lié à la table Achete
 */

class Achete extends CI_Controller
{
    /**     \Brief      Fonction panierA qui permet d'afficher les factures d'un utilisateur 
     *      \details    Elle permet d'afficher la liste des factures de l'utilisateur spécifiques
     *      \param      titre       Affiche le titre de la page
     *      \param      facture       Affiche le résultat de la requete SQL.
     *      \param      aView       Permet de transférer les données récupérer sur la page View
     *      \@author    Aurélien Hantute
     *      \date       26/11/2019    
     */ 
    
    public function panierA($id)
    {
        $titre="Factures de l'utilisateur";
        $aView['titre']=$titre;
        
        $this->load->model('Achete_model');
        $facture=$this->Achete_model->listeA($id);
        
        $aView['facture']=$facture;
        $this->load->view('achete/panierA',$aView);
    }

//******************************************************************************
    
    public function commandeA()
    {
     
        
        
    }
    
//******************************************************************************    
    
    public function ajoutProdA()
    {
        
        
    }

}