<?php
defined ('BASEPATH') OR exit ("No direct script access allowed");

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Bataille extends CI_Controller
{
    /**     \Brief      Fonction liste qui permet d'afficher la liste des batailles 
     *      \details    Elle permet d'afficher la liste des batailles organiser selon les flottes de combats avec les groupes et les détails sur les vaisseaux y ayant participer
     *      \param      titre       Affiche le titre de la page
     *      \param      citation    Affiche le résultat de la library citation
     *      \param      liste       Affiche le résultat de la requete SQL.
     *      \param      aView       Permet de transférer les données récupérer sur la page View
     *      \@author    Aurélien Hantute
     *      \date       12/09/2019    
     */ 
    
    public function Liste()
    {
        $titre="Liste détaillée des batailles livrées";
        $aView["titre"]= $titre;
        
        $aView["Salutation"]="<i>Salve, esto paratus sit vivere fabulosa valebat. </i><br> Bonjour, Soyez pret a vivre une aventure fabuleuse.";
        
        $this->load->library('proverbe');
        $citation=$this->proverbe->lesproverbes();
        $aView["citation"]=$citation;
        
        $this->load->model('Bataille_model');
        $archive= $this->Bataille_model->archive();
        
        $aView["archives"]=$archive;
        
        $this->load->view('inclusion/navbar',$aView);
        $this->load->view("bataille/liste",$aView);
        $this->load->view('inclusion/footer',$aView);
        
    }
    
    
}
