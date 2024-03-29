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
        $this->load->model('Systeme_model');
        $systeme=$this->Systeme_model->listeS();
        $this->load->model('Vaisseau_model');
        $vaisseau=$this->Vaisseau_model->choix_vaisseau();
        
        $aView["Vaisseau"]=$vaisseau;
        $aView["archives"]=$archive;
        $aView["systeme"]=$systeme;
        
        $this->load->view('inclusion/navbar',$aView);
        $this->load->view("bataille/listeB",$aView);
        $this->load->view('inclusion/footer',$aView);   
    }
    
//******************************************************************************

    /**     \Brief      Fonction RecitB qui permet d'afficher les récits des différentes batailles 
     *      \details    Elle permet d'afficher la liste des récits des différentes batailles entre les colonies et leur ennemis
     *      \param      titre       Affiche le titre de la page
     *      \param      citation    Affiche le résultat de la library citation
     *      \param      liste       Affiche le résultat de la requete SQL.
     *      \param      aView       Permet de transférer les données récupérer sur la page View
     *      \@author    Aurélien Hantute
     *      \date       26/11/2019    
    */ 
    
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

//****************************************************************************** 
    
    /**     \Brief      Fonction AjoutB 
     *      \details    Elle permet de créer puis vérifier et transférer les données du formulaire ajout vers le modele Bataille_ajout
     *      \param      titre       Affiche le titre de la page
     *      \param      citation    Affiche le résultat de la library citation
     *      \param      data        Tableau de donnée récupérer les données envoyer par le formulaire
     *      \param      SystemeB    Donnée récupérer de la table système  
     *      \param      aView       Permet de transférer les données récupérer sur la page View
     *      \@author    Aurélien Hantute
     *      \date       26/11/2019    
    */ 
    
    public function AjoutB()
    {
        $aView["titre"]="Ajout d'un récit";
        $aView["Salutation"]= "<i>Testis est nobilior eratque eorum princeps nostri ad proeliandum contra adversarios nostros.</i> <br/>Soyez le temoin des exploits de nos combattants contre nos adversaires.";
        
        $this->load->library('proverbe');
        $citation=$this->proverbe->lesproverbes();
        $aView["citation"]=$citation;
        
        
        $data=$this->input->post();
        unset($data["envoyer"]);
        $this->form_validation->set_rules('nom_bataille','nom_bataille','required|regex_match[/^[0-9A-Za-z\sèéêàùâîôûöïä_-]{0,}$/]',
                array('required'=>'Erreur dans le champ %s'));
        $this->form_validation->set_rules('lieu_bataille','lieu_bataille','required|regex_match[/^[0-9A-Za-z\sèéêàùâîôûöïä_-]{0,}$/]',
                array('required'=>'Erreur dans le champ %s'));
        $this->form_validation->set_rules('recit_bataille','recit_bataille',"required|regex_match[/^[0-9A-Za-z\sèéêàùâîôûöïäç',._-]{0,}$/]",
                array('required'=>'Erreur dans le champ %s'));
        
        // Si la e formulaire est bien rempli la validation sera vrai et les données seront enregistrer dans la base de donnée
        if($this->form_validation->run()==TRUE)
        {
            $this->load->model('Bataille_model');
            $AjoutB=$this->Bataille_model->AjoutB($data);
            redirect(site_url("Bataille/RecitB"));   
        }
        else        // Si le formulaire n'est pas bon, ou pas encore rempli, la page se chargera ou se rechargera 
        {          
            $this->load->model('Systeme_model');
            $SystemeB=$this->Systeme_model->listeS();
            $aView['Systeme']=$SystemeB;
            $this->form_validation->set_message('required','Erreur');
            $this->load->view('inclusion/navbar',$aView);
            $this->load->view('bataille/AjoutB',$aView);
            $this->load->view('inclusion/footer',$aView);
        }
    }
    
//******************************************************************************    
  
    /**     \Brief      Fonction nom_bataille 
     *      \details    Elle permet d'afficher les données d'une bataille de la table bataille
     *      \param      id          Transmet l'identifiant de la bataille pour en obtenir les détails 
     *      \param      nom         Affiche le résultat de la requete SQL.
     *      \param      aView       Permet de transférer les données récupérer sur la page View
     *      \@author    Aurélien Hantute
     *      \date       26/11/2019    
    */ 
    
    public function nom_batailleB($id)      // Permet de récupérer le nom de la bataille  
    {
        $this->load->model('Bataille_model');
        $nom= $this->Bataille_model->Selection_date($id);
        $aView['Nom']=$nom;
        $this->load->view('bataille/NomB',$aView);
    }
}
