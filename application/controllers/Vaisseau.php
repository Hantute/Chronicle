<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** \brief Contient toute les fonctions se rapportant à la table Vaisseau.
 *  \class [Vaisseau] de la BDD chronicle.
 *  \brief Création de la class parente Vaisseau extension de la classe CI_Controller chargé de gérer toute les fonctions se rapportant à la table vaisseau de la BDD chronicle
 *  \details Elle est composé de x fonctions "public", Accueil, liste, ajout, modif, supprime, DetailVaisseau, PresentationVaisseau
 *  @author Aurélien Hantute
 *  \date 11/06/2019
 */

class Vaisseau extends CI_Controller
{
    
    /** \brief     Fonction liste qui permet d'afficher la page liste 
     *  \details   Elle permet d'afficher la page de liste des vaisseau, de naviguer a travers le site grâce a sa barre de navigation, et d'ajouter, modifier ou supprimer un vaisseau
     *  \param     prenom     Affiche le prenom de l'utilisateur.
     *  \param     nom        Affiche le nom de l'utilisateur.
     *  \param     Citation   Affiche le résultat de la function proverbe.
     *  \param     aView      Affiche toute les données qu'on veux faire apparaitre sur la page.
     *   \@author   Aurélien Hantute
     *   \date    11/06/2019  
     */
    
    public function liste()
    {
        //Déclaration du tableau associatif à transmettre à la vue
        $aView = array();
        
        if($this->session->user)
        {
            // On charge la fonction citation crée dans la library proverbe.
            $this->load->library('proverbe');
            $citation=$this->proverbe->lesproverbes();
            $aView["citation"]=$citation;
            $aView["Salutation"]= "<i>Salve, esto paratus sit vivere fabulosa valebat. </i><br> Bonjour, Soyez pret a vivre une aventure fabuleuse.<br>";
            
            // On charge le modèle 'vaisseau_model'
            $this->load->model('Vaisseau_model');
            
            // On appelle la méthode liste() du modèle, qui retourne le tableau résultat ici affecté à la variable $aListe (un tableau)
            $aliste = $this->Vaisseau_model->liste();
            $aView["liste"] = $aliste;
            //var_dump($aView);
            
            $this->load->view('vaisseau/liste', $aView);
            //$this->form_validation->set_message('rule','Error Message');
            
            }
        else {
            redirect(site_url("Client/Accueil"));
             }
    }
    
    public function detail($id_vaisseau)
    {
        //Déclaration du tableau associatif à transmettre à la vue
        $aView = array();
        
        if($this->session->user)
        {
            // On charge la fonction citation crée dans la library proverbe.
            $this->load->library('proverbe');
            $citation=$this->proverbe->lesproverbes();
            $aView["citation"]=$citation;
            $aView["Salutation"]= "<i>Salve, esto paratus sit vivere fabulosa valebat. </i><br> Bonjour, Soyez pret a vivre une aventure fabuleuse.<br>";
            
            // On charge le modèle 'vaisseau_model'
            $this->load->model('Vaisseau_model');
            
            // On appelle la méthode liste() du modèle, qui retourne le tableau résultat ici affecté à la variable $aListe (un tableau)
            $adetail = $this->Vaisseau_model->detail($id_vaisseau);
            $aView["detail"] = $adetail;
            //var_dump($aView);
            
            $this->load->view('vaisseau/detail', $aView);
        }
        else {
            redirect(site_url("Client/Accueil"));
        }
    }
        
        /** \brief     Fonction Arme qui permet d'afficher la page ajout
         *  \details   Elle permet d'afficher la page d'ajout de vaisseau, de naviguer a travers le site grâce a sa barre de navigation.
         *  \param     prenom     Affiche le prenom de l'utilisateur.
         *  \param     nom        Affiche le nom de l'utilisateur.
         *  \param     Citation   Affiche le résultat de la function proverbe.
         *  \param     aView      Affiche toute les données qu'on veux faire apparaitre sur la page.
         *   \@author   Aurélien Hantute
         *   \date    11/06/2019
         */
    
        public function ajout()  
        {
         
            if($this->session->user /*&& $this->session->user->id_autorisation == "1"*/)
            {
                
                $this->load->library('proverbe');
                $citation=$this->proverbe->lesproverbes();
                $aView["citation"]=$citation;
                $aView["Salutation"]= "<i>Salve, esto paratus sit vivere fabulosa valebat. </i><br> Bonjour, Soyez pret a vivre une aventure fabuleuse.<br>";
                
                
                $this->form_validation->set_rules('id_classe', 'classe', 'required',
                    array ('required'=> 'Erreur dans le champs %s'));
                $this->form_validation->set_rules('nom_vaisseau', 'nom', 'required',
                    array ('required'=> 'Erreur dans le champs %s'));
                $this->form_validation->set_rules('chantier_de_construction','chantier', 'required',
                    array('required'=> 'Erreur dans le champs %s'));
                $this->form_validation->set_rules('armement', 'armement', 'required',
                    array ('required' => 'Erreur dans le champs %s'));
                $this->form_validation->set_rules('protection', 'protection', 'required',
                    array ('required' => 'Erreur dans le champs %s'));
                $this->form_validation->set_rules('generateur', 'generateur', 'required',
                    array ('required' => 'Erreur dans le champs %s'));
                $this->form_validation->set_rules('id_groupe','groupe','required',
                    array ('required' =>'Erreur dans le champs %s'));
                $this->form_validation->set_rules('id_classe','classe','required',
                    array ('required' => 'Erreur dans le champs %s'));
                
                $data = $this->input->post();
                
                $this->load->model('Vaisseau_model');
                $ajout = $this->Vaisseau_model->ajout();
                $aView['vaisseau/ajout'] = $ajout;
                $this->load->view("vaisseau/ajout",$aView);
            }
            else {
                redirect(site_url("Client/Accueil"));
            }
        }
    
        public function modification() 
        {
            if($this->session->user && $this->session->user->id_autorisation == "1")
            {
               $data = $this->input->post();
               
               $this->load->model('Vaisseau_model');
               $modif = $this->Vaisseau_model->modification($id_vaisseau);
               $modif['modification']=$modif;
            }
            else {
                redirect(site_url("Client/Accueil"));
            }
        }
    
        public function suppression()
        {
            if($this->session->user && $this->session->user->id_autorisation == "1")
            {
                $this->load->model('Vaisseau_model');
                $supprime = $this->Vaisseau_model->suppression($id_vaisseau);
                $supprime['suppression']=$supprime;
            }
            else {
                redirect(site_url("Client/Accueil"));
            }
        }
            
}
?>