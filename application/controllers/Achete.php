<?php
defined ('BASEPATH') OR exit ("No direct script access allowed");


class Achete extends CI_Controller
{
    
    public function panierA($id)
    {
        $titre="Panier de l'utilisateur";
        $aView['titre']=$titre;
        
        $this->load->model('Achete_model');
        $panier=$this->Achete_model->panierA($id);
        
        $aView['panier']=$panier;
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
    
//******************************************************************************
    
    public function modifProdA()
    {
        
    }
    
//******************************************************************************    
    
    public function supprimeProdA()
    {
        
    }
    
}