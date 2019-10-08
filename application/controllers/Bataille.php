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
     *      \@author    AHantute
     *      \date       12/09/2019    
     */ 
    
    public function ListeB()
    {
        $titre="Liste détaillée des batailles livrées";
        $aView["titre"]= $titre;
        
        $aView["Salutation"]="<i>Salve, esto paratus sit vivere fabulosa valebat. </i><br> Bonjour, Soyez pret a vivre une aventure fabuleuse.";
        
        $this->load->library('proverbe');
        $citation=$this->proverbe->lesproverbes();
        $aView["citation"]=$citation;
        
        $this->load->model('Bataille_model');
        $archive= $this->Bataille_model->archiveB();
        
        $aView["archives"]=$archive;
        
        $this->load->view('inclusion/navbar',$aView);
        $this->load->view("bataille/listeB",$aView);
        $this->load->view('inclusion/footer',$aView);
        
    }
    
    
    public function RecitB()
    {
        $titre="Compte rendu officiel des batailles livrées entre les colonies et l'Empire des l'empire des Vespides";
        $aView["titre"]=$titre;
        $aView["Salutation"]= "<i>Testis est nobilior eratque eorum princeps nostri ad proeliandum contra adversarios nostros.</i> <br/>Soyez le temoin des exploits de nos combattants contre nos adversaires.";
    
        $this->load->library('proverbe');
        $citation=$this->proverbe->lesproverbes();
        $aView["citation"]=$citation;
        
        $this->load->model('Bataille_model');
        $liste=$this->Bataille_model->listeB();
        $aView["RecitB"]=$liste;
        
        $this->load->view('inclusion/navbar',$aView);
        $this->load->view("bataille/recitB",$aView);
        $this->load->view('inclusion/footer',$aView);     
    }
    
    public function AjoutB()
    {
       $titre="Ajout d'un récit";
        $aView["titre"]=$titre;
        $aView["Salutation"]= "<i>Testis est nobilior eratque eorum princeps nostri ad proeliandum contra adversarios nostros.</i> <br/>Soyez le temoin des exploits de nos combattants contre nos adversaires.";
    
        $this->load->library('proverbe');
        $citation=$this->proverbe->lesproverbes();
        $aView["citation"]=$citation;
        
        $data=$this->input->post();
        var_dump($data);
        
        $this->form_validation->set_rules('nom_bataille','nom_bataille','required|regex_match[/^[0-9A-Za-z\sèéêàùâîôûöïä_-]{0,}$/]',
                array('required'=>'Erreur dans le champ %s'));
        $this->form_validation->set_rules('lieu_bataille','lieu_bataille','required|regex_match[/^[0-9A-Za-z\sèéêàùâîôûöïä_-]{0,}$/]',
                array('required'=>'Erreur dans le champ %s'));
        
        if($this->form_validation->run()==TRUE)
        {
            var_dump($data);
            $this->load->model('Bataille_model');
            $AjoutB=$this->Bataille_model->AjoutB();
            $AjoutB["AjoutBataille"]=$AjoutB;
            redirect(site_url("Bataille/RecitB"));
        }
        else{
        $this->form_validation->set_message('required','Erreur');
        $this->load->view('inclusion/navbar',$aView);
        $this->load->view('bataille/AjoutB',$aView);
        $this->load->view('inclusion/footer',$aView);
        }
    }
    
    
    
}
