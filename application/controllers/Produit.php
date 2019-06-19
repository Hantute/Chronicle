<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

/** \brief      Contient toute les fonctions se rapportant à la table produits.
 *  \class      [Produit] de la BDD chronicle
 *  \brief      Création de la class parente Produit extension de la classe CI_Controller chargé de gérer toute les functions se rapportant à la table produit de la BDD chronicle
 *  \details    Elle est composé de 7 fonctions "public": Accueil, liste, ajout, modif, supprime, detail, presentation
 *  @author     Aurélien Hantute
 *  \date       12/06/2019
 */

class Produit extends CI_Controller
{
        
    /** \brief     Fonction liste qui permet d'afficher la page liste
     *  \details   Elle permet d'afficher la page de liste des produits, de naviguer a travers le site grâce a sa barre de navigation, et d'ajouter, modifier ou supprimer un produit
     *  \param     prenom     Affiche le prenom de l'utilisateur.
     *  \param     nom        Affiche le nom de l'utilisateur.
     *  \param     Citation   Affiche le résultat de la function proverbe.
     *  \param     aView      Affiche toute les données qu'on veux faire apparaitre sur la page de la liste.
     *  \@author   Aurélien Hantute
     *  \date      17/06/2019
     */
    
    public function liste()
    {
        if($this->session->user)
        {
            $aView["Salutation"]= "<i>Salve, quis tabernam mirabile , quis offer naves te heroes .</i><br> Bienvenus, dans se magasin étonnant qui offre des navires héroiques.";
            
            $this->load->library('proverbe');
            $citation=$this->proverbe->lesproverbes();
            $aView["citation"]=$citation;
            
            $this->load->model("Produit_model");
            $aliste=$this->Produit_model->liste();
            $aView['liste']=$aliste;
            
            
            $this->load->view("produit/liste",$aView);
        }
        else{
            redirect(site_url("Client/Accueil"));
        }
    }
    
    /** \brief     Fonction detail qui permet d'afficher la page detail
     *  \details   Elle permet d'afficher la page detaillé d'un produit, de naviguer a travers le site grâce a sa barre de navigation, de modifier ou supprimer le produit.
     *  \param     prenom     Affiche le prenom de l'utilisateur.
     *  \param     nom        Affiche le nom de l'utilisateur.
     *  \param     Citation   Affiche le résultat de la function proverbe.
     *  \param     aView      Affiche toute les données qu'on veux faire apparaitre sur la page de detail.
     *  \@author   Aurélien Hantute
     *  \date      17/06/2019
     */
    
    public function detail($id_produit)
    {
        if($this->session->user)
        {
            $this->load->library('proverbe');
            $citation=$this->proverbe->lesproverbes();
            $aView["citation"]=$citation;
            $aView["Salutation"]= "<i>Salve, quis tabernam mirabile , quis offer naves te heroes .</i><br> Bienvenus, dans se magasin étonnant qui offre des navires héroiques.";
            
           $this->load->model('Produit_model');
           $adetail = $this->Produit_model->detail($id_produit);
           $aView["detail"] = $adetail; 
           
           $this->load->view("produit/detail",$aView);
           $this->form_validation->set_message('rule','Error Message');
        }
        else {
            redirect(site_url("Client/Accueil"));
        }
    }
    
    
    /** \brief      Fonction ajout qui permet d'afficher la page ajout pour ajouter un produit
     *   \details   Elle permet d'afficher la page de formulaire d'ajout de produit, de naviguer a travers le site grâce a sa barre de navigation.
     *              Elle contient une boucle pour vérifier que les données rentrés sont bien conforme à ce que l'on demande et fait une vérification pour empêcher le piratage du site.
     *   \param     ajout     variable contenant la page d'ajout se trouvant dans le dossier model.
     *   \param     $config    Configure les données d'upload de la photo.
     *   \param     aView      Affiche toute les données qu'on veux faire apparaitre sur la page d'ajout.
     *   \@author   Aurélien Hantute
     *   \date      17/06/2019
     */
    
    public function ajout()
    {
        if($this->session->user)
        {
            $this->load->library('proverbe');
            $citation=$this->proverbe->lesproverbes();
            $aView["citation"] = $citation;
            
            $this->load->model('Produit_model');
            $ajout = $this->Produit_model->ajout();
            $aView["ajout"] = $ajout;
            
            $this->load->model('Type_model');
            $liste = $this->Type_model->liste();
            $aView["type"] = $liste;
            
            $this->load->view('Produit/ajout', $aView);
            $this->form_validation->set_message('rules','Error Message');
        }
        else 
        {
            redirect(site_url("Client/Accueil"));
        }
    }
    
    
    /** \brief      Fonction modification qui permet d'afficher la page modification pour modifier ou supprimer un produit
     *   \details   Elle permet d'afficher la page de formulaire de modification du produit, de naviguer a travers le site grâce a sa barre de navigation.
     *              Elle contient une boucle pour vérifier que les données rentrés sont bien conforme a se que l'on demande et fait une vérification pour empêcher le piratage du site.
     *   \param     aAjout     variable contenant la page d'modification/suppression se trouvant dans le dossier model.
     *   \param     $config    Configure les données d'upload de la photo.
     *   \param     aView      Affiche toute les données qu'on veux faire apparaitre sur la page de modification.
     *   \@author   Aurélien Hantute
     *   \date      17/06/2019
     */
    
    public function modification($id_produit)
    {
        if($this->session->user)
        {
            $this->load->library('proverbe');
            $citation=$this->proverbe->lesproverbes();
            $aView["citation"] = $citation;
            
            $this->load->view('produit/modification', $aView);
            $this->form_validation->set_message('rules','Error Message');
            
            $this->form_validation->set_rules('nom_produit','nom_produit','required');
            $this->form_validation->set_rules('prix_produit','prix_produit','required');
            $this->form_validation->set_rules('categorie_produit','categorie_produit','required');
            $this->form_validation->set_rules('type_produit','type_produit','required');
            
            if($this->form_validation->run() == TRUE )
            {
                
                $this->load->model('Produit/modification');
                $modif = $this->Produit_model->modification($id_produit);
                $aView["ajout"] = $modif;
                
                $this->load->view('produit/modification', $aView);
                $this->form_validation->set_message('rules','Error Message');
            }
        }
        else
        {
            redirect(site_url("Client/Accueil"));
        }
    }
    
    /**  \brief      fonction supprime qi permet de supprimer un produit de la base de donnée produits
     *   \details    Elle permet d'afficher la page de suppression du produit
     *   \param      supprime       qui récupère les données du model et supprime les données du produits que l'on désire supprimer.
     *   \@author   Aurélien Hantute
     *   \date    06/05/2019
     */ 
    
    public function supprime($id_produit)
    {
        if ($this->input->get())
        {
            
            // On charge les données obtenus dans la function produits_model
            $this->load->model('produit_model');
            $supprime = $this->produit_model->supprime();
            $supprime['supprime']=$supprime;
            
            redirect('Produit/liste');
        }
        
        // On fait un lien entre les deux table pour afficher le nom de la catégorie du produits et non son code numérique.
        $this->load->model('produit_model');
        $detail = $this->produit_model->DetailProduits($id_produit);
        $supprime['produit'] = $detail;
        //$this->load->view('produit/supprime', $supprime); 
    }
}